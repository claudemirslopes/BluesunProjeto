<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2" || $_SESSION['usuarioNiveisAcessoId'] == "3") {
      include_once("conexao/conexao.php");
  } else {
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
  } 


   require_once 'dbconfig.php';
    
    if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT * FROM obras_imagens WHERE image_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM obras_imagens WHERE image_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: obras_imagens.php");
    }
?>
<?php



if (! empty($_FILES)) {
    $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
    $targetPath = "../public/franquia/";
    $imagePath = $targetPath . $imagePath;
    $tempFile = $_FILES['file']['tmp_name'];
    $id_image_user = $_POST['id_image_user'];
    $titulo = $_POST['titulo'];
    
    $targetFile = $targetPath . $_FILES['file']['name'];
    
    if (move_uploaded_file($tempFile, $targetFile)) {
        echo "true";
    } else {
        echo "false";
    }
}
if (! empty($_GET["action"]) && $_GET["action"] == "save") {
    require_once ("conexao/db.php");
    print $sql = "INSERT INTO obras_imagens(image_path,id_image_user,titulo) VALUES('$imagePath','$id_image_user','$titulo')";
    mysqli_query($conn, $sql);
    $current_id = mysqli_insert_id($conn);
}
?>
<?php
  include("header.php");
?>
<link rel="stylesheet" type="text/css" href="assets/dropzone/dropzone.css" />
<script type="text/javascript" src="assets/dropzone/dropzone.js"></script>
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
                            <div class="header">
                                <h4 class="title">Galeria da Franquia | Add Imagens</h4>
                            </div>
                            <div class="content">
                                <?php
                                    if(isset($errMSG)){
                                            ?>
                                            <div class="alert alert-danger">
                                                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                                            </div>
                                            <?php
                                    }
                                    else if(isset($successMSG)){
                                        ?>
                                        <div class="alert alert-success">
                                              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                <div class="jumbotron" style="text-align: center;padding: .9rem .5rem;background-color: #CEF6CE;">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <form name="frmImage" action="obras_imagens.php?action=save" class="dropzone">
                                        <input type="hidden" name="id_image_user" value="<?php echo $_SESSION['usuarioId']; ?>">
                                        <input type="text" name="titulo" class="form-control border-input text-center" placeholder="Descrição da galeria de fotos" style="background-color: #fff; border: 1px dotted #ddd;border-bottom: 1px dashed #ccc;font-size: 1.0em;">
                                    </form>
                                    <p style="margin-top: 15px;"><small>Extensões de arquivos aceitas <strong>[jpg, jpeg, png, e gif]</strong></small></p>
                                  </div>
                              </div>
                            </div>

                            <table class="table table-hover tabela_listar_datatable">
                          <thead>
                            <tr>
                              <th>Imagem</th>
                              <th>Arquivo</th>
                              <th>Descrição</th>
                              <th class="text-center">Data</th>
                              <th class="text-center">Ações</th>
                        
                            </tr>
                          </thead>
                            <tbody style="font-size: .8em;">
                              <?php 
                                    $stmt_select = "SELECT * FROM obras_imagens  WHERE id_image_user = {$_SESSION['usuarioId']} ORDER by image_id";
                                    $resultado_cursos = mysqli_query($conn, $stmt_select);
                                    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                                    while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                                ?>
                                <tr>
                                    <td><img src="<?php echo $rows_cursos['image_path']; ?>" width="60" height="20"></td>
                                    <td><?php echo $rows_cursos['image_path']; ?></td>
                                    <td><?php echo $rows_cursos['titulo']; ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($rows_cursos['date'])); ?></td>
                                    <td style="text-align: center;"><a title="Editar" href="obras_imagens_edi.php?edit_id=<?php echo $rows_cursos['image_id']; ?>"><i class="fa fa-edit" style="color: #0B610B;"></i></a><a title="Excluír" href="?delete_id=<?php echo $rows_cursos['image_id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <?php
          include("footer.php");
        ?>