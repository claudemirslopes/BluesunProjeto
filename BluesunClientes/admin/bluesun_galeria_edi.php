<?php
  session_start();
  include_once("seguranca.php");
  include_once("conexao/conexao.php");
  seguranca_adm();
?>
<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM bluesun_galeria WHERE imabs_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: bluesun_galeria.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $titulo = $_POST['titulo'];// user name
        $date = $_POST['date'];// user name

        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bluesun_galeria
                                         SET titulo=:utitulo, 
                                             date=:udate
                                       WHERE imabs_id=:uid');
            $stmt->bindParam(':utitulo',$titulo);
            $stmt->bindParam(':udate',$date);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='bluesun_galeria.php';
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
                                    <h3 class="title">Descrição da imagem</h3>
                                    <p class="category" style="font-size: 1.2em;color: #555;">Editar descrição da imagem.</p>
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

                                    <div class="header col-lg-6">
                                        <img src="<?php echo $image_path; ?>" style="width: 100%;height: auto;border-radius: 5px;">
                                    </div>

                                    <div class="col-lg-6" style="padding-left: 15px;">
                                        <div class="row">

                                            <input type="hidden" name="image_id" class="form-control border-input" value="<?php echo $imabs_id; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;" readonly>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descrição</label>
                                                    <input type="text" name="titulo" class="form-control border-input" value="<?php echo $titulo; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1em;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row hidden">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Data de Modificação</label>
                                                    <input type="text" name="date" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="btn_save_updates" class="btn btn-danger btn-fill btn-wd" style="background: #B40431;border-color: #ccc;"><i class="fa fa-edit"></i> Editar</button>
                                        </div>
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