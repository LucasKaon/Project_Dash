<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta charset="utf-8">
	<title>DashBoard - Consulta</title>
	<link rel="stylesheet" type="text/css" href="estilo/style.css">

</head>
<body>

<header>
	<div class="navegacao">
		
		<ul>
			<li><a href="#">Voltar</a>	<span> &#160&#160&#160&#160&#160&#160 |  </span></li>
			<li><a href="#">Contato</a> </li>
		</ul>

	</div>

	<div class="barra_nav"></div>

</header>

<div id="formulario_consulta" >

<form method="get" action="#">
	<input id="filtrar" type="text" name="condicao" maxlength="30" placeholder="Filtrar por">
	<input id="btn_consultar" type="submit" name="consultar" value="Filtrar">
</form>

</div>

<div id="resultado_consulta">
	
	<!-- Chamando conexao / realizando consulta -->

	<?php

	require_once('conexao/db_class.php');

	$db = new db();

	$link = $db->conectar();

	//verificando se existe dados no filtro

		if (isset($_GET['condicao'])) {
			$condicao = $_GET['condicao'];
			$query = "SELECT NOME, NICK, CPF, EMAIL, DATA_CADASTRO FROM USUARIO WHERE NOME LIKE '%".$condicao."%'";
		} else{

		$query = "SELECT NOME, NICK, CPF, EMAIL, DATA_CADASTRO FROM USUARIO";

		}
	//

	$result = mysqli_query($link,$query);

	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
	
	
	
	foreach($rows as $row)
	{
		?>
		<div id="retorno_consulta">	
		<?php
		echo "<span class='grafia_resultado'>Nome: <strong>".$row['NOME']."</strong></span><br>";
		echo "<span class='grafia_resultado'>NickName: <strong>".$row['NICK']."</strong></span><br>";
		echo "<span class='grafia_resultado'>CPF: <strong>".$row['CPF']."</strong></span><br>";
		echo "<span class='grafia_resultado'>Email: <strong>".$row['EMAIL']."</strong></span><br>";
		echo "<span class='grafia_resultado'>Data de Cadastro: <strong>".$row['DATA_CADASTRO']."</strong></span><br>";
		?>
		</div>
		<?php
	}	

	/* numeric array */
	/*$row = mysqli_fetch_array($result, MYSQLI_NUM);
	printf ("%s , %s, %s, %s, %s \n", $row[0], $row[1], $row[2], $row[3], $row[4]); */

	/* numeric array */
	//$row = $result->fetch_array(MYSQLI_NUM);
	//printf ("%s , %s, %s, %s, %s \n", $row[0], $row[1], $row[2], $row[3], $row[4]);

	/* associative array */
	/*$row = $result->fetch_array(MYSQLI_ASSOC);
	printf ("%s (%s)\n", $row["NOME"], $row["NICK"]);  */

	?>

	<!-- <table id="tabela_consulta" class="marcador">
		
		<tr>
			<th>Nome</th>
			<th>NickName</th>
			<th>CPF</th>
			<th>Email</th>
			<th>Data de Cadastro</th>
		</tr>
		<tr>
			<td>a</td>
			<td>b</td>
			<td>c</td>
			<td>d</td>
			<td>e</td>
		</tr>


	</table> -->

</div>


</body>
</html>