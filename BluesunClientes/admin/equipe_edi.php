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

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM equipe WHERE equipe_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: equipe.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $nome = $_POST['nome'];// user name
        $cargo = $_POST['cargo'];// user name
        $datamod = $_POST['datamod'];// user name

        $imgFile = $_FILES['userPic']['name'];
        $tmp_dir = $_FILES['userPic']['tmp_name'];
        $imgSize = $_FILES['userPic']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../public/equipe/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $imagem = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['userPic']);
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
            $imagem = $edit_row['userPic']; // old image from database
        }         
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE equipe
                                         SET nome=:unome,
                                             cargo=:ucargo,   
                                             datamod=:udatamod,
                                             userPic=:uuserPic
                                       WHERE equipe_id=:uid');
            $stmt->bindParam(':unome',$nome);
            $stmt->bindParam(':ucargo',$cargo);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uuserPic',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='equipe.php';
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
<?php include_once('header.php') ?>

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
                        <div class="card" style="background-image: url(../img/pattern/pat-3.png);">
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <div class="header col-lg-8">
                                    <h3 class="title">Equipe</h3>
                                    <p class="category" style="font-size: 1.2em;color: #555;">Equipe de trabalho da franquia.</p>
                                </div>
                                <div class="header col-lg-4">
                                    <img src="../public/equipe/<?php echo $userPic; ?>" style="width: 145px;height: auto;border-radius: 5px;">
                                </div>
                            </div>
                            <div class="content">
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
                                    <input type="hidden" name="equipe_id" class="form-control border-input" value="<?php echo $equipe_id; ?>" readonly>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" value="<?php echo $nome; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.0em;">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <input type="text" name="cargo" class="form-control border-input" value="<?php echo $cargo; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.0em;">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Imagem</label>
                                                <input type="file" name="userPic" accept="image/*" class="form-control border-input" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.0em;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row hidden">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Data de Modificação</label>
                                                <input type="text" name="datamod" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_updates" class="btn btn-danger btn-fill btn-wd" style="background: #B40431;border-color: #ccc;"><i class="fa fa-edit"></i> Editar</button>
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