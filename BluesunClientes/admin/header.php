<?php
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['usuarioId'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
  }
    require_once 'dbconfig.php';
    include_once("conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('d-m-Y H:i');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bluesun | Site Clientes</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css"/>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>