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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_historia WHERE historia_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: index.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $historia_texto = $_POST['historia_texto'];// user name
        $historia_data = $_POST['historia_data'];// user name
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_historia
                                         SET historia_texto=:historia_texto,
                                             historia_data=:historia_data
                                       WHERE historia_id=:uid');
            $stmt->bindParam(':historia_texto',$historia_texto);
            $stmt->bindParam(':historia_data',$historia_data);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='historia.php?edit_id=1';
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
                        <h1 class="h3 mb-0 text-gray-800">História</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar História</h1>
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

                      <div class="form-group">
                        <label for="texto-historia">Historia Bluesun</label>
                        <textarea class="form-control" id="texto-historia" rows="10" name="historia_texto"><?php echo $historia_texto; ?></textarea>
                      </div>   
                      <script src="vendor/ckeditor/ckeditor.js"></script>
                      <script>
                        CKEDITOR.replace( 'texto-historia' );
                      </script>                  



                     <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>
                      </form>
                            
                    </div>        
               
                </div>

              </div>
            </div>
            
<?php include_once ('footer.php') ?>         