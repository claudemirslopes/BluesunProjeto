<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2" || $_SESSION['usuarioNiveisAcessoId'] == "3") {
      include_once("conexao/conexao.php");
  } else {
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
  } 
?>
<?php

    require_once 'dbconfig.php';
    
    if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT * FROM equipe WHERE equipe_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM equipe WHERE equipe_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: equipe.php");
    }

// $pesquisar = $_GET['pesquisar'];
$pesquisar = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';
    
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header col-md-8" style="margin-bottom: 20px;border-bottom: solid 1px #F4F3EF;">
                                <h4 class="title">EQUIPE</h4>
                                <p class="category">Equipe da empresa franqueada</p>
                            </div>
                            <div class="header col-lg-4">
                                <p class="category">
                                    <a href="equipe_add.php"><button type="submit" class="btn btn-success btn-fill btn-wd" style="float: right;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar</button></a>
                                </p>
                            </div>
                            <div class="content table-responsive">
                                <table class="table table-striped tabela_listar_datatable">
                                    <thead>
                                        <th style="text-align: center;">#</th>
                                        <th>Nome</th>
                                        <th>Cargo</th>
                                        <th style="text-align: center;">Ações</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $stmt_select = "SELECT * FROM equipe WHERE equipe_id_user = {$_SESSION['usuarioId']} ORDER by equipe_id";
                                            $resultado_cursos = mysqli_query($conn, $stmt_select);
                                            $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                                            while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $rows_cursos['equipe_id']; ?></td>
                                            <td><?php echo $rows_cursos['nome']; ?></td>
                                            <td><?php echo $rows_cursos['cargo']; ?></td>
                                            <td style="text-align: center;"><a title="Editar" href="equipe_edi.php?edit_id=<?php echo $rows_cursos['equipe_id']; ?>"><i class="fa fa-edit" style="color: #0B610B;"></i></a><a title="Excluír" href="?delete_id=<?php echo $rows_cursos['equipe_id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
                
            </div>
        </div>

        <?php
          include("footer.php");
        ?>


    