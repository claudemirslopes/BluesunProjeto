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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_divisoes WHERE divisoes_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: divisoes.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $divisoes_titulo = $_POST['divisoes_titulo'];// user name
        $divisoes_subtitulo = $_POST['divisoes_subtitulo'];// user name
        $divisoes_url = $_POST['divisoes_url'];// user name
        $divisoes_linkbotao = $_POST['divisoes_linkbotao'];// user name
        $divisoes_data = $_POST['divisoes_data'];// user name

        $imgFile = $_FILES['divisoes_img']['name'];
        $tmp_dir = $_FILES['divisoes_img']['tmp_name'];
        $imgSize = $_FILES['divisoes_img']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../img/divisoes/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $imagem = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['divisoes_img']);
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
            $imagem = $edit_row['divisoes_img']; // old image from database
        }         
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_divisoes
                                         SET divisoes_titulo=:divisoes_titulo,
                                             divisoes_subtitulo=:divisoes_subtitulo,
                                             divisoes_url=:divisoes_url,
                                             divisoes_linkbotao=:divisoes_linkbotao, 
                                             divisoes_data=:divisoes_data,
                                             divisoes_img=:divisoes_img
                                       WHERE divisoes_id=:uid');
            $stmt->bindParam(':divisoes_titulo',$divisoes_titulo);
            $stmt->bindParam(':divisoes_subtitulo',$divisoes_subtitulo);
            $stmt->bindParam(':divisoes_url',$divisoes_url);
            $stmt->bindParam(':divisoes_linkbotao',$divisoes_linkbotao);
            $stmt->bindParam(':divisoes_data',$divisoes_data);
            $stmt->bindParam(':divisoes_img',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='divisoes.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Divisoes</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar divisoes</h1>
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

                            <div class="form-group col-md-12">
                                <label for="titulo-divisoes">Título</label>
                                <input type="text" class="form-control" id="titulo-divisoes" name="divisoes_titulo" value="<?php echo $divisoes_titulo; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="subtitulo-divisoes">Subtitulo</label>
                                <input type="text" class="form-control" id="subtitulo-divisoes" name="divisoes_subtitulo" value="<?php echo $divisoes_subtitulo; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="url-divisoes">URL</label>
                                <input type="text" class="form-control" id="url-divisoes" name="divisoes_url" value="<?php echo $divisoes_url; ?>">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="imagem-divisoes">Imagem/Foto</label>
                                <input type="file" class="form-control-file" id="img-divisoes" name="divisoes_img" value="<?php echo $divisoes_img; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="linkbotao-divisoes">Link do Botão</label>
                                <input type="text" class="form-control" id="linkbotao-divisoes" name="divisoes_linkbotao" value="<?php echo $divisoes_linkbotao; ?>">
                            </div>
                          
                        </div>
                        

                        <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>

                    </form>

                    </div>
                       
                </div>    

            </div>
            <!-- End of Main Content -->
        </div>       

   <?php include_once ('footer.php') ?>         