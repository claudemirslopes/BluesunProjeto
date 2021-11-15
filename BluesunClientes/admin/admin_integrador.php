<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "3") {
      include_once("conexao/conexao.php");
  } else {
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login/index.php"); exit;
  } 
?>
<?php

    require_once 'dbconfig.php';
    
    if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT userPic FROM usuarios WHERE id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink("../public/faces/".$imgRow['userPic']);
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM usuarios WHERE id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: perfil.php");
    }

?>
<?php
  include("header.php");
?>

<div class="wrapper">
    <?php
	  include("sidebar.php");
	?>

    <div class="main-panel">
        <?php
		  include("nav.php");
		?>


        <div class="content" style="background: #E6E6E6;">
            <div class="container-fluid">
                <div class="row">
                    
                    <?php if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2" || $_SESSION['usuarioNiveisAcessoId'] == "3"): ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-secondary text-center" style="background: -webkit-linear-gradient(#BB372A, #E54C43);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Endereços, telefones e mapa</p>
                                            Contato
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="contato_mapa.php"><i class="ti-angle-right"></i> Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-secondary text-center">
                                            <i class="fa fa-building text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Informações sobre a empresa</p>
                                            Integrador
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="sobrefran.php"><i class="ti-angle-right"></i> Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-secondary text-center" style="background: -webkit-linear-gradient(#4F59C7, #EA4E54);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Informações de redes sociais</p>
                                            Social
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="social.php"><i class="ti-angle-right"></i> Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-secondary text-center" style="color: #173B0B;">
                                            <i class="fa fa-camera-retro"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Galeria de Fotos</p>
                                            Projetos
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="obras_imagens.php"><i class="ti-angle-right"></i> Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <?php endif; ?>

                </div>

                
            </div>
        </div>

        <?php include('footer.php'); ?>