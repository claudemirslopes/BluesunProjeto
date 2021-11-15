<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1") {
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
        $stmt_select = $DB_con->prepare('SELECT * FROM videos WHERE id_video =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM videos WHERE id_video =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: videos.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Vídeos</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                      <div class="header col-lg-4">
                          <p class="category">
                            <a href="videos_add.php"><button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="fa fa-youtube-square" aria-hidden="true"></i>&nbsp;&nbsp;Adicionar Vídeo </button></a>
                          </p>
                      </div>

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col" class="text-left">Capa</th>
                              <th scope="col">Titulo</th>
                              <th scope="col">Autor</th>
                              <th scope="col">URL</th>
                              <th scope="col" class="text-center">Data</th>
                              <th scope="col" class="text-right">Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                    $stmt_select = "SELECT * FROM videos ORDER by id_video";
                                    $resultado_cursos = mysqli_query($conn, $stmt_select);
                                    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                                    while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                                ?>

                            <tr>
                              <td class="text-left"><img src="../videos/images/<?php echo $rows_cursos['imagem']; ?>" width="50" height="30"></td>
                              <td><?php echo $rows_cursos['titulo']; ?></td>
                              <td><?php echo $rows_cursos['autor']; ?></td>
                              <td><?php echo $rows_cursos['url']; ?></td>
                              <td class="text-center"><?php echo $rows_cursos['created']; ?></td>
                              <td  class="text-right"><a title="Editar" href="videos_edit.php?edit_id=<?php echo $rows_cursos['id_video']; ?>"><i class="fa fa-edit" style="color: #1CC88A;"></i></a>
                              <a title="Excluír" href="?delete_id=<?php echo $rows_cursos['id_video']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></td>
                            </tr>

                            <?php } ?>
                          </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
   <?php include_once ('footer.php') ?>         