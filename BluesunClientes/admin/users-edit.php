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
        $stmt_edit = $DB_con->prepare('SELECT * FROM usuarios WHERE id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: users.php");
    }
    
    if(isset($_POST['btn_save_updates']))
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
                    
        if($imgFile)
        {
            $upload_dir = '../public/faces/'; // upload directory  
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
                                         SET nome=:unome, 
                                             email=:uemail,
                                             senha=:usenha, 
                                             id_nivacesso=:uid_nivacesso,
                                             id_situacoes=:uid_situacoes,
                                             datacad=:udatacad, 
                                             datamod=:udatamod,
                                             userPic=:uuserPic
                                       WHERE id=:uid');
            $stmt->bindParam(':unome',$nome);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':usenha',$senha);
            $stmt->bindParam(':uid_nivacesso',$id_nivacesso);
            $stmt->bindParam(':uid_situacoes',$id_situacoes);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uuserPic',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='users.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Desculpa, não foram encontrado dados para atualizar!";
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
                        <div class="card" style="background-color: #F8E0E0;">
                            <div class="header">
                                <h4 class="title"><img class="avatar border-white" src="../public/faces/<?php echo $userPic; ?>" alt="..."/><?php echo $nome; ?></h4>
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
                                    <input type="hidden" name="id" class="form-control border-input" placeholder="Digite o nome" value="<?php echo $id; ?>" readonly>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" placeholder="Digite o nome" value="<?php echo $nome; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" name="email" class="form-control border-input" placeholder="Digite o e-mail" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nível de Acesso</label>
                                                <select name="id_nivacesso" class="form-control border-input">
                                                    <option value="<?php echo $id_nivacesso; ?>">
                                                        <?php 
                                                            if($id_nivacesso == '1') {
                                                                echo 'Administrador';
                                                            } elseif ($id_nivacesso == '2') {
                                                                echo 'Franqueado';
                                                            } else {
                                                                echo 'Integrador';
                                                            }
                                                        ?>
                                                    </option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Franqueado</option>
                                                    <option value="3">Integrador</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Situação de Status</label>
                                                <select name="id_situacoes" class="form-control border-input">
                                                    <option value="<?php echo $id_situacoes; ?>"><?php echo $id_situacoes == '1' ? 'Ativo' : 'Inativo'; ?></option>
                                                    <option value="1">Ativo</option>
                                                    <option value="2">Inativo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" name="senha" class="form-control border-input" placeholder="Digite a senha">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Imagem Avatar</label>
                                                <input type="file" name="userPic" accept="image/*" class="form-control border-input" value="<?php echo $userPic; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Data de modificação</label>
                                                <input type="text" name="datamod" class="form-control border-input" value="<?=date('Y-m-d h:m:s');?>" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="btn_save_updates" class="btn btn-danger btn-fill btn-wd" style="background-color: #FE2E2E;border-color: #FE2E2E;">Editar Usuário</button>
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

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
