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
        $titulo = $_POST['titulo'];// user name
        $texto = $_POST['texto'];// user name
        $icone = $_POST['icone'];// user name
        $datacad = $_POST['datacad'];// user name
        $datamod = $_POST['datamod'];// user name
                
        
        if(empty($titulo)){
            $errMSG = "Por favor, entre com o título.";
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO itens(titulo,texto,icone,datacad,datamod) VALUES(:utitulo, :utexto, :uicone, :udatacad, :udatamod)');
            $stmt->bindParam(':utitulo',$titulo);
            $stmt->bindParam(':utexto',$texto);
            $stmt->bindParam(':uicone',$icone);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;itens.php"); // redirects image view page after 5 seconds.
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
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input type="text" name="titulo" class="form-control border-input" value="<?php echo $titulo; ?>" placeholder="Digite o título">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Texto</label>
                                                <input type="text" name="texto" class="form-control border-input" value="<?php echo $texto; ?>" placeholder="Digite o texto">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ícone</label>
                                                <input type="text" name="icone" class="form-control border-input" value="<?php echo $icone; ?>" placeholder="Digite o ícone">
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
