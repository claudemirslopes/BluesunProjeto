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
        $stmt_select = $DB_con->prepare('SELECT * FROM bs_marcas WHERE marcas_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM bs_marcas WHERE marcas_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        try{
          $stmt_delete->execute();
        } catch(PDOException $e) {
          echo $e->getMessage();
          
        }
        
        
        header("Location: marcas.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Marcas</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Marcas</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                      <style type="text/css">
                      
                      th.colid{
                        width: 10%;
                      }

                      th.collog{
                        width: 20%;
                      }

                      th.colnome{
                        width: 20%;
                      }

                      th.colurl{
                        width: 40%;
                      }

                      th.colacao{
                        width: 10%;
                      }

                      
                      </style>

                      <div class="header col-lg-4">
                          <p class="category">
                            <a href="marcas-adc.php"><button type="submit" class="btn btn-success btn-fill btn-wd"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Marca </button></a>
                          </p>
                      </div>

                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col" class="colid">#</th>
                            <th scope="col" class="colog">Logo</th>
                            <th scope="col" class="colnome">Nome</th>
                            <th scope="col" class="colurl">URL</th>
                            <th scope="col" class="colacao">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              $stmt_select = "SELECT * FROM bs_marcas ORDER by marcas_id";
                              $resultado_cursos = mysqli_query($conn, $stmt_select);
                              $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                              while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                          ?>

                          <tr>
                            <th scope="row"><?php echo $rows_cursos['marcas_id']; ?></th>
                            <td class="text-left"><img src="../img/logo-marcas/<?php echo $rows_cursos['marcas_img']; ?>" width="80" height="30"></td>
                            <th scope="row"><?php echo $rows_cursos['marcas_titulo']; ?></th>
                            <th scope="row"><?php echo $rows_cursos['marcas_url']; ?></th>
                            <td><a title="Excluír" href="?delete_id=<?php echo $rows_cursos['marcas_id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></td>
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