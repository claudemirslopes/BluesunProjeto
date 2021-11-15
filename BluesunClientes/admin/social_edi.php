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
        $stmt_edit = $DB_con->prepare('SELECT * FROM social WHERE social_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: social.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $nome = $_POST['nome'];// user name
        $icone = $_POST['icone'];// user name
        $url = $_POST['url'];// user name
        $datacad = $_POST['datacad'];// user name
        $datamod = $_POST['datamod'];// user name
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE social
                                         SET nome=:unome,
                                             icone=:uicone,
                                             url=:uurl, 
                                             datamod=:udatamod
                                       WHERE social_id=:uid');
            $stmt->bindParam(':unome',$nome);
            $stmt->bindParam(':uicone',$icone);
            $stmt->bindParam(':uurl',$url);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='social.php';
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
                                <div class="header col-lg-12">
                                    <h3 class="title">Redes Sociais</h3>
                                    <p class="category" style="font-size: 1.2em;color: #555;">Altere as informações das redes sociais do site.</p>
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
                                    <div class="row">

                                        <input type="hidden" name="social_id" class="form-control border-input" value="<?php echo $social_id; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;" readonly>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" value="<?php echo $nome; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Ícone</label>
                                                <input type="text" name="icone" class="form-control border-input" value="<?php echo $icone; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Link URL</label>
                                                <input type="text" name="url" class="form-control border-input" value="<?php echo $url; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Data de Modificação</label>
                                                <input type="text" name="datamod" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.0em;">
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