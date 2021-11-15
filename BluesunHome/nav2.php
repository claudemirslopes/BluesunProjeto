<?php

  require_once 'admin/dbconfig.php';
  
  if(isset($_GET['delete_id']))
  {    
    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM bs_marcas WHERE marcas_id =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_id']);
    $stmt_delete->execute();
    
    header("Location: index.php");
  }

  date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');


?>
<!--==========================
    Header
  ============================-->
  <header id="header" class="header-fixed">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="./#intro" class="scrolltop"><img src="img/logobranco.png"  alt="" title="" class="responsive" style="width: 180px;"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="./#intro">Home</a></li>
          <li><a href="./#historia">Nossa História</a></li>
          <li><a href="./#fundadores">Fundadores</a></li>
          <li><a href="./#divisoes">Divisões</a></li>
          <li class="menu-active"><a href="album.php">Galeria</a></li>
          <li><a href="videos/"><span style="background-color: #DF0101;padding: 8px;color: #fff;border-radius: 15px;font-weight: normal;font-size: .9em;padding-right: 15px;padding-left: 15px;"><i class="fa fa-youtube" aria-hidden="true"></i> Vídeos</span></a></li>
          <li><a href="./#marcas">Marcas</a></li>
          <li><a href="./#contato">Contato</a></li>
          <li class="buy-tickets"><a href="http://orcamentos.bluesundobrasil.com.br/login.php" target="_blank">Acesso a Plataforma</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->