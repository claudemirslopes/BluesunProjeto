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

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['btn_save_updates']))
    {
        $nome = $_POST['nome'];// user name
        $email = $_POST['email'];// user name
        $id_nivacesso = $_POST['id_nivacesso'];
        $id_situacoes = $_POST['id_situacoes'];
        $senha = md5($_POST['senha']);// user name
        $datacad = $_POST['datacad'];// user name
        
        $imgFile = $_FILES['userPic']['name'];
        $tmp_dir = $_FILES['userPic']['tmp_name'];
        $imgSize = $_FILES['userPic']['size'];
        
        
        if(empty($nome)){
            $errMSG = "Por favor, entre com nome do usuário.";
        }
        if(empty($email)){
            $errMSG = "Por favor, entre com o e-mail do usuário.";
        }
        if(empty($senha)){
            $errMSG = "Por favor, entre com a senha do usuário.";
        }
        else if(empty($imgFile)){
            $errMSG = "Por favor, selecione a foto/avatar do usuário.";
        }
        else
        {
            $upload_dir = '../img/usuarios/'; // upload directory
    
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
            $stmt = $DB_con->prepare('INSERT INTO usuarios(nome,email,id_nivacesso,id_situacoes,senha,datacad,userPic) VALUES(:nome, :email, :id_nivacesso, :id_situacoes, :senha, :datacad,  :userPic)');
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':id_nivacesso',$id_nivacesso);
            $stmt->bindParam(':id_situacoes',$id_situacoes);
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':datacad',$datacad);
            $stmt->bindParam(':userPic',$userPic);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;usuarios.php"); // redirects image view page after 5 seconds.
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
                        <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Adicionar Usuários</h1>
                    </div>                

                </div>


                <div class="card-body">    
                    <div class="row">
                        <div class="col-lg-12">
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

                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="nome-usuarios">Nome</label>
                                <input type="text" class="form-control" id="nome-usuarios" name="nome" value="<?php echo $nome; ?>" placeholder="Digite o nome">
                              </div>
                              
                              <div class="form-group col-md-6">
                                <label for="email-usuarios">E-mail</label>
                                <input type="email" class="form-control" id="email-usuarios" name="email" value="<?php echo $email; ?>" placeholder="Digite o e-mail">
                              </div>

                              <div class="form-group col-md-4">
                                  <label for="nivacesso-usuarios">Nível de Acesso</label>
                                    <select id="nivacesso-usuarios" class="form-control" name="id_nivacesso" value="<?php echo $id_nivacesso; ?>">
                                        <option value="1">Administrador</option>  
                                        <option value="2">Colaborador</option>                               
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="status-usuarios">Situação de Status</label>
                                    <select id="status-usuarios" class="form-control" name="id_situacoes" value="<?php echo $id_situacoes; ?>">
                                        <option value="1" selected="">Ativo</option> 
                                        <option value="2">Inativo</option>                               
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="senha-usuarios">Senha</label>
                                  <input type="password" class="form-control" id="senha-usuarios" name="senha" value="<?php echo $senha; ?>">
                                </div> 

                                <br>                               
                            
                                <div class="form-group">
                                    <label for="img-usuarios">Escolher Imagem/Avatar</label>
                                    <input type="file" class="form-control-file" id="img-usuarios" name="userPic" value="<?php echo $userPic; ?>">
                                </div>

                            </div>

                        <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>
                        
                            </form> 

                        </div> 
                    </div>            
                </div> 
            </div>
<?php include_once ('footer.php') ?>         