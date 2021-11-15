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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                                <div class="header col-md-8" style="margin-bottom: 20px;">
                                    <h4 class="title">Usuários do Sistema</h4>
                                    <p class="category">Veja abaixo todos os usuários do sistema.</p>
                                </div>
                                <div class="header col-md-4">
                                    <p class="category">
                                        <a href="users-add.php"><button type="submit" class="btn btn-warning btn-fill btn-wd" style="float: right;"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Adicionar Usuário</button></a>
                                    </p>
                                </div>
                            <div class="content table-responsive">
                                <table class="table table-striped tabela_listar_datatable">
                                    <thead>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Foto</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th style="text-align: center;">Nível</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Ações</th>
                                    </thead>
                                    <tbody>
                                        <?php
    
                                            $stmt = $DB_con->prepare("SELECT u.id ID, u.userPic IMG, u.nome NOME, u.email EMAIL, n.nome PERFIL, s.nome_situacao STATUS, u.datacad DCAD FROM usuarios u
                                                INNER JOIN niveis_acessos n ON n.id=u.id_nivacesso
                                                INNER JOIN situacoes_usuarios s ON s.id=u.id_situacoes
                                                ORDER BY u.id ASC");
                                            $stmt->execute();
                                            
                                            if($stmt->rowCount() > 0)
                                            {
                                                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    extract($row);
                                        ?>
                                        <tr style="font-size: .8em;">
                                            <td style="text-align: center;"><?php echo $row['ID']; ?></td>
                                            <td style="text-align: center;"><img src="../public/faces/<?php echo $row['IMG']; ?>" style="width: 30px;height: 30px;border-radius: 5px;"></td>
                                            <td><?php echo $row['NOME']; ?></td>
                                            <td><?php echo $row['EMAIL']; ?></td>
                                            <td style="text-align: center;"><?php echo $row['PERFIL']; ?></td>
                                            <td style="text-align: center;"><?php echo $row['STATUS'] == 'Ativo' ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'; ?></td>
                                            <td style="text-align: center;"><a title="Visualizar" href="users-view.php?edit_id=<?php echo $row['ID']; ?>"><i class="fa fa-eye" style="color: #0040FF;"></i><a title="Editar" href="users-edit.php?edit_id=<?php echo $row['ID']; ?>"><i class="fa fa-edit" style="color: #0B610B;"></i></a><a title="Excluir" href="?delete_id=<?php echo $row['ID']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-times-circle" style="color: #DF0101;"></i></a></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <div class="col-xs-12">
                                                    <div class="alert alert-warning">
                                                        <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php include_once('footer.php') ?>