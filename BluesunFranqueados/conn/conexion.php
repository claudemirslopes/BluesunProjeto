<?php
$DB_HOST="localhost";
$DB_NAME= "bluesu66_sitenew";
$DB_USER= "bluesu66_sitenew";
$DB_PASS= "yk_Mc5]jQY=0";
	# conectare la base de datos
    $con=@mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>
