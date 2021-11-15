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
        $stmt_select = $DB_con->prepare('SELECT * FROM usuarios WHERE id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM usuarios WHERE id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: usuarios.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Usuários</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                      <div class="header col-lg-4">
                          <p class="category">
                            <a href="usuarios-adc.php"><button type="submit" class="btn btn-success btn-fill btn-wd"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Usuário </button></a>
                          </p>
                      </div>

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Foto</th>
                              <th scope="col">Nome</th>
                              <th scope="col">E-mail</th>
                              <th scope="col">Ação</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                    $stmt_select = "SELECT * FROM usuarios ORDER by id";
                                    $resultado_cursos = mysqli_query($conn, $stmt_select);
                                    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                                    while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                                ?>

                            <tr>
                              <td class="text-left"><img src="../img/usuarios/<?php echo $rows_cursos['userPic']; ?>" width="40" height="40"></td>
                              <td><?php echo $rows_cursos['nome']; ?></td>
                              <td><?php echo $rows_cursos['email']; ?></td>
                              <td style="text-align: center;"><a title="Editar" href="usuarios_edit.php?edit_id=<?php echo $rows_cursos['id']; ?>"><i class="fa fa-edit" style="color: #1CC88A;"></i></a>
                              <a title="Excluír" href="?delete_id=<?php echo $rows_cursos['id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></a>
                              <a title="Redefinir Senha" href="?delete_id=<?php echo $rows_cursos['id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-unlock-alt" style="color: #FF5F00;"></i></a></td>
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