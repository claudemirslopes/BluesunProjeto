<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'admin/dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM bs_album WHERE album_id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: album.php");
    }
    
    if(isset($_POST['btn_save_updates']))
    {
        $album_descricao = $_POST['album_descricao'];// user name
        $album_texto = $_POST['album_texto'];// user name
        
        $imgFile = $_FILES['album_img']['name'];
        $tmp_dir = $_FILES['album_img']['tmp_name'];
        $imgSize = $_FILES['album_img']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../img/album/'; // upload directory  
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $imagem = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 15000000)
                {
                    unlink($upload_dir.$edit_row['album_img']);
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
            $imagem = $edit_row['album_img']; // old image from database
        }         
            
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE bs_album
                                         SET album_descricao=:album_descricao,
                                             album_texto=:album_texto,
                                             album_img=:album_img
                                       WHERE album_id=:uid');
            $stmt->bindParam(':album_descricao',$album_descricao);
            $stmt->bindParam(':album_texto',$album_texto);
            $stmt->bindParam(':album_img',$imagem);
            $stmt->bindParam(':uid',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Atualizado com sucesso...');
                window.location.href='album.php';
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

    if(isset($_GET['delete_id']))
  {    
    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM bs_galeria WHERE galeria_id =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_id']);
    $stmt_delete->execute();
    
    header("Location: index.php");
  }

  date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:image" content="assets/assets/img/facebook.jpg" />
        <title>Galeria de Fotos | <?php echo $album_descricao; ?></title>
		<link href="assets/assets/img/facebook.jpg" rel="image_src" />
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
        <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/assets/css/animate.css">
        <link rel="stylesheet" href="assets/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/assets/flexslider/flexslider.css">
        <link rel="stylesheet" href="assets/assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/assets/css/style.css">
        <link rel="stylesheet" href="assets/assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <style type="text/css">
        	#texto {
			position: absolute;
			margin-top: -35px;
			margin-left: 10px;
			color: #fff;
			font-weight: bold;
			}
			.videoWrapper {
            	position: relative;
            	padding-bottom: 56.25%; /* 16:9 */
            	padding-top: 25px;
            	height: 0;
            }
            .videoWrapper iframe {
            	position: absolute;
            	top: 0;
            	left: 0;
            	width: 100%;
            	height: 100%;
            }
        </style>

    </head>

    <body>

        <!-- Top menu -->
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img src="img/logobranco.png"  alt="" title="" class="responsive" style="width: 180px;margin-top: -5px;"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right" style="font-family: 'Raleway', sans-serif;font-weight: 600;text-transform: none;">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li><a href="./#historia">Nossa História</a></li>
                        <li><a href="./#fundadores">Fundadores</a></li>
                        <li><a href="./#divisoes">Divisões Bluesun</a></li>
                        <li class="active"><a href="album.php">Galeria</a></li>
                        <li style="margin-top: -10px;"><a href="videos/"><span style="background-color: #DF0101;padding: 8px;color: #fff;border-radius: 15px;font-weight: normal;font-size: .9em;padding-right: 15px;padding-left: 15px;"><i class="fa fa-youtube" aria-hidden="true" style="color: #fff;"></i> Vídeos</span></a></li>
                        <li><a href="./#marcas">Marcas</a></li>
                        <li><a href="./#contato">Contato</a></li>
                        <li>
                            <a href="http://orcamentos.bluesundobrasil.com.br/login.php" target="_blank"><span style="background-color: #FD834C;padding: 8px;color: #fff;border-radius: 15px;font-weight: normal;font-size: .9em;padding-right: 15px;padding-left: 15px;">Acesso a Plataforma</span></a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>
        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                        <h1 style="font-family: 'Open Sans', sans-serif;font-weight: 700;"><?php echo $album_descricao; ?></h1>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us Text -->
        <div class="about-us-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 about-us-text wow fadeInLeft">
                        <!--<h3><?php // echo $row['album_descricao']; ?></h3>-->
                        
                        
                            <p style="font-size: 1.5em;"><?php echo $album_texto; ?></p>
                            <a href="#fotos"><span style="font-weight: bold;font-size: 1.1em;">Clique e veja todas as fotos abaixo <i class="fa fa-angle-double-down" aria-hidden="true"></i></span></a>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="about-us-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <img src="img/album/<?php echo $album_img; ?>" width="100%" height="auto">
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Portfolio -->
        <div id="fotos" class="portfolio-container" style="margin-bottom: 30px;">
	        <div class="container">
	            <div class="row">
	            	<div class="col-sm-12 portfolio-filters wow fadeInLeft">
	            		<a href="#" class="filter-all active">Galeria de fotos</a>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-12 portfolio-masonry">
                        <?php
                          $stmt = $DB_con->prepare("SELECT * FROM bs_galeria as galeria JOIN bs_album as album ON galeria.galeria_album_id = album.album_id WHERE galeria.galeria_album_id = $id ORDER BY galeria_id ASC");
                          $stmt->execute();
                          if($stmt->rowCount() > 0) {
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                              extract($row);
                        ?>
		                <div class="portfolio-box web-design">
		                	<div class="portfolio-box-container">
			                	<img src="admin/<?php echo $galeria_img; ?>" style="border-radius: 5px;" alt="" data-at2x="admin/<?php echo $galeria_img; ?>" alt="Imagem">
			                </div>
		                </div>
                        <?php } } else { ?>
                              <div class="col-xs-12">
                                <div class="alert alert-warning">
                                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Não existem imagens para este álbum de fotos...
                                  </div>
                              </div>
                        <?php } ?>
	                </div>
	            </div>
	        </div>
        </div>
         <!-- Footer -->
        <footer>
            <div class="container">
                
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-sm-12 footer-copyright" style="text-align: center;vertical-align: middle;background-color: #101522;font-family: 'Open Sans', sans-serif;font-size: 14px;">
                        Desenvolvido por <a href="index.php#intro"><img src="img/logobranco.png" alt="image" title="" class="responsive" style="width: 10%;" /></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="assets/assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/assets/js/wow.min.js"></script>
        <script src="assets/assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="assets/assets/js/jflickrfeed.min.js"></script>
        <script src="assets/assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="assets/assets/js/jquery.ui.map.min.js"></script>
        <script src="assets/assets/js/scripts.js"></script>

    </body>

</html>