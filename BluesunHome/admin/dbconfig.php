<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'bluesu66_sitenew';
	$DB_PASS = 'yk_Mc5]jQY=0';
	$DB_NAME = 'bluesu66_sitenew';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
