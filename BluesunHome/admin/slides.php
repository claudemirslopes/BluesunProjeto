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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_slide WHERE slide_id =:uid');
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
        $slide_titulo = $_POST['slide_titulo'];// user name
        $slide_subtitulo = $_POST['slide_subtitulo'];// user name
        $slide_texto = $_POST['slide_texto'];// user name
        $slide_url = $_POST['slide_url'];// user name
        $slide_img = $_POST['slide_img'];// user name
        $slide_data = $_POST['slide_data'];// user name
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_slide
                                         SET slide_titulo=:slide_titulo,
                                             slide_subtitulo=:slide_subtitulo,
                                             slide_texto=:slide_texto,
                                             slide_url=:slide_url,
                                             slide_img=:slide_img,
                                             slide_data=:slide_data
                                       WHERE slide_id=:uid');
            $stmt->bindParam(':slide_titulo',$slide_titulo);
            $stmt->bindParam(':slide_subtitulo',$slide_subtitulo);
            $stmt->bindParam(':slide_texto',$slide_texto);
            $stmt->bindParam(':slide_url',$slide_url);
            $stmt->bindParam(':slide_img',$slide_img);
            $stmt->bindParam(':slide_data',$slide_data);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='slides.php?edit_id=1';
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
                        <h1 class="h3 mb-0 text-gray-800">Slides</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar slide</h1>
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
                                <label for="titulo-slide">Título</label>
                                <input type="text" class="form-control" id="titulo-slide" placeholder="Título do Slide" name="slide_titulo" value="<?php echo $slide_titulo; ?>">
                              </div>

                              <div class="form-group col-md-12">
                                <label for="subtitulo-slide">Subtitulo</label>
                                <input type="text" class="form-control" id="subtitulo-slide" placeholder="Subtitulo do Slide" name="slide_subtitulo" value="<?php echo $slide_subtitulo; ?>">
                              </div>
                            
                            <!-- Texto abaixo do vídeo-->
                              <div class="form-group col-md-12">
                                <label for="faixatexto-slide">Faixa de texto</label>
                                <input type="text" class="form-control" id="faixatexto-slide" placeholder="Faixa de texto abaixo do Slide" name="slide_texto" value="<?php echo $slide_texto; ?>">
                              </div>
                            </div>
                            

                          <div class="form-group col-md-12">
                                <label for="url-slide">URL Vídeo de Apresentação</label>
                                <input type="text" class="form-control" id="url-slide" name="slide_url" value="<?php echo $slide_url; ?>">
                            </div>

                          <br>

                          <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>
                             
                          </form>

                  </div>     
               
                </div>
              </div>
            </div>
   <?php include_once ('footer.php') ?>         