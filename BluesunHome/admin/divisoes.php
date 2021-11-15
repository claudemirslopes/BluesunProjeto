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
        $stmt_select = $DB_con->prepare('SELECT * FROM bs_divisoes WHERE divisoes_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM bs_divisoes WHERE divisoes_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: divisoes.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Divisoes</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Divisoes</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Imagem/Logo</th>
                          <th scope="col">Título</th>                          
                          <th scope="col">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $stmt_select = "SELECT * FROM bs_divisoes ORDER by divisoes_id";
                            $resultado_cursos = mysqli_query($conn, $stmt_select);
                            $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                            while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                        ?>

                        <tr>
                          <td class="text-left"><img src="../img/divisoes/<?php echo $rows_cursos['divisoes_img']; ?>" width="80" height="25"></th>
                          <td><?php echo $rows_cursos['divisoes_titulo']; ?></td>
                          <td style="text-align: center;"><a title="Editar" href="divisoes-edt.php?edit_id=<?php echo $rows_cursos['divisoes_id']; ?>"><i class="fa fa-edit" style="color: #1CC88A;"></i></a></td>
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