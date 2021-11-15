<?php
  session_start();
  if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2") {
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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_franqueados WHERE id_franqueado =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: franqueados.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $empresa = $_POST['empresa'];// user name
        $contato = $_POST['contato'];// user name
        $telefone = $_POST['telefone'];// user name
        $cidade = $_POST['cidade'];// user name
        $uf = $_POST['uf'];// user name
        $modalidade = $_POST['modalidade'];// user name
        $email = $_POST['email'];// user name           
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_franqueados
                                         SET empresa=:empresa,
                                             contato=:contato,
                                             telefone=:telefone, 
                                             cidade=:cidade,
                                             uf=:uf,
                                             modalidade=:modalidade,
                                             email=:email
                                       WHERE id_franqueado=:uid');
            $stmt->bindParam(':empresa',$empresa);
            $stmt->bindParam(':contato',$contato);
            $stmt->bindParam(':telefone',$telefone);
            $stmt->bindParam(':cidade',$cidade);
            $stmt->bindParam(':uf',$uf);
            $stmt->bindParam(':modalidade',$modalidade);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='franqueados.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Editar Franqueado</h1>
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
                            <div class="form-group col-md-8">
                                <label for="nome-franqueados">Empresa</label>
                                <input type="text" class="form-control" id="empresa" placeholder="Nome Fantasia" name="empresa" value="<?php echo $empresa; ?>">
                            </div>
                          
                            <div class="form-group col-md-4">
                                <label for="tipo-franqueados">Modalidade</label>
                                <select id="modalidade" class="form-control" name="modalidade" value="<?php echo $modalidade; ?>">
                                    <option value="<?php echo $modalidade; ?>"><?php echo $modalidade; ?></option>
                                    <option value="Loja">Loja</option>
                                    <option value="Home Office">Home Office</option>
                                </select>
                            </div>

                            <div class="form-group col-md-5">
                                <label for="nome-franqueados">Contato</label>
                                <input type="text" class="form-control" id="contato" placeholder="Contato do franqueado" name="contato" value="<?php echo $contato; ?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="nome-franqueados">Telefone/Celular</label>
                                <input type="text" class="form-control celular" id="telefone" placeholder="Ex: (99)99999-9999" name="telefone" value="<?php echo $telefone; ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nome-franqueados">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo $email; ?>">
                            </div>

                            <div class="form-group col-md-9">
                                <label for="nome-franqueados">Cidade</label>
                                <input type="text" class="form-control" id="cidade" placeholder="Cidade" name="cidade" value="<?php echo $cidade; ?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="cidade-franqueados">UF</label>
                                <select name="uf" class="form-control border-input" id="uf">
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
	                        

	                        <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>

	                    </form>

                    </div>
                       
                </div>    

            </div>
            <!-- End of Main Content -->
        </div>       

   <?php include_once ('footer.php') ?>         