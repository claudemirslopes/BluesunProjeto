<?php
  session_start();
  include_once("seguranca.php");
  include_once("conexao/conexao.php");
  seguranca_adm();
?>
<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['btnsave']))
    {
        $nome = $_POST['nome'];// user name
        $email = $_POST['email'];// user name
        $senha = md5($_POST['senha']);// user name
        $id_nivacesso = $_POST['id_nivacesso'];// user name
        $id_situacoes = $_POST['id_situacoes'];// user name
        $datacad = $_POST['datacad'];// user name
        $datamod = $_POST['datamod'];// user name
        
        $imgFile = $_FILES['userPic']['name'];
        $tmp_dir = $_FILES['userPic']['tmp_name'];
        $imgSize = $_FILES['userPic']['size'];
        
        
        if(empty($nome)){
            $errMSG = "Por favor, entre com o nome.";
        }
        else if(empty($email)){
            $errMSG = "Por favor, entre com o email.";
        }
        else if(empty($imgFile)){
            $errMSG = "Por favor, selecione uma imagem.";
        }
        else
        {
            $upload_dir = '../public/faces/'; // upload directory
    
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
            $stmt = $DB_con->prepare('INSERT INTO usuarios(nome,email,senha,id_nivacesso,id_situacoes,datacad,datamod,userPic) VALUES(:unome, :uemail, :usenha, :uid_nivacesso, :uid_situacoes, :udatacad, :udatamod,  :uuserPic)');
            $stmt->bindParam(':unome',$nome);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':usenha',$senha);
            $stmt->bindParam(':uid_nivacesso',$id_nivacesso);
            $stmt->bindParam(':uid_situacoes',$id_situacoes);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uuserPic',$userPic);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;users.php"); // redirects image view page after 5 seconds.
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
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bluesun do Brasil | Usuarios</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

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
                    <div class="col-md-12">
                        <div class="card" style="background-color: #E3CEF6;">
                            <div class="header">
                                <h4 class="title">Adicionar Usuários ao Sistema</h4>
                            </div>
                            <div class="content">
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
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" placeholder="Digite o nome" value="<?php echo $nome; ?>" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" name="email" class="form-control border-input" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entre com seu e-mail'" class="common-input mb-20 form-control" required="" value="<?php echo $email; ?>">
                                                <div id="resultadoemail" style="padding-top: 5px;"></div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nível de Acesso</label>
                                                <select name="id_nivacesso" class="form-control border-input" required="" value="<?php echo $id_nivacesso; ?>">
                                                    <option value="">Selecione</option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Franqueado</option>
                                                    <option value="3">Integrador</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Situação de Status</label>
                                                <select name="id_situacoes" class="form-control border-input" value="<?php echo $id_situacoes; ?>" required="">
                                                    <option value="">Selecione</option>
                                                    <option value="1">Ativo</option>
                                                    <option value="2">Inativo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" name="senha" class="form-control border-input" placeholder="Digite a senha" value="<?php echo $senha; ?>" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Imagem Avatar</label>
                                                <input type="file" name="userPic" accept="image/*" class="form-control border-input">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Data de Cadastro</label>
                                                <input type="text" name="datacad" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="btnsave" class="btn btn-danger btn-fill btn-wd" style="background-color: #9F81F7;border-color: #9F81F7;">Adicionar Usuário</button>
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