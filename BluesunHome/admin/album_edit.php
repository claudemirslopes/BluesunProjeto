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

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_album WHERE album_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: album.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $album_descricao = $_POST['album_descricao'];// user name
        $album_texto = $_POST['album_texto'];// user name
        
        $imgFile = $_FILES['album_img']['name'];
        $tmp_dir = $_FILES['album_img']['tmp_name'];
        $imgSize = $_FILES['album_img']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../img/album/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $imagem = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 15000000)
                {
                    unlink($upload_dir.$edit_row['album_img']);
                    move_uploaded_file($tmp_dir,$upload_dir.$imagem);
                }
                else
                {
                    $errMSG = "Desculpa, arquivo muito grande, deve ser menor que 5MB";
                }
            }
            else
            {
                $errMSG = "Desculpa, somente JPG, JPEG, PNG e GIF são extensões permitidas.";      
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $imagem = $edit_row['album_img']; // old image from database
        }         
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_album
                                         SET album_descricao=:album_descricao,
                                             album_texto=:album_texto,
                                             album_img=:album_img
                                       WHERE album_id=:uid');
            $stmt->bindParam(':album_descricao',$album_descricao);
            $stmt->bindParam(':album_texto',$album_texto);
            $stmt->bindParam(':album_img',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='album.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Desculpa, não foram encontrado dados para atualizar!";
            }   
        }                         
    } 
    // $pesquisar = $_GET['pesquisar'];
    $pesquisar = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';

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
                        <h1 class="h3 mb-0 text-gray-800">Álbum id: [<?php echo $album_id; ?>]</h1>
                    </div>            

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-8">
                        <?php if(isset($errMSG)){ ?>
                            <div class="alert alert-danger">
                              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
                            </div>
                        <?php } ?>
                        <form role="form" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="album_descricao" class="form-control border-input" value="<?php echo $album_descricao; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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

                                    <input type="hidden" readonly="" name="album_id" class="form-control border-input" value="<?php echo $album_id; ?>">

                                    <div class="text-center">
                                        <button type="submit" name="btn_save_updates" class="btn btn-danger btn-fill btn-wd" style="background-color: #FE2E2E;border-color: #FE2E2E;"><i class="fa fa-plus-square"></i> Editar Álbum</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>

                    </div>
                    <div class="col-lg-4 float-right">
                        <div class="row">
                            <p style="font-size: 2.0em;font-weight: bold;">Imagem Destacada</p>
                            <img src="../img/album/<?php echo $album_img; ?>" class="img-responsive" style="width: 100%">
                        </div><hr>
                        <div class="row">
                            <a class="btn btn-primary" href="galeria.php?edit_id=<?php echo $album_id; ?>" role="button" style="width: 100%;"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar fotos ao álbum</a>
                        </div>
                    </div>
                       
                </div>    

            </div>
            <!-- End of Main Content -->
        </div>       

   <?php include_once ('footer.php') ?>         