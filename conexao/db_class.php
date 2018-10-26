<?php

	class db{

		private $host = "localhost";
		private $usuario = "root";
		private $senha = "";
		private $banco = "dashboard";

		//função para se conectar ao banco de dados
		function conectar(){

			$link = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);

			//ajustar charset
			mysqli_set_charset($link, 'utf-8');

			//verificando se houve erro
			if(mysqli_connect_errno()){
				echo "Erro ".mysqli_connect_errno()." : ".mysqli_connect_error();
			}

			 // if (isset($link)) {
		  //    	echo "<br><br>Conexão realizada com sucesso!";
			 // 						}

			 return $link;

		}
		

	}

?>