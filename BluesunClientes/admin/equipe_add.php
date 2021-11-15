<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2" || $_SESSION['usuarioNiveisAcessoId'] == "3") {
      include_once("conexao/conexao.php");
  } else {
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
  } 
?>
<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['btnsave']))
    {
        $equipe_id_user = $_POST['equipe_id_user'];// user name
        $nome = $_POST['nome'];// user name
        $cargo = $_POST['cargo'];// user name
        $datacad = $_POST['datacad'];// user name
        $datamod = $_POST['datamod'];// user name
        
        $imgFile = $_FILES['userPic']['name'];
        $tmp_dir = $_FILES['userPic']['tmp_name'];
        $imgSize = $_FILES['userPic']['size'];
        
        
        if(empty($equipe_id_user)){
            $errMSG = "Por favor, entre com a ID.";
        }
        if(empty($nome)){
            $errMSG = "Por favor, entre com o nome.";
        }
        else if(empty($imgFile)){
            $errMSG = "Por favor, selecione uma imagem.";
        }
        else
        {
            $upload_dir = '../public/equipe/'; // upload directory
    
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
            $stmt = $DB_con->prepare('INSERT INTO equipe(equipe_id_user,nome,cargo,datacad,datamod,userPic) VALUES(:uequipe_id_user, :unome, :ucargo, :udatacad, :udatamod,  :uuserPic)');
            $stmt->bindParam(':uequipe_id_user',$equipe_id_user);
            $stmt->bindParam(':unome',$nome);
            $stmt->bindParam(':ucargo',$cargo);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uuserPic',$userPic);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;equipe.php"); // redirects image view page after 5 seconds.
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
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" value="<?php echo $nome; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <input type="text" name="cargo" class="form-control border-input" value="<?php echo $cargo; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
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

                                    <input type="hidden" readonly="" name="equipe_id_user" class="form-control border-input" value="<?php echo $_SESSION['usuarioId']; ?>">

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