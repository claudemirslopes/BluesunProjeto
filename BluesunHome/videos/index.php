<?php

  require_once '../admin/dbconfig.php';
  require_once '../admin/conexao.php';
  
  if(isset($_GET['delete_id']))
  {
    // select image from db to delete
    $stmt_select = $DB_con->prepare('SELECT imagem FROM homeslide WHERE id =:uid');
    $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
    $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("../img/1920x1080/".$imgRow['imagem']);
    
    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM homeslide WHERE id =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_id']);
    $stmt_delete->execute();
    
    header("Location: index.php");
  }

?>

<!DOCTYPE HTML>
<!--
	Full Motion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Bluesun do Brasil - Vídeos</title>
		<meta charset="utf-8" />
		<meta property="og:url" content="https://bluesundobrasil.com.br/home/videos/" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Bluesun do Brasil" />
        <meta property="og:description" content="Bluesun Solar do Brasil, umas das maiores importadoras e distribuidoras de sistemas fotovoltaicos do Brasil..." />
        
        <meta property="og:image" content="https://bluesundobrasil/home/videos/images/<?php echo $row['imagem']; ?>" />
        
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">
        <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">

	</head>
	<body id="top">
		<section id="banner" data-video="images/banner">
			<div class="inner">
				<header>
					<a href="../"><img src="../img/logobranco.png" alt="Logo" title="" media-simple="true" style="height: 3.8rem;"></a>
					<h1 style="font-size: 3.5em;">Bluesun do Brasil - Vídeos</h1>
					
					<ul>
						<li style="display: inline-block;"><a href="../#intro">HOME</a></li>
						<li style="display: inline-block;"><a href="../#historia">NOSSA HISTÓRIA</a></li>
						<li style="display: inline-block;"><a href="../#fundadores">FUNDADORES</a></li>
						<li style="display: inline-block;"><a href="../#divisoes">DIVISÕES BLUESUN</a></li>
						<li style="display: inline-block;"><a href="../album.php">GALERIA</a></li>
						<li style="display: inline-block;"><a href="../#marcas">MARCAS</a></li>
						<li style="display: inline-block;"><a href="../#contato">CONTATO</a></li>
					</ul>
				</header>
				<a href="#main" class="more">Learn More</a>
			</div>
		</section>

			<!-- Main -->
				<div id="main">
					<div class="inner">

					<!-- Boxes -->
						<div class="thumbnails">
							<?php
              
				            $stmt = $DB_con->prepare('SELECT id_video, titulo, autor, url, imagem, created FROM videos ORDER BY id_video DESC');
				            $stmt->execute();

				            if($stmt->rowCount() > 0)
				            {
				              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				              {
				                extract($row);
				            ?>
							<div class="box">
								<a href="https://youtu.be/<?php echo $row['url']; ?>" class="image fit"><img src="images/<?php echo $row['imagem']; ?>" alt="<?php echo $row['titulo']; ?>" height="198.281"/></a>
								<div class="inner">
									<h3><?php echo $row['titulo']; ?></h3>
									<p><span style="font-weight: bold;color: #F07702;">Postado por:</span><br>
										<?php echo $row['autor']; ?>  [<?php echo date('d/m/Y', strtotime($row['created'])); ?>]</p>
									<p><iframe src="https://www.facebook.com/plugins/share_button.php?href=https://youtu.be/<?php echo $row['url']; ?>&layout=button&size=small&mobile_iframe=false&width=97&height=20&appId" width="97" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> 

									<a href="https://twitter.com/intent/tweet?screen_name=bluesunsolarbr&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-url="https://youtu.be/<?php echo $row['url']; ?>" data-text="https://bluesundobrasil.com.br" data-count="horizontal" data-via="bluesunsolarbr" data-lang="pt" data-show-count="false">Tweetar</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

									</p>
									<a href="https://youtu.be/<?php echo $row['url']; ?>" class="button fit" data-poptrox="youtube,800x400">Assistir</a>
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

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<h2>Sobre Nós</h2>
						<p>A Bluesun Solar do Brasil teve seu início em 2008, quando só existiam sistemas Off Grid. Nossa sede, Centro de Distribuição Sudeste, está localizada em Limeira no interior de São Paulo. Fazemos parte do Grupo Engecomp, que foi fundado em 1998 pelos Engenheiros Roberto Caurim e Ricardo Mansour e atuamos no mercado oferecendo soluções de engenharia e energia. </p>

						<ul class="icons">
							<li><a href="https://twitter.com/bluesunsolarbr" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/bluesunsolardobrasil" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/bluesunsolar/" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="mailto:contato@bluesundobrasil.com.br" target="_top" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">&copy; Bluesun do Brasil | por: <a href="https://bluesundobrasil.com.br">Bluesun do Brasil (Equipe de Desenvolvimento)</a></p>
					</div>
				</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	</body>
</html>