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
        $marcas_titulo = $_POST['marcas_titulo'];// user name
        $marcas_url = $_POST['marcas_url'];// user name
        $marcas_data = $_POST['marcas_data'];// user name
        
        $imgFile = $_FILES['marcas_img']['name'];
        $tmp_dir = $_FILES['marcas_img']['tmp_name'];
        $imgSize = $_FILES['marcas_img']['size'];
        
        
        if(empty($marcas_titulo)){
            $errMSG = "Por favor, entre com nome do Fornececedor.";
        }
        if(empty($marcas_url)){
            $errMSG = "Por favor, entre com o Site do Fornecedor.";
        }
        else if(empty($imgFile)){
            $errMSG = "Por favor, selecione a Logo do Fornecedor.";
        }
        else
        {
            $upload_dir = '../img/logo-marcas/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
            // rename uploading image
            $marcas_img = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$marcas_img);
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
            $stmt = $DB_con->prepare('INSERT INTO bs_marcas(marcas_titulo,marcas_url,marcas_data,marcas_img) VALUES(:marcas_titulo, :marcas_url, :marcas_data,  :marcas_img)');
            $stmt->bindParam(':marcas_titulo',$marcas_titulo);
            $stmt->bindParam(':marcas_url',$marcas_url);
            $stmt->bindParam(':marcas_data',$marcas_data);
            $stmt->bindParam(':marcas_img',$marcas_img);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                ?>
                <script>
                window.location.href='marcas.php';
                </script>
                <?php
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
                        <h1 class="h3 mb-0 text-gray-800">Marcas</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Adicionar Marcas</h1>
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
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nome-marcas">Nome</label>
                                <input type="text" class="form-control" id="nome-marcas" placeholder="Nome do Fornecedor" name="marcas_titulo" value="<?php echo $marcas_titulo; ?>">
                            </div>
                          
                            <div class="form-group col-md-12">
                                <label for="url-marcas">URL</label>
                                <input type="text" class="form-control" id="url-marcas" placeholder="URL site Fornecedor" name="marcas_url" value="<?php echo $marcas_url; ?>">
                            </div>
                        </div>
                        

                          <div class="form-group">
                            <label for="logo-marcas">Adicionar Logo</label>
                            <input type="file" class="form-control-file" id="logo-marcas" name="marcas_img" value="<?php echo $marcas_img; ?>">
                          </div>


                        <button type="submit" name="btnsave" class="btn btn-success">Salvar alterações</button>

                    </form>

                    </div>
                       
                </div>    

            </div>
            <!-- End of Main Content -->
        </div>       

   <?php include_once ('footer.php') ?>         