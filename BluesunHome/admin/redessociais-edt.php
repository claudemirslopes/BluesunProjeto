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
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_redessociais WHERE redes_id =:uid');
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
        $redes_icone = $_POST['redes_icone'];// user name
        $redes_nome = $_POST['redes_nome'];// user name
        $redes_url = $_POST['redes_url'];// user name
        $contato_data = $_POST['contato_data'];// user name
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_redessociais
                                         SET redes_icone=:redes_icone,
                                             redes_nome=:redes_nome, 
                                             redes_url=:redes_url,  
                                             redes_data=:redes_data
                                       WHERE redes_id=:uid');
            $stmt->bindParam(':redes_icone',$redes_icone);
            $stmt->bindParam(':redes_nome',$redes_nome);
            $stmt->bindParam(':redes_url',$redes_url);
            $stmt->bindParam(':redes_data',$redes_data);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='redessociais.php?edit_id=1';
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
                        <h1 class="h3 mb-0 text-gray-800">Redes Sociais</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Redes Sociais</h1>
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
                                <label for="nome-redessociais">Ícone</label>
                                <input type="text" class="form-control" id="nome-redessociais" placeholder="Nome do Ícone da Rede Social (minuscula - ex: facebook)" name="redes_icone" value="<?php echo $redes_icone; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="nome-redessociais">Nome</label>
                                <input type="text" class="form-control" id="nome-redessociais" placeholder="Nome da Rede Social" name="redes_nome" value="<?php echo $redes_nome; ?>">
                            </div>
                          
                            <div class="form-group col-md-12">
                                <label for="url-redessociais">URL</label>
                                <input type="text" class="form-control" id="url-redessociais" placeholder="URL da página" name="redes_url" value="<?php echo $redes_url; ?>">
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