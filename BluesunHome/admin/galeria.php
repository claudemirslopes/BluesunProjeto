<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1") {
      include_once("conexao/conexao.php");
  } else {
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
  } 

  require_once 'dbconfig.php';
    
    if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT * FROM bs_galeria WHERE galeria_id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM bs_galeria WHERE galeria_id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: galeria.php");
    }
  
?>
<?php
if (! empty($_FILES)) {
    $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
    $targetPath = "img/galeria/";
    $imagePath = $targetPath . $imagePath;
    $tempFile = $_FILES['file']['tmp_name'];
    $galeria_album_id = $_POST['galeria_album_id'];
    
    $targetFile = $targetPath . $_FILES['file']['name'];
    
    if (move_uploaded_file($tempFile, $targetFile)) {
        echo "true";
    } else {
        echo "false";
    }
}
if (! empty($_GET["action"]) && $_GET["action"] == "save") {
    require_once ("conexao/db.php");
    print $sql = "INSERT INTO bs_galeria(galeria_img,galeria_album_id) VALUES('$imagePath','$galeria_album_id')";
    mysqli_query($conn, $sql);
    $current_id = mysqli_insert_id($conn);
}
?>
<?php include_once ('header.php') ?>
<link rel="stylesheet" type="text/css" href="vendor/dropzone/dropzone.css" />
<script type="text/javascript" src="vendor/dropzone/dropzone.js"></script>

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
                        <h1 class="h3 mb-0 text-gray-800">Galeria</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Adicionar / Editar Imagens</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                      <style type="text/css">
                      
                      th.colimg{
                        width: 20%;
                      }

                      th.colarq{
                        width: 20%;
                      }

                      th.coldes{
                        width: 20%;
                      }

                      th.coldat{
                        width: 20%;
                      }

                      th.colacao{
                        width: 20%;
                      }

                      div.shadow-none{
                        background-color: #fff;
                        height: 200px;
                        width: 100%;
                        border: 2px solid;                     
                      }

                      div.shadow-none:hover{
                        background-color: #e6e6e6; 
                      }

                      div.jumbotron{
                        height: 278px;
                        width: 100%;
                      }

                      p.caixa{
                        text-align: center;
                      
                      }
                      </style>

                    <div class="jumbotron" style="text-align: center;padding: .9rem .5rem;background-color: #1CC88A;">
                      <div class="row">
                        <div class="col-sm-12">
                          <form name="frmImage" action="galeria.php?action=save" class="dropzone">
                              <input type="text" name="galeria_album_id" class="form-control border-input text-center" placeholder="ID do Álbum" style="background-color: #fff; border: 1px dotted #ddd;border-bottom: 1px dashed #ccc;font-size: 1.0em;">
                          </form>
                          <p style="margin-top: 15px;color: #fff; font-weight: bold;"><small>Extensões de arquivos aceitas <strong>[jpg, jpeg, png, e gif]</strong></small></p>
                        </div>
                      </div>
                    </div>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col" class="colimg text-left">Imagem</th>
                          <th scope="col" class="colimg text-left">Álbum</th>
                          <th scope="col" class="coldat text-center">Data</th>
                          <th scope="col" class="colacao text-right">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $stmt_select = "SELECT * FROM bs_galeria as galeria JOIN bs_album as album ON album.album_id = galeria.galeria_album_id ORDER by galeria_id";
                            $resultado_cursos = mysqli_query($conn, $stmt_select);
                            $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
                            while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ 
                        ?>
                        <tr>
                          <th class="text-left" scope="row"><img src="<?php echo $rows_cursos['galeria_img']; ?>" width="60" height="20"></th>
                          <td class="text-left"><?php echo $rows_cursos['album_descricao']; ?></td>
                          <td class="text-center"><?php echo date('d/m/Y', strtotime($rows_cursos['date'])); ?></td>
                          <td class="text-right"><a title="Excluír" href="?delete_id=<?php echo $rows_cursos['galeria_id']; ?>" onclick="return confirm('Confirma a exclusão?')"><i class="fa fa-trash" style="color: #ff0000;"></i></a></td>
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