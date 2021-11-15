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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_contato WHERE contato_id =:uid');
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
        $contato_endereco = $_POST['contato_endereco'];// user name
        $contato_bairro = $_POST['contato_bairro'];// user name
        $contato_cidade = $_POST['contato_cidade'];// user name
        $contato_estado = $_POST['contato_estado'];// user name
        $contato_telefone = $_POST['contato_telefone'];// user name
        $contato_celular = $_POST['contato_celular'];// user name
        $contato_email = $_POST['contato_email'];// user name
        $contato_data = $_POST['contato_data'];// user name
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_contato
                                         SET contato_endereco=:contato_endereco,
                                             contato_bairro=:contato_bairro, 
                                             contato_cidade=:contato_cidade,  
                                             contato_estado=:contato_estado, 
                                             contato_telefone=:contato_telefone, 
                                             contato_celular=:contato_celular, 
                                             contato_email=:contato_email, 
                                             contato_data=:contato_data
                                       WHERE contato_id=:uid');
            $stmt->bindParam(':contato_endereco',$contato_endereco);
            $stmt->bindParam(':contato_bairro',$contato_bairro);
            $stmt->bindParam(':contato_cidade',$contato_cidade);
            $stmt->bindParam(':contato_estado',$contato_estado);
            $stmt->bindParam(':contato_telefone',$contato_telefone);
            $stmt->bindParam(':contato_celular',$contato_celular);
            $stmt->bindParam(':contato_email',$contato_email);
            $stmt->bindParam(':contato_data',$contato_data);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='contato.php?edit_id=1';
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
                        <h1 class="h3 mb-0 text-gray-800">Contato</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Contato</h1>
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
                              <div class="form-group col-md-6">
                                <label for="endereco-contato">Endereço</label>
                                <input type="text" class="form-control" id="endereco-contato" placeholder="Rua e n°" name="contato_endereco" value="<?php echo $contato_endereco; ?>">
                              </div>
                              
                              <div class="form-group col-md-2">
                                <label for="bairro-contato">Bairro</label>
                                <input type="text" class="form-control" id="bairro-contato" placeholder="Bairro" name="contato_bairro" value="<?php echo $contato_bairro; ?>">
                              </div>

                                <div class="form-group col-md-2">
                                  <label for="cidade-contato">Cidade</label>
                                  <input type="text" class="form-control" id="cidade-contato" placeholder="Cidade" name="contato_cidade" value="<?php echo $contato_cidade; ?>">
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="estado-contato">Estado</label>
                                    <select id="estado-contato" class="form-control" name="contato_estado">
                                        <option value="<?php echo $contato_estado; ?>"><?php echo $contato_estado; ?></option>
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
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="email-contato">E-mail</label>
                                      <input type="email" class="form-control" id="email-contato" placeholder="E-mail" name="contato_email" value="<?php echo $contato_email; ?>">
                                    </div>

                                    <div class="form-group col-md-3">
                                      <label for="telefone-contato">Telefone</label>
                                      <input type="text" class="form-control" id="telefone-contato" placeholder="(00)0000-0000" name="contato_telefone" value="<?php echo $contato_telefone; ?>">
                                    </div>

                                    <div class="form-group col-md-3">
                                      <label for="celular-contato">Celular</label>
                                      <input type="text" class="form-control" id="celular-contato" placeholder="(00)00000-0000" name="contato_celular" value="<?php echo $contato_celular; ?>">
                                    </div>


                                </div>

                              <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>
                            </form> 

                        </div> 
                    </div>            
                </div> 
            </div>
            <?php include_once ('footer.php') ?>         