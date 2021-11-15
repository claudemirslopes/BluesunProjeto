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
        $stmt_edit = $DB_con->prepare('SELECT * FROM usuarios WHERE id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: perfil.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $nome = $_POST['nome'];// user name
        $email = $_POST['email'];// user name
        $senha = md5($_POST['senha']);// user name
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
                                             datacad=:udatacad, 
                                             datamod=:udatamod,
                                             userPic=:uuserPic
                                       WHERE id=:uid');
            $stmt->bindParam(':unome',$nome);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':usenha',$senha);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            $stmt->bindParam(':uuserPic',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='perfil.php';
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
<?php

    require_once 'dbconfig.php';
    
    if(isset($_GET['delete_id']))
    {
        // select image from db to delete
        $stmt_select = $DB_con->prepare('SELECT userPic FROM usuarios WHERE id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink("../public/faces/".$imgRow['userPic']);
        
        // it will delete an actual record from db
        $stmt_delete = $DB_con->prepare('DELETE FROM usuarios WHERE id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: perfil.php");
    }

?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bluesun do Brasil| Perfil</title>

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
                    <?php
    
                        $stmt = $DB_con->prepare("SELECT id, nome, email, senha, id_nivacesso, id_situacoes, datacad, datamod, userPic FROM usuarios WHERE id = {$_SESSION['usuarioId']} ORDER BY nome ASC");
                        $stmt->execute();
                        
                        if($stmt->rowCount() > 0)
                        {
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                extract($row);
                    ?>
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                            </div>

                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="../public/faces/<?php echo $row['userPic']; ?>" alt="..."/>
                                  <h4 class="title"><?php echo $row['nome']; ?><br />
                                     <a href="#"><small><?php echo $row['email']; ?></small></a>
                                  </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5><?php echo $row['id']; ?><br /><small>ID</small></h5>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>Nível de Acesso - 
                                            <?php 
                                                if($id_nivacesso == '1') {
                                                    echo '<span class="label label-info" style="font-size:0.6em;">Administrador</span>';
                                                } elseif ($id_nivacesso == '2') {
                                                    echo '<span class="label label-primary" style="font-size:0.6em;">Franquiado</span>';
                                                } else {
                                                    echo '<span class="label label-warning" style="font-size:0.6em;">Integrador</span>';
                                                }
                                            ?><br /><small>Status - <?php echo $row['id_situacoes'] == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'; ?></small></h5>
                                    </div>
                                    <!--<div class="col-md-12">
                                        <p style="font-size: 0.7em;"><b>Níveis de Acesso:</b> 1 - Administrador | 2 - Candidato | 3 - Colaborador</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p style="font-size: 0.7em;"><b>Status:</b> 1 - Ativo | 2 - Inativo</p>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card" style="background-color: #D0F5A9;">
                            <div class="header">
                                <h4 class="title">Editar Perfil</h4>
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

                                        <input type="hidden" name="id" class="form-control border-input" readonly="" value="<?php echo $id; ?>">

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" value="<?php echo $nome; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">E-mail</label>
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
                                                <label>Imagem Avatar</label>
                                                <input type="file" name="userPic" accept="image/*" class="form-control border-input" value="<?php echo $userPic; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Data de modificação</label>
                                                <input type="text" name="datamod" class="form-control border-input" value="<?=date('Y-m-d h:m:s');?>" readonly="">
                                            </div>
                                        </div>
                                    </div>

                                        <!--<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Imagem Avatar</label>
                                                <input type="file" name="userPic" accept="image/*" class="form-control border-input" readonly="">
                                            </div>
                                        </div>-->

                                    <div class="text-center">
                                        <button type="submit" name="btn_save_updates" class="btn btn-success btn-fill btn-wd">Editar Perfil</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }
                        else
                        {
                            ?>
                            <div class="col-xs-12">
                                <div class="alert alert-warning">
                                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                                </div>
                            </div>
                            <?php
                        }
                        
                    ?>

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
