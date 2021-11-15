<?php
	$servidor = "localhost";
	$usuario = "fran0562_cliente";
	$senha = "E[YjR5[ucN2$";
	$dbname = "fran0562_cliente";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
?>
