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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_datasheet AS dsheet JOIN bs_marcas AS mar ON mar.marcas_id = dsheet.datasheet_marca_id WHERE datasheet_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: datasheets.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $datasheet_marca_id = $_POST['datasheet_marca_id'];// user name
        $datasheet_titulo = $_POST['datasheet_titulo'];// user name
        $datasheet_data = $_POST['datasheet_data'];// user name

        $imgFile = $_FILES['datasheet_arquivo']['name'];
        $tmp_dir = $_FILES['datasheet_arquivo']['tmp_name'];
        $imgSize = $_FILES['datasheet_arquivo']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../assets/pdf/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('pdf', 'doc', 'docx', 'rar', 'zip'); // valid extensions
            $imagem = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 15000000)
                {
                    unlink($upload_dir.$edit_row['datasheet_arquivo']);
                    move_uploaded_file($tmp_dir,$upload_dir.$imagem);
                }
                else
                {
                    $errMSG = "Desculpa, arquivo muito grande, deve ser menor que 5MB";
                }
            }
            else
            {
                $errMSG = "Desculpa, somente PDF, DOC, DOCX, RAR e ZIP são extensões permitidas.";       
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $imagem = $edit_row['datasheet_arquivo']; // old image from database
        }         
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_datasheet
                                         SET datasheet_marca_id=:datasheet_marca_id,
                                             datasheet_titulo=:datasheet_titulo,
                                             datasheet_data=:datasheet_data,
                                             datasheet_arquivo=:datasheet_arquivo
                                       WHERE datasheet_id=:uid');
            $stmt->bindParam(':datasheet_marca_id',$datasheet_marca_id);
            $stmt->bindParam(':datasheet_titulo',$datasheet_titulo);
            $stmt->bindParam(':datasheet_data',$datasheet_data);
            $stmt->bindParam(':datasheet_arquivo',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='datasheets.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Datasheets</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Datasheets</h1>
                    </div>                

                </div>




            <div class="card-body">    
                <div class="row">
                    <div class="col-lg-12">

                      <?php if(isset($errMSG)){ ?>
                        <div class="alert alert-danger">
                          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
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
                                <option value="<?php echo $datasheet_marca_id; ?>" readonly=""><?php echo $marcas_titulo; ?></option>
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


                        <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>                      


                      </form>

                    </div>                    


                </div>    

            </div>
            <!-- End of Main Content -->
        </div>
   <?php include_once ('footer.php') ?>         