<?php
  session_start();
  include_once("seguranca.php");
  include_once("conexao/conexao.php");
  seguranca_adm();
?>
<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['btnsave']))
    {
        $titulo = $_POST['titulo'];// user name
        $subtitulo = $_POST['subtitulo'];// user name
        $opcoes1 = $_POST['opcoes1'];// user name
        $opcoes2 = $_POST['opcoes2'];// user name
        $opcoes3 = $_POST['opcoes3'];// user name
        $opcoes4 = $_POST['opcoes4'];// user name
        $datacad = $_POST['datacad'];// user name
        $datamod = $_POST['datamod'];// user name
        
        $imgFile = $_FILES['userPic']['name'];
        $tmp_dir = $_FILES['userPic']['tmp_name'];
        $imgSize = $_FILES['userPic']['size'];
        
        
        if(empty($titulo)){
            $errMSG = "Por favor, entre com o titulo.";
        }
        else if(empty($imgFile)){
            $errMSG = "Por favor, selecione uma imagem.";
        }
        else
        {
            $upload_dir = '../public/solar/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
            // rename uploading image
            $userPic = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$userPic);
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
            $stmt = $DB_con->prepare('INSERT INTO energia_solar(titulo,subtitulo,opcoes1,opcoes2,opcoes3,opcoes4,datacad,datamod,userPic) VALUES(:utitulo, :usubtitulo, :uopcoes1, :uopcoes2, :uopcoes3, :uopcoes4, :udatacad, :udatamod,  :uuserPic)');
            $stmt->bindParam(':utitulo',$titulo);
            $stmt->bindParam(':usubtitulo',$subtitulo);
            $stmt->bindParam(':uopcoes1',$opcoes1);
            $stmt->bindParam(':uopcoes2',$opcoes2);
            $stmt->bindParam(':uopcoes3',$opcoes3);
            $stmt->bindParam(':uopcoes4',$opcoes4);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uuserPic',$userPic);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;energia_solar.php"); // redirects image view page after 5 seconds.
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
<?php
  include("header.php");
?>

<div class="wrapper">
    <?php
      include("sidebar.php");
    ?>

    <div class="main-panel">
        <?php
          include("nav.php");
        ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Adicionar Registro</h4>
                            </div>
                            <div class="content">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" name="titulo" class="form-control border-input" value="<?php echo $titulo; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subtítulo</label>
                                                <input type="text" name="subtitulo" class="form-control border-input" value="<?php echo $subtitulo; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Opção 1</label>
                                                <input type="text" name="opcoes1" class="form-control border-input" value="<?php echo $opcoes1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Opção 2</label>
                                                <input type="text" name="opcoes2" class="form-control border-input" value="<?php echo $opcoes2; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Opção 3</label>
                                                <input type="text" name="opcoes3" class="form-control border-input" value="<?php echo $opcoes3; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Opção 4</label>
                                                <input type="text" name="opcoes4" class="form-control border-input" value="<?php echo $opcoes4; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Imagem</label>
                                                <input type="file" name="userPic" accept="image/*" class="form-control border-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row hidden">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Data de Cad.</label>
                                                <input type="text" name="datacad" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Data de Mod.</label>
                                                <input type="text" name="datamod" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="btnsave" class="btn btn-danger btn-fill btn-wd" style="background-color: #FE2E2E;border-color: #FE2E2E;"><i class="fa fa-plus-square"></i> Adicionar</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <?php
          include("footer.php");
        ?>