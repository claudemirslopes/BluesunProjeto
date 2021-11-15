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
        $stmt_edit = $DB_con->prepare('SELECT * FROM videos WHERE id_video =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: videos.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $titulo = $_POST['titulo'];// user name
        $autor = $_POST['autor'];// user name
        $url = $_POST['url'];
        
        $imgFile = $_FILES['imagem']['name'];
        $tmp_dir = $_FILES['imagem']['tmp_name'];
        $imgSize = $_FILES['imagem']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../videos/images/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $imagem = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['imagem']);
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
            $imagem = $edit_row['imagem']; // old image from database
        }         
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE videos
                                         SET titulo=:titulo,
                                             autor=:autor,
                                             url=:url,
                                             imagem=:imagem
                                       WHERE id_video=:uid');
            $stmt->bindParam(':titulo',$titulo);
            $stmt->bindParam(':autor',$autor);
            $stmt->bindParam(':url',$url);
            $stmt->bindParam(':imagem',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='videos.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Vídeos</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Adicionar Vídeo</h1>
                    </div>                

                </div>


                <div class="card-body">    
                    <div class="row">
                        <div class="col-lg-12">
                          <?php
                                if(isset($errMSG)){
                            ?>
                            <div class="alert alert-danger">
                              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
                            </div>
                            <?php
                                }
                            ?>
                            <form role="form" method="post" enctype="multipart/form-data">

                            <div class="form-row">
                              <div class="form-group col-md-8">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo; ?>" placeholder="Digite o titulo">
                              </div>
                              
                              <div class="form-group col-md-4">
                                <label for="autor">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $autor; ?>" placeholder="Digite o autor">
                              </div>

                              <div class="form-group col-md-7">
                                <label for="url">URL do Vídeo</label>
                                <input type="text" class="form-control" id="url" name="url" value="<?php echo $url; ?>" placeholder="Digite a URL do vídeo">
                              </div>                              
                            
                              <div class="form-group col-md-5">
                                <label for="imagem">Imagem da capa</label>
                                <input type="file" class="form-control" id="imagem" name="imagem" value="<?php echo $imagem; ?>">
                              </div>

                            </div>

                            <input type="hidden" name="id_video" value="<?php echo $id_video; ?>">

                            <button  type="submit" name="btn_save_updates" class="btn btn-danger" style="float: right;"><i class="fa fa-youtube-square" aria-hidden="true"></i> Adicionar vídeo</button>
                        
                            </form> 

                        </div> 
                    </div>            
                </div> 
            </div>
<?php include_once ('footer.php') ?>         