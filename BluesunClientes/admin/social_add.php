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

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'dbconfig.php';
    
    if(isset($_POST['btnsave']))
    {   
        $social_id_user = $_POST['social_id_user'];
        $nome = $_POST['nome'];// user name
        $icone = $_POST['icone'];// user name
        $url = $_POST['url'];// user name
        $datacad = $_POST['datacad'];// user name
        $datamod = $_POST['datamod'];// user name
                
        
        if(empty($nome)){
            $errMSG = "Por favor, entre com o Nome.";
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO social(social_id_user,nome,icone,url,datacad,datamod) VALUES(:usocial_id_user, :unome, :uicone, :uurl, :udatacad, :udatamod)');
            $stmt->bindParam(':usocial_id_user',$social_id_user);
            $stmt->bindParam(':unome',$nome);
            $stmt->bindParam(':uicone',$icone);
            $stmt->bindParam(':uurl',$url);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;social.php"); // redirects image view page after 5 seconds.
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
<?php
  include("header.php");
?>

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
                            <div class="header">
                                <h4 class="title">Adicionar Registro</h4>
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control border-input" value="<?php echo $nome; ?>" placeholder="Digite o nome">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ícone</label>
                                                <input type="text" name="icone" class="form-control border-input" value="<?php echo $icone; ?>" placeholder="Digite o ícone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Link URL</label>
                                                <input type="text" name="url" class="form-control border-input" value="<?php echo $url; ?>" placeholder="Digite o ícone">
                                            </div>
                                        </div>
                                        <div class="col-md-2 hidden">
                                            <div class="form-group">
                                                <label>Data de Cadastro</label>
                                                <input type="text" name="datacad" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2 hidden">
                                            <div class="form-group">
                                                <label>Data de Modificação</label>
                                                <input type="text" name="datamod" class="form-control border-input" readonly="" value="<?=date('Y-m-d h:m:s');?>">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" readonly="" name="social_id_user" class="form-control border-input" value="<?php echo $_SESSION['usuarioId']; ?>">

                                    <div class="text-center">
                                        <button type="submit" name="btnsave" class="btn btn-danger btn-fill btn-wd" style="background-color: #FE2E2E;border-color: #FE2E2E;"><i class="fa fa-plus-square"></i> Adicionar</button>
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
