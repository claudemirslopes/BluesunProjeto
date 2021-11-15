<?php
	$servidor = "localhost";
	$usuario = "bluesu66_sitenew";
	$senha = "yk_Mc5]jQY=0";
	$dbname = "bluesu66_sitenew";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
?>
