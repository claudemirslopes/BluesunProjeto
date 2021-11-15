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
    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['btnsave']))
    {
        $album_descricao = $_POST['album_descricao'];// user name
        $album_texto = $_POST['album_texto'];// user name
        
        $imgFile = $_FILES['album_img']['name'];
        $tmp_dir = $_FILES['album_img']['tmp_name'];
        $imgSize = $_FILES['album_img']['size'];
        
        
        if(empty($album_descricao)){
            $errMSG = "Por favor, entre com a descrição.";
        }
        if(empty($album_texto)){
            $errMSG = "Por favor, entre com o texto.";
        }
        else if(empty($imgFile)){
            $errMSG = "Por favor, selecione uma imagem.";
        }
        else
        {
            $upload_dir = '../img/album/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
            // rename uploading image
            $album_img = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$album_img);
                }
                else{
                    $errMSG = "Desculpa, este arquivo é muito grande.";
                }
            }
            else{
                $errMSG = "Desculpa, somente JPG, JPEG, PNG e GIF são extensões permitidas.";       
            }
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO bs_album(album_descricao,album_texto,album_img) VALUES(:album_descricao, :album_texto, :album_img)');
            $stmt->bindParam(':album_descricao',$album_descricao);
            $stmt->bindParam(':album_texto',$album_texto);
            $stmt->bindParam(':album_img',$album_img);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;album.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "erro quando é inserido....";
            }
        }
    }
    date_default_timezone_set('America/Sao_Paulo');
    $date = date('d-m-Y H:i');
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
                        <h1 class="h3 mb-0 text-gray-800">Álbum</h1>
                    </div>            

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">
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
                        <form role="form" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="album_descricao" class="form-control border-input" value="<?php echo $album_descricao; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Imagem Destacada</label>
                                                <input type="file" name="album_img" accept="image/*" class="form-control border-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descricao</label>
                                                <textarea id="rrr" name="album_texto" class="form-control border-input" rows="4" placeholder="Digite a descrição" required=""><?php echo $album_texto; ?></textarea>
                                            </div>
                                            <script src="vendor/ckeditor/ckeditor.js"></script>
                                            <script>
                                                    CKEDITOR.replace( 'txtArtigo' );
                                            </script>
                                        </div>
                                    </div>

                                    <input type="hidden" readonly="" name="depoimento_id_user" class="form-control border-input" value="<?php echo $_SESSION['usuarioId']; ?>">

                                    <div class="text-center">
                                        <button type="submit" name="btnsave" class="btn btn-danger btn-fill btn-wd" style="background-color: #FE2E2E;border-color: #FE2E2E;"><i class="fa fa-plus-square"></i> Adicionar</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>

                    </div>
                       
                </div>    

            </div>
            <!-- End of Main Content -->
        </div>       

   <?php include_once ('footer.php') ?>         