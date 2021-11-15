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
        $stmt_edit = $DB_con->prepare('SELECT * FROM usuarios WHERE id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: usuarios.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $nome = $_POST['nome'];// user name
        $email = $_POST['email'];// user name
        $id_nivacesso = $_POST['id_nivacesso'];
        $id_situacoes = $_POST['id_situacoes'];
        $senha = md5($_POST['senha']);// user name

        $imgFile = $_FILES['userPic']['name'];
        $tmp_dir = $_FILES['userPic']['tmp_name'];
        $imgSize = $_FILES['userPic']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../img/usuarios/'; // upload directory  
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
            $stmt = $DB_con->prepare('UPDATE usuarios
                                         SET nome=:nome,
                                             email=:email,
                                             id_nivacesso=:id_nivacesso,
                                             id_situacoes=:id_situacoes,
                                             senha=:senha,
                                             userPic=:userPic
                                       WHERE id=:uid');
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':id_nivacesso',$id_nivacesso);
            $stmt->bindParam(':id_situacoes',$id_situacoes);
            $stmt->bindParam(':senha',$senha);
            $stmt->bindParam(':userPic',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='usuarios.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
                    </div> 

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Editar Perfil</h1>
                    </div>                

                </div>


        <div class="card-body">    
                    <div class="row">
                        
                        <div class="col-lg-12">

                            
                            <div class="float-left col-md-3">
                                <img src="../img/usuarios/<?php echo $userPic; ?>" width="250" height="250">
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

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" value="<?php echo $nome; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" name="email" class="form-control border-input" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" name="senha" class="form-control border-input" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nível de Acesso</label>
                                                <select id="nivacesso-usuarios" class="form-control" name="id_nivacesso">
                                                    <option value="<?php echo $id_nivacesso; ?>">
                                                        <?php
                                                            if ($id_nivacesso == 1) {
                                                                echo 'Administrador';
                                                            } else {
                                                                echo 'Colaborador';
                                                            }
                                                        ?>
                                                    </option>  
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Colaborador</option>                
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Situação</label>
                                                <select id="status-usuarios" class="form-control" name="id_situacoes">
                                                    <option value="<?php echo $id_situacoes; ?>">
                                                        <?php
                                                            if ($id_situacoes == 1) {
                                                                echo 'Ativo';
                                                            } else {
                                                                echo 'Inativo';
                                                            }
                                                        ?>
                                                    </option>  
                                                    <option value="1">Ativo</option>
                                                    <option value="2">Inativo</option>                               
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Imagem Perfil</label>
                                                <input type="file" name="userPic" accept="image/*" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>   

                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                
                            </div>

                            <br>
                            <br>

                        <button type="submit" name="btn_save_updates" class="btn btn-success">Salvar alterações</button>
                            </form> 

                        </div> 
                    </div>            
                </div> 
            </div>
<?php include_once ('footer.php') ?>         