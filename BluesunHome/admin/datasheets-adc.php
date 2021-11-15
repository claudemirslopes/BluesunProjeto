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
        $datasheet_marca_id = $_POST['datasheet_marca_id'];// user name
        $datasheet_titulo = $_POST['datasheet_titulo'];// user name
        $datasheet_data = $_POST['datasheet_data'];// user name
        
        $imgFile = $_FILES['datasheet_arquivo']['name'];
        $tmp_dir = $_FILES['datasheet_arquivo']['tmp_name'];
        $imgSize = $_FILES['datasheet_arquivo']['size'];
        
        
        if(empty($datasheet_titulo)){
            $errMSG = "Por favor, entre com nome do datasheet.";
        }
        else if(empty($imgFile)){
            $errMSG = "Por favor, selecione o arquivo em PDF.";
        }
        else
        {
            $upload_dir = '../assets/pdf/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('pdf', 'doc', 'docx', 'rar', 'zip'); // valid extensions
        
            // rename uploading image
            $datasheet_arquivo = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 15000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$datasheet_arquivo);
                }
                else{
                    $errMSG = "Desculpa, este arquivo é muito grande.";
                }
            }
            else{
                $errMSG = "Desculpa, somente PDF, DOC, DOCX, RAR e ZIP são extensões permitidas.";       
            }
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO bs_datasheet(datasheet_marca_id,datasheet_titulo,datasheet_data,datasheet_arquivo) VALUES(:datasheet_marca_id, :datasheet_titulo, :datasheet_data,  :datasheet_arquivo)');
            $stmt->bindParam(':datasheet_marca_id',$datasheet_marca_id);
            $stmt->bindParam(':datasheet_titulo',$datasheet_titulo);
            $stmt->bindParam(':datasheet_data',$datasheet_data);
            $stmt->bindParam(':datasheet_arquivo',$datasheet_arquivo);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;datasheets.php"); // redirects image view page after 5 seconds.
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
                        <h1 class="h3 mb-0 text-gray-800">Datasheets</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Adicionar Datasheets</h1>
                    </div>                

                </div>


            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                      <?php
                        if(isset($errMSG)){ ?>
                          <div class="alert alert-danger">
                              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                          </div>
                              <?php
                            } else if(isset($successMSG)){
                                ?>
                                <div class="alert alert-success">
                                      <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                                </div>
                                <?php } ?>
                        <form role="form" method="post" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group col-md-2">
                              <label for="marca-datasheets">Escolha uma Marca</label>
                              <?php
                                  $stmt = $DB_con->query("SELECT * FROM bs_marcas ORDER BY marcas_id ASC");
                                  $marcas = $stmt->fetchAll();
                                ?>
                              <select class="form-control" id="marca-datasheets" name="datasheet_marca_id">
                                <option>Escolha uma marca</option>
                                <?php foreach($marcas as $marca): ?>
                                <option value="<?php echo $marca['marcas_id'] ?>"><?php echo $marca['marcas_titulo'] ?></option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                            <div class="form-group col-md-7">
                                <label for="titulo-datasheets">Título</label>
                                <input type="text" name="datasheet_titulo" class="form-control" id="titulo-datasheets" placeholder="Título da Datasheet" value="<?php echo $datasheet_titulo; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="arquivo-datasheets">Escolher Arquivo</label>
                                <input type="file" name="datasheet_arquivo" class="form-control" id="arquivo-datasheets">
                            </div>
                        </div>


                        <button type="submit" name="btnsave" class="btn btn-success">Adicionar informação</button>                      


                      </form>

                    </div>
                       
                </div>    

            </div>
            <!-- End of Main Content -->
        </div>        

   <?php include_once ('footer.php') ?>         