<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");
  $mysqli = new mysqli('localhost', 'root', '', 'bsun_siteclientes');
  /*  $user = filter_input(INPUT_GET, 'cpf');
  $sql = "SELECT * FROM `usuarios` WHERE `cpf` = '{$user}'"; //monto a query
  $query = $mysqli->query( $sql ); //executo a query
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo '<p style="font-size:20px;background:#FA5858;padding-left:10px;color:#fff;border-radius:3px;"><strong>CPF </strong>já cadastrado! <small><small>Faça login para acessar...</small></small></p>';
    echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=logar.php'>";
  } */
  /* else {
    echo '<p style="font-size:20px;background:#04B45F;padding-left:10px;color:#fff;border-radius:3px;">Data disponível para agendamento! <small><small>Prossiga com o cadastro...</small></small></p>';
  } */

  $user2 = filter_input(INPUT_GET, 'email');
  $sql = "SELECT * FROM `usuarios` WHERE `email` = '{$user2}'"; //monto a query
  $query = $mysqli->query( $sql ); //executo a query
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo '<small class="form-text text-danger">E-MAIL </strong>já cadastrado! <small><small>Altere para prosseguir...</small>';
  }

  /* $user3 = filter_input(INPUT_GET, 'rgrne');
  $sql = "SELECT * FROM `candidatos` WHERE `rgrne` = '{$user3}'"; //monto a query
  $query = $mysqli->query( $sql ); //executo a query
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo '<p style="font-size:20px;background:#FA5858;padding-left:10px;color:#fff;border-radius:3px;"><strong>RG/RNE </strong>já cadastrado! <small><small>Faça login para acessar...</small></small></p>';
    echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=logar.php'>";
  } */