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
        $stmt_select = $DB_con->prepare('SELECT * FROM bs_datasheet WHERE datasheet_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM bs_datasheet WHERE datasheet_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: datasheets.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Datasheets</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Datasheets</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                      <div class="header col-lg-4">
                          <p class="category">
                            <a href="datasheets-adc.php"><button type="submit" class="btn btn-success btn-fill btn-wd"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Datasheets </button></a>
                          </p>
                      </div>

                    <table class="table table-striped tabela_listar_datatable" style="border-bottom: none !important;">
                      <thead>
                        <tr>
                          <th style="display: none;" scope="col">Nome</th>
                          <th scope="col" class="text-left">Marca</th>
                          <th scope="col" class="collogo">Título</th>
                          <th scope="col" class="colnome text-center">Arquivo</th>
                          <th scope="col" class="colacao text-right">Ação</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                              $stmt_select = "SELECT * FROM bs_datasheet AS dsheet JOIN bs_marcas AS mar ON mar.marcas_id = dsheet.datasheet_marca_id ORDER by datasheet_id";
                              $resultado_cursos = mysqli_query($conn, $stmt_select);
                              $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                              while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 

                        ?>

                        <tr>
                          <td style="display: none;"><?php echo $rows_cursos['marcas_titulo']; ?></td>
                          <td class="text-left"><img src="../img/logo-marcas/<?php echo $rows_cursos['marcas_img']; ?>" alt="Marca" width="100"></td>
                          <td class="file"><?php echo $rows_cursos['datasheet_titulo']; ?></td>
                          <th scope="row" class="text-center"><a class="btn btn-danger btn-sm" href="../assets/pdf/<?php echo $rows_cursos['datasheet_arquivo']; ?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Ver Arquivo</a></th>
                          <td class="text-right"><a title="Editar" href="datasheets-edt.php?edit_id=<?php echo $rows_cursos['datasheet_id']; ?>"><i class="fa fa-edit" style="color: #1CC88A;"></i></a>
                              <a title="Excluir" href="?delete_id=<?php echo $rows_cursos['datasheet_id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></a>
                          </td>
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