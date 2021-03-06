<?php
  session_start();
  include_once("seguranca.php");
  include_once("conexao/conexao.php");
  seguranca_adm();
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
                                            <p style="color: #FE642E;font-size: .4em;">Endere??os, telefones e mapa</p>
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
                                            <p style="color: #FE642E;font-size: .4em;">Informa????es sobre a empresa</p>
                                            Franquia
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
                                            <p style="color: #FE642E;font-size: .4em;">Informa????es de redes sociais</p>
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
                                        <div class="icon-big icon-secondary text-center" style="color: #465791;">
                                            <i class="fa fa-facebook-official"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Imagem ao compartilhar site</p>
                                            Facebook
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="compartilho.php"><i class="ti-angle-right"></i> Acessar</a>
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
                                            <i class="fa fa-comments text-dark"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Coment??rios dos clientes</p>
                                            Depoimentos
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="depoimentos.php"><i class="ti-angle-right"></i> Acessar</a>
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
                                            <p style="color: #FE642E;font-size: .4em;">Galeria de fotos da empresa</p>
                                            Imagens
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

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-secondary text-center" style="color: #DF3A01;">
                                            <i class="fa fa-user-circle"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Equipe da empresa franqueada</p>
                                            Equipe
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="equipe.php"><i class="ti-angle-right"></i> Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"): ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-secondary text-center" style="background: -webkit-linear-gradient(#259A10, #FF7400);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                            <i class="fa fa-sun-o"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Informa????es sobre a Bluesun</p>
                                            Bluesun
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="sobreblue.php"><i class="ti-angle-right"></i> Acessar</a>
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
                                        <div class="icon-big icon-secondary text-center" style="color: #0B2F3A;">
                                            <i class="fa fa-plug"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Se????o de energia solar</p>
                                            Energia Solar
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="energia_solar.php"><i class="ti-angle-right"></i> Acessar</a>
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
                                        <div class="icon-big icon-secondary text-center" style="color: #38610B;">
                                            <i class="fa fa-picture-o"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Galeria de fotos da Bluesun</p>
                                            Galeria
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="bluesun_galeria.php"><i class="ti-angle-right"></i> Acessar</a>
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
                                        <div class="icon-big icon-secondary text-center" style="color: #FF8000;">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Vantagens da Energia Solar</p>
                                            Itens
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="itens.php"><i class="ti-angle-right"></i> Acessar</a>
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
                                        <div class="icon-big icon-secondary text-center" style="color: #FE2E2E;">
                                            <i class="fa fa-copyright"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="color: #333;">
                                            <p style="color: #FE642E;font-size: .4em;">Marcas que a Bluesun trabalha</p>
                                            Marcas
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="marcas.php"><i class="ti-angle-right"></i> Acessar</a>
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