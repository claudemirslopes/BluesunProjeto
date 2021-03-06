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
        $stmt_select = $DB_con->prepare('SELECT * FROM bs_franqueados WHERE id_franqueado =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM bs_franqueados WHERE id_franqueado =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: franqueados.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Franqueados</h1>
                        <a href="franqueados-adc.php"><button type="submit" class="btn btn-success btn-fill btn-wd float-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Franqueado </button></a>
                    </div>
                </div>


            <div class="card-body"> 
                  <div class="row">
                    <div class="col-lg-12">
                      <table class="table table-striped tabela_listar_datatable">
                        <thead>
                          <tr>
                            <th scope="col">Empresa</th>
                            <th scope="col">Modalidade</th>
                            <th scope="col">Cidade/Estado</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">A????o</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $stmt_select = "SELECT * FROM bs_franqueados ORDER by id_franqueado";
                            $resultado_cursos = mysqli_query($conn, $stmt_select);
                            $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                            while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                          ?>
                          <tr>
                            <td><?php echo $rows_cursos['empresa']; ?></td>
                            <td><?php echo $rows_cursos['modalidade']; ?></td>
                            <td><?php echo $rows_cursos['cidade'].'/'.$rows_cursos['uf']; ?></td>
                            <td><?php echo $rows_cursos['telefone']; ?></td>
                            <td><a title="Editar" href="franqueados-edt.php?edit_id=<?php echo $rows_cursos['id_franqueado']; ?>"><i class="fa fa-edit" style="color: #1CC88A;"></i></a>
                            	<a title="Exclu??r" href="?delete_id=<?php echo $rows_cursos['id_franqueado']; ?>" onclick="return confirm('Confirma a exclus??o?')"><i class="fa fa-trash" style="color: #ff0000;"></i></td>
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