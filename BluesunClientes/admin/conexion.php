<?php
$DB_HOST="localhost";
$DB_NAME= "fran0562_cliente";
$DB_USER= "fran0562_cliente";
$DB_PASS= "E[YjR5[ucN2$";
	# conectare la base de datos
    $con=@mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>
