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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_fundadores WHERE fundadores_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: fundadores.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $fundadores_titulo = $_POST['fundadores_titulo'];// user name
        $fundadores_subtitulo = $_POST['fundadores_subtitulo'];// user name
        $fundadores_texto = $_POST['fundadores_texto'];// user name
        $fundadores_data = $_POST['fundadores_data'];// user name

        $imgFile = $_FILES['fundadores_img']['name'];
        $tmp_dir = $_FILES['fundadores_img']['tmp_name'];
        $imgSize = $_FILES['fundadores_img']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../img/fundadores/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $imagem = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['fundadores_img']);
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
            $imagem = $edit_row['fundadores_img']; // old image from database
        }         
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_fundadores
                                         SET fundadores_titulo=:fundadores_titulo,
                                             fundadores_subtitulo=:fundadores_subtitulo,
                                             fundadores_texto=:fundadores_texto, 
                                             fundadores_data=:fundadores_data,
                                             fundadores_img=:fundadores_img
                                       WHERE fundadores_id=:uid');
            $stmt->bindParam(':fundadores_titulo',$fundadores_titulo);
            $stmt->bindParam(':fundadores_subtitulo',$fundadores_subtitulo);
            $stmt->bindParam(':fundadores_texto',$fundadores_texto);
            $stmt->bindParam(':fundadores_data',$fundadores_data);
            $stmt->bindParam(':fundadores_img',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='fundadores.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Fundadores</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Fundadores</h1>
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
                                <label for="imagem-fundadores">Imagem/Foto</label>
                                <input type="file" class="form-control-file" id="img-fundadores" name="fundadores_img" value="<?php echo $fundadores_img; ?>">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="titulo-fundadores">Título/Nome</label>
                                <input type="text" class="form-control" id="titulo-fundadores" name="fundadores_titulo" value="<?php echo $fundadores_titulo; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="subtitulo-fundadores">Subtitulo/Cargo</label>
                                <input type="text" class="form-control" id="titulo-fundadores" name="fundadores_subtitulo" value="<?php echo $fundadores_subtitulo; ?>">
                            </div>
                          
                            <div class="form-group col-md-12">
                                <label for="texto-fundadores">Texto/Biografia</label>
                                <textarea class="form-control" id="texto-fund" rows="10" name="fundadores_texto"><?php echo $fundadores_texto; ?></textarea>
                            </div>
                            <script src="vendor/ckeditor/ckeditor.js"></script>
                              <script>
                                CKEDITOR.replace( 'texto-fund' );
                              </script> 
                        </div>
                        

                        <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>

                    </form>

                    </div>
                       
                </div>    

            </div>
            <!-- End of Main Content -->
        </div>       

   <?php include_once ('footer.php') ?>         