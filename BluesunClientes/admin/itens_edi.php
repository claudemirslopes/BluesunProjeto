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
        $stmt_edit = $DB_con->prepare('SELECT * FROM itens WHERE item_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: itens.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $titulo = $_POST['titulo'];// user name
        $texto = $_POST['texto'];// user name
        $icone = $_POST['icone'];// user name
        $datamod = $_POST['datamod'];// user name
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE itens
                                         SET titulo=:utitulo,
                                             texto=:utexto,
                                             icone=:uicone, 
                                             datamod=:udatamod
                                       WHERE item_id=:uid');
            $stmt->bindParam(':utitulo',$titulo);
            $stmt->bindParam(':utexto',$texto);
            $stmt->bindParam(':uicone',$icone);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='itens.php';
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
                                    <h3 class="title">Itens</h3>
                                    <p class="category" style="font-size: 1.2em;color: #555;">Altere as informações das características da Bluesun.</p>
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

                                        <input type="hidden" name="item_id" class="form-control border-input" value="<?php echo $item_id; ?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.5em;" readonly>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" name="titulo" class="form-control border-input" value="<?php echo $titulo; ?>" placeholder="Digite o título" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1em;">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Texto</label>
                                                <input type="text" name="texto" class="form-control border-input" value="<?php echo $texto; ?>" placeholder="Digite o texto" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1em;">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ícone</label>
                                                <input type="text" name="icone" class="form-control border-input" value="<?php echo $icone; ?>" placeholder="Digite o ícone" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1em;">
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