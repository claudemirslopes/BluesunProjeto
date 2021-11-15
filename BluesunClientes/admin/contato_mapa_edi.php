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
        $stmt_edit = $DB_con->prepare('SELECT * FROM contato_mapa WHERE contato_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: contato_mapa.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $endereco = $_POST['endereco'];// user name
        $bairro = $_POST['bairro'];// user name
        $cidade = $_POST['cidade'];// user name
        $uf = $_POST['uf'];// user name
        $telefone = $_POST['telefone'];// user name
        $email = $_POST['email'];// user name
        $mapa = $_POST['mapa'];// user name
        $datamod = $_POST['datamod'];// user name
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE contato_mapa
                                         SET endereco=:uendereco,
                                             bairro=:ubairro, 
                                             cidade=:ucidade,
                                             uf=:uuf,
                                             telefone=:utelefone,
                                             email=:uemail,
                                             mapa=:umapa,
                                             datamod=:udatamod
                                       WHERE contato_id=:uid');
            $stmt->bindParam(':uendereco',$endereco);
            $stmt->bindParam(':ubairro',$bairro);
            $stmt->bindParam(':ucidade',$cidade);
            $stmt->bindParam(':uuf',$uf);
            $stmt->bindParam(':utelefone',$telefone);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':umapa',$mapa);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='contato_mapa.php';
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
                                    <h3 class="title">Contato</h3>
                                    <p class="category" style="font-size: 1.2em;color: #555;">Altere as de contato do site.</p>
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
                                    
                                    <input type="hidden" name="contato_id" class="form-control border-input" value="<?php echo $contato_id; ?>"readonly>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Endereço</label>
                                                <input type="text" name="endereco" class="form-control border-input" value="<?php echo $endereco; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" name="bairro" class="form-control border-input" value="<?php echo $bairro; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" name="cidade" class="form-control border-input" value="<?php echo $cidade; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>UF</label>
                                                <select name="uf" class="form-control border-input">
                                                    <option selected="" value="<?php echo $uf; ?>"><?php echo $uf; ?></option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AM</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SP">SP</option>
                                                    <option value="SE">SE</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Telefone</label>
                                                <input type="text" name="telefone" class="form-control border-input" value="<?php echo $telefone; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" name="email" class="form-control border-input" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Data de Modificação</label>
                                                <input type="text" name="datamod" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.0em;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cód. Mapa</label>
                                                <textarea id="txtArtigo" rows="3" name="mapa" class="form-control border-input" style="background-color: #fff; border: 1px hidden #fff;border-bottom: 1px dashed #ccc;font-size: 1.0em;"><?php echo $mapa; ?></textarea>
                                            </div>
                                            <script src="assets/ckeditor/ckeditor.js"></script>
                                            <script>
                                                    CKEDITOR.replace( 'txtArtigo' );
                                            </script>
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