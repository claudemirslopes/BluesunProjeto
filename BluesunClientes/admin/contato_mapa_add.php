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
        $contato_id_user = $_POST['contato_id_user'];
        $endereco = $_POST['endereco'];// user name
        $bairro = $_POST['bairro'];// user name
        $cidade = $_POST['cidade'];// user name
        $uf = $_POST['uf'];// user name
        $telefone = $_POST['telefone'];// user name
        $email = $_POST['email'];// user name
        $mapa = $_POST['mapa'];// user name
        $datacad = $_POST['datacad'];// user name
        $datamod = $_POST['datamod'];// user name
                
        
        if(empty($endereco)){
            $errMSG = "Por favor, entre com o endereco.";
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO contato_mapa(contato_id_user,endereco,bairro,cidade,uf,telefone,email,mapa,datacad,datamod) VALUES(:ucontato_id_user, :uendereco, :ubairro, :ucidade, :uuf, :utelefone, :uemail, :umapa, :udatacad, :udatamod)');
            $stmt->bindParam(':ucontato_id_user',$contato_id_user);
            $stmt->bindParam(':uendereco',$endereco);
            $stmt->bindParam(':ubairro',$bairro);
            $stmt->bindParam(':ucidade',$cidade);
            $stmt->bindParam(':uuf',$uf);
            $stmt->bindParam(':utelefone',$telefone);
            $stmt->bindParam(':uemail',$email);
            $stmt->bindParam(':umapa',$mapa);
            $stmt->bindParam(':udatacad',$datacad);
            $stmt->bindParam(':udatamod',$datamod);
            
            if($stmt->execute())
            {
                $successMSG = "Novo registro inserido com sucesso...";
                header("refresh:1;contato_mapa.php"); // redirects image view page after 5 seconds.
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
                                                <label>Endereço</label>
                                                <input type="text" name="endereco" class="form-control border-input" value="<?php echo $endereco; ?>" placeholder="Digite o endereço">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bairro</label>
                                                <input type="text" name="bairro" class="form-control border-input" value="<?php echo $bairro; ?>" placeholder="Digite o bairro">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" name="cidade" class="form-control border-input" value="<?php echo $cidade; ?>" placeholder="Digite a cidade">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>UF</label>
                                                <select name="uf" class="form-control border-input" value="<?php echo $uf; ?>">
                                                    <option disabled="" selected="">Selecione</option>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telefone</label>
                                                <input type="text" name="telefone" class="form-control border-input" value="<?php echo $telefone; ?>" placeholder="Digite o telefone">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" name="email" class="form-control border-input" value="<?php echo $email; ?>" placeholder="Digite o e-mail">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mapa</label>
                                                <textarea id="txtArtigo" name="mapa" class="form-control border-input" rows="3" placeholder="cole o iframe do mapa" required=""><?php echo $mapa; ?></textarea>
                                            </div>
                                            <script src="assets/ckeditor/ckeditor.js"></script>
                                            <script>
                                                    CKEDITOR.replace( 'txtArtigo' );
                                            </script>
                                        </div>
                                    </div>
                                    <div class="row">
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

                                    <input type="hidden" readonly="" name="contato_id_user" class="form-control border-input" value="<?php echo $_SESSION['usuarioId']; ?>">

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
