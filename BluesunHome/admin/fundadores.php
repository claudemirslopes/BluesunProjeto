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
        $stmt_select = $DB_con->prepare('SELECT * FROM bs_fundadores WHERE fundadores_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM bs_fundadores WHERE fundadores_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: fundadores.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Fundadores</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Fundadores</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-left" scope="col">Imagem/Foto</th>
                          <th scope="col">Título</th>
                          <th scope="col">Subtitulo/Cargo</th>
                          <th class="text-right" scope="col">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $stmt_select = "SELECT * FROM bs_fundadores ORDER by fundadores_id";
                            $resultado_cursos = mysqli_query($conn, $stmt_select);
                            $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                            while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                        ?>
                        <tr>
                          <td class="text-left"><img src="../img/fundadores/<?php echo $rows_cursos['fundadores_img']; ?>" width="50" height="55"></th>
                          <td style="vertical-align: middle;"><?php echo $rows_cursos['fundadores_titulo']; ?></td>
                          <td style="vertical-align: middle;"><?php echo $rows_cursos['fundadores_subtitulo']; ?></td>
                          <td class="text-right"><a title="Editar" href="fundadores-edt.php?edit_id=<?php echo $rows_cursos['fundadores_id']; ?>"><i class="fa fa-edit" style="color: #1CC88A;"></i></a></td>
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