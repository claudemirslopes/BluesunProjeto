<?php
	
	# conectare la base de datos
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("Não foi possível estabelecer conexão com o banco de dados: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexão com o banco de dados falhou: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>
