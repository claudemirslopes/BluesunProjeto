<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2") {
      include_once("conexao/conexao.php");
  } else {
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
  } 
  
?>
<?php

    require_once 'dbconfig.php';
    
    if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT * FROM bs_contato WHERE contato_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM bs_contato WHERE contato_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: index.php");
    }

// $pesquisar = $_GET['pesquisar'];
$pesquisar = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';
    
?>
<?php include_once ('header.php') ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once ('sidebar.php') ?>

        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include_once ('nav.php') ?>   

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Painel Administrativo</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                        <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"): ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Contatos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="contato.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Contato</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-address-book fa-2x" style="color: #FF5F00"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Slides</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="slides.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Slides</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-fw fa-file-image-o fa-2x" style="color: #088A29"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização da História</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="historia.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Nossa História</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-history fa-2x" style="color: #0B615E"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização Fundadores</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="fundadores.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Fundadores</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa fa-street-view fa-2x" style="color: #000"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização das Divisões</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="divisoes.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Divisões Bluesun</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cog fa-2x" style="color: #6E6E6E"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Álbum para a galeria de imagens</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="album.php" style="color: #6E6E6E; text-decoration: none;">Álbum</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-camera fa-2x" style="color: #0B4C5F;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      

                        <!--<div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Imagens</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="galeria.php" style="color: #6E6E6E; text-decoration: none;">Galeria</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-camera fa-2x" style="color: #A4A4A4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Redes Sociais</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="redessociais.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Redes Sociais</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-fw fa-facebook-official fa-2x" style="color: #0B84EE"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Marcas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="marcas.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Marcas</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-copyright fa-2x" style="color: #000"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Datasheets</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="datasheets.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Datasheets</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-folder fa-2x" style="color: #FFBF00"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Vídeos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="videos.php" style="color: #6E6E6E; text-decoration: none;">Vídeos</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-fw fa-youtube fa-2x" style="color: #FF0000;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Atualização de Franqueado</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="franqueados.php?edit_id=1" style="color: #6E6E6E; text-decoration: none;">Franqueados</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa fa-users fa-2x" style="color: #FF5F00"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                <!-- /.container-fluid -->
            </div>    

            </div>
            <!-- End of Main Content -->

   <?php include_once ('footer.php') ?>         