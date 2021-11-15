<?php
  session_start();
  include_once("seguranca.php");
  include_once("conexao/conexao.php");
  seguranca_adm();

   require_once 'dbconfig.php';
    
    if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT * FROM slides WHERE imasl_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM slides WHERE imasl_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: slides.php");
    }
?>
<?php



if (! empty($_FILES)) {
    $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
    $targetPath = "../public/slides/";
    $imagePath = $targetPath . $imagePath;
    $tempFile = $_FILES['file']['tmp_name'];
    
    $targetFile = $targetPath . $_FILES['file']['name'];
    
    if (move_uploaded_file($tempFile, $targetFile)) {
        echo "true";
    } else {
        echo "false";
    }
}
if (! empty($_GET["action"]) && $_GET["action"] == "save") {
    require_once ("conexao/db.php");
    print $sql = "INSERT INTO slides(image_path) VALUES('$imagePath')";
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
                            <div class="header col-md-8" style="margin-bottom: 20px;">
                                <h4 class="title">Slides do Site</h4>
                            </div>
                            <div class="header col-lg-4">
                                <p class="category">
                                    <a href="slide_texto.php?edit_id=1"><button type="submit" class="btn btn-secondary btn-fill btn-sm" style="float: right;"><i class="fa fa-plus"></i>&nbsp;&nbsp;Alterar texto do slide</button></a>
                                </p>
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
                                <div class="jumbotron" style="text-align: center;padding: .9rem .5rem;background-color: #CEF6CE;margin-top: 45px;">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <form name="frmImage" action="slides.php?action=save" class="dropzone">
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
                              <th class="text-center">Data</th>
                              <th class="text-center">Ações</th>
                        
                            </tr>
                          </thead>
                            <tbody style="font-size: .8em;">
                              <?php 
                                    $stmt_select = "SELECT * FROM slides ORDER by imasl_id";
                                    $resultado_cursos = mysqli_query($conn, $stmt_select);
                                    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                                    while($rows = mysqli_fetch_assoc($resultado_cursos)){ 
                                ?>
                                <tr>
                                    <td><img src="<?php echo $rows['image_path']; ?>" width="60" height="20"></td>
                                    <td><?php echo $rows['image_path']; ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($rows['date'])); ?></td>
                                    <td style="text-align: center;"><a title="Editar" href="slides.php?edit_id=<?php echo $rows['imasl_id']; ?>"><i class="fa fa-edit" style="color: #0B610B;"></i></a><a title="Excluír" href="?delete_id=<?php echo $rows['imasl_id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></a></td>
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