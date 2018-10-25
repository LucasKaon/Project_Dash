<?php

	require_once("conexao/db_class.php");

	date_default_timezone_set("America/Sao_Paulo");
	// http://php.net/manual/pt_BR/datetime.settimestamp.php
	// http://php.net/manual/pt_BR/timezones.america.php
	// http://php.net/manual/pt_BR/function.date.php

	$date = time();

	$data_formatada = date("d-m-Y H:i",$date);

	if (isset($_POST['nome'])) {

	 $nome = ucwords(strtolower($_POST['nome']));
	 $sobrenome = ucwords(strtolower($_POST['sobrenome']));
	 $email = strtolower($_POST['email']);
	 $nick = $_POST['nick'];
	 $cpf = $_POST['cpf'];
	 $data = $data_formatada;



	 echo $nome."<br>".$sobrenome."<br>".$email."<br>".$nick."<br>".$cpf."<br>".$data;

	}

	else{

		echo "O formulário ainda não foi preenchido.<br>Método POST não carregou nenhuma informação.";

	}
	 
	/*	REALIZANDO CONEXAO COM BANCO DE DADOS */
	$db = new db();
	$link = $db->conectar();

	

	// // Adicionando informações ao banco de dados.
	$query = "INSERT INTO usuario (IDUSUARIO, NOME, SOBRENOME, NICK, CPF, EMAIL, DATA_CADASTRO) VALUES(null,'$nome','$sobrenome','$nick','$cpf','$email','$data');";

	//	$result = mysqli_query($link,$query) or die(mysqli_error($link));

	if(mysqli_query($link,$query)){
		echo "<br><br>Cadastro realizado com sucesso.";
	}
	else{
		echo "Não foi possível realizar o cadastro.<br>Entre em contato com o desenvolvedor.";
	}
	 

?>
