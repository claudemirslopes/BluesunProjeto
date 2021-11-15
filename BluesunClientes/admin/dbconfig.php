<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'fran0562_cliente';
	$DB_PASS = 'E[YjR5[ucN2$';
	$DB_NAME = 'fran0562_cliente';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
