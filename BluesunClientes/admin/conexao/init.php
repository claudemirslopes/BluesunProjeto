<?php
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'fran0562_cliente');
define('DB_PASS', 'E[YjR5[ucN2$');
define('DB_NAME', 'fran0562_cliente');
  
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
date_default_timezone_set('America/Sao_Paulo');
  
// inclui o arquivo de funçõees
require_once 'functions.php';