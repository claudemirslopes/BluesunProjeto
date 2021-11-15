<?php
  require_once '../admin/dbconfig.php';
  require_once '../admin/conexion.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Integrador Bluesun</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <?php         
        $stmt = $DB_con->prepare('SELECT * FROM contato_mapa WHERE contato_id_user = 202 ORDER BY contato_id ASC LIMIT 1');
        $stmt->execute();
        if($stmt->rowCount() > 0) {
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
      ?>
      <div class="contact-info float-left text-light">
        <i class="fa fa-envelope-o" style="color: #FF5F00"></i> <a class="text-light" href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
        <i class="fa fa-phone" style="color: #FF5F00"></i> <?php echo $row['telefone']; ?> (WhatsApp)
      </div>
      <?php }
          } else { ?>
            <div class="contact-info float-left text-light">
  		        <i class="fa fa-envelope-o" style="color: #FF5F00"></i> <a class="text-light" href="mailto:#">empresa@email.com</a>
  		        <i class="fa fa-phone" style="color: #FF5F00"></i> (99) 99999-9999 (WhatsApp)
    		</div>
      <?php } ?>

      <?php         
        $stmt = $DB_con->prepare('SELECT * FROM social WHERE social_id_user = 202 ORDER BY social_id DESC LIMIT 4');
        $stmt->execute();
        if($stmt->rowCount() > 0) {
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
      ?>
      <div class="social-links float-right">
        <a href="<?php echo $row['url']; ?>" class="<?php echo $row['icone']; ?>"><i class="fa fa-<?php echo $row['icone']; ?>"></i></a>
      </div>
      <?php }
          } else { ?>
            <div class="social-links float-right">
  		        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
  	      	</div>
  	      	<div class="social-links float-right">
  		        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
  	      	</div>
  	      	<div class="social-links float-right">
  		        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
  	      	</div>
  	      	<div class="social-links float-right">
  		        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  	      	</div>
      <?php } ?>

    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left" style="margin-right: 25px;">
        <?php        
          $stmt = $DB_con->prepare('SELECT * FROM sobrefran WHERE sobref_id_user = 202 ORDER BY sobref_id ASC LIMIT 1');
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <a href="#body"><img src="../public/logo/clientes/<?php echo $row['userPic']; ?>" alt="image" title="" class="responsive" style="width: 180px;" /></a>
        <?php }
            } else { ?>
              <a href="#body"><img src="../public/logo/clientes/3.png" alt="image" title="" class="responsive" style="width: 180px;" /></a>
        <?php } ?>
      </div>
      <div id="logo" class="pull-left text-dark" style="font-size: 2.7em;line-height: 24px;">|</div>
      <div id="logo" class="pull-left" style="margin-left: 25px;">
        <?php        
          $stmt = $DB_con->prepare('SELECT * FROM sobreblue WHERE sobreb_id = 2 ORDER BY sobreb_id ASC LIMIT 1');
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <a href="#body"><img src="../public/logo/bluesun/<?php echo $row['userPic']; ?>" alt="image" title="" class="responsive" style="width: 180px;" /></a>
        <?php }
            } else { ?>
              <div class="col-xs-12">
                <div class="alert alert-warning">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                  </div>
              </div>
        <?php } ?>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Home</a></li>
          <li><a href="#nossahistoria">Sobre a Empresa</a></li>
          <li><a href="#services">Vantagens da Energia Solar</a></li>
          <li><a href="#portfolio">Projetos</a></li>
          <li><a href="#contact">Contato</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <?php         
        $stmt = $DB_con->prepare('SELECT * FROM slide_texto ORDER BY slide_texto_id ASC LIMIT 1');
        $stmt->execute();
        if($stmt->rowCount() > 0) {
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
      ?>
      <?php echo $row['texto']; ?>
      <div>
           <a href="#contact" class="btn-projects scrollto">Fale Conosco</a>
      </div>
      <?php }
              } else { ?>
            <div class="col-xs-12">
              <div class="alert alert-warning">
                  <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                </div>
            </div>
      <?php } ?>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <?php         
        $stmt = $DB_con->prepare('SELECT * FROM slides ORDER BY imasl_id ASC LIMIT 5');
        $stmt->execute();
        if($stmt->rowCount() > 0) {
          while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
      ?>
      <div class="item" style="background-image: url('../public/<?php echo $row['image_path']; ?>');"></div>
      <?php }
              } else { ?>
            <div class="col-xs-12">
              <div class="alert alert-warning">
                  <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                </div>
            </div>
      <?php } ?>
    </div>

  </section><!-- #intro -->

  <main id="main">

<!--==========================
    História do Integrador
    ========================-->

    <section id="nossahistoria" class="wow fadeInUp">
        <div class="container">
          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM sobrefran WHERE sobref_id_user = 202 ORDER BY sobref_id ASC LIMIT 1');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
          <div class="section-header">
            <h2><?php echo $row['titulo']; ?></h2>
            <p><?php echo $row['texto']; ?></p>
          </div>
          <?php }
              } else { ?>
                <div class="section-header">
	              	<h2>Quem somos</h2>
  		            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie non massa ac ultricies. Fusce vel fermentum odio. Aliquam erat volutpat. Etiam iaculis pulvinar orci dapibus laoreet. Duis vitae est urna. Nunc suscipit et lorem eu tincidunt. Morbi et porta tortor, convallis lacinia orci. Curabitur diam risus, fringilla vitae venenatis et, porta vitae neque. Donec cursus nibh mollis ornare rhoncus. Sed volutpat ex nunc, ut vulputate eros elementum ut. Nam bibendum nibh in turpis rutrum venenatis. Praesent luctus cursus neque et porta. Aenean aliquet arcu vel magna fringilla, in sagittis nisl consequat.</p>

			        <p>Aliquam tincidunt posuere fermentum. Fusce a est tellus. Etiam in odio et sapien placerat consequat. Aliquam at ligula gravida, ultrices sem in, pellentesque nulla. Aenean sed auctor ligula. Proin at facilisis elit. Nullam congue, ligula sed condimentum porttitor, augue mauris laoreet tortor, a condimentum risus ex ut neque.</p>
          	  	</div>
          <?php } ?>
        </div>
    </section>

    <!--==========================
      Seção Energia Solar em todos os Lugares
    ============================-->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <?php         
          $stmt = $DB_con->prepare('SELECT * FROM energia_solar ORDER BY energia_id ASC LIMIT 1');
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="row">
          <div class="col-lg-8 about-img">
            <img src="../public/solar/<?php echo $row['userPic']; ?>" alt="">
          </div>
          <div class="col-lg-4 content">
            <h2><?php echo $row['titulo']; ?></h2>
            <h3><?php echo $row['subtitulo']; ?></h3>
            <ul>
              <li><i class="ion-android-checkmark-circle" style="color: #0B610B;"></i> <?php echo $row['opcoes1']; ?></li>
              <li><i class="ion-android-checkmark-circle" style="color: #0B610B;"></i> <?php echo $row['opcoes2']; ?></li>
              <li><i class="ion-android-checkmark-circle" style="color: #0B610B;"></i> <?php echo $row['opcoes3']; ?></li>
              <li><i class="ion-android-checkmark-circle" style="color: #0B610B;"></i> <?php echo $row['opcoes4']; ?></li>
            </ul>
          </div>
        </div>
        <?php }
            } else { ?>
              <div class="col-xs-12">
                <div class="alert alert-warning">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                  </div>
              </div>
        <?php } ?>
      </div>
    </section><!-- #about -->

    
    

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Vantagens da Energia Solar </h2>
          
        </div>

        <div class="row">

          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM itens ORDER BY item_id ASC LIMIT 8');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="fa fa-<?php echo $row['icone']; ?>"></i></div>
              <h4 class="title"><a href=""><?php echo $row['titulo']; ?></a></h4>
              <p class="description"><?php echo $row['texto']; ?></p>
            </div>
          </div>
          <?php }
              } else { ?>
                <div class="col-xs-12">
                  <div class="alert alert-warning">
                      <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                    </div>
                </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- #services -->

    

    <!--==========================
      Seção Nossas Marcas
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Fornecedores</h2>
        </div>
        <div class="owl-carousel clients-carousel">
          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM marcas ORDER BY marca_id ASC LIMIT 8');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
          <img src="../public/clients/<?php echo $row['userPic']; ?>" alt="" class="img-responsive">
          <?php }
              } else { ?>
                <div class="col-xs-12">
                  <div class="alert alert-warning">
                      <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                    </div>
                </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- #clients -->   

    <!--==========================
      Seção Nossas Obras
    ============================-->
    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Projetos</h2>
        </div>
      </div>
      <div class="container">
        <div class="row no-gutters">
          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM obras_imagens WHERE id_image_user = 4 ORDER BY image_id ASC LIMIT 12');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="../public/<?php echo $row['image_path']; ?>" class="portfolio-popup">
                <img src="../public/<?php echo $row['image_path']; ?>" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp"><?php echo $row['titulo']; ?></h2></div>
                </div>
              </a>
            </div>
          </div>
          <?php }
              } else { ?>
                <div class="col-xs-12">
                  <div class="alert alert-warning">
                      <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                    </div>
                </div>
          <?php } ?>
        </div>

      </div>
    </section><!-- #portfolio --> 

    <!--==========================
      Seção Contato
    ============================-->
    <?php         
      $stmt = $DB_con->prepare('SELECT * FROM contato_mapa WHERE contato_id_user = 202 ORDER BY contato_id ASC LIMIT 1');
      $stmt->execute();
      if($stmt->rowCount() > 0) {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
    ?>
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contato</h2>
          
        </div>

        <div class="row contact-info">
          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline" style="color: #23990F;"></i>
              <h3>Endereço</h3>
              <address><?php echo $row['endereco']; ?></address>
              <address><?php echo $row['bairro']; ?> - <?php echo $row['cidade']; ?>/<?php echo $row['uf']; ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline" style="color: #23990F;"></i>
              <h3>Telefone</h3>
              <p><a href="tel:+55<?php echo $row['telefone']; ?>"><?php echo $row['telefone']; ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline" style="color: #23990F;"></i>
              <h3>E-mail</h3>
              <p><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="container mb-4">
        <?php echo $row['mapa']; ?>
      </div>
    </section><!-- #contact -->
    <?php }
        } else { ?>
          <section id="contact" class="wow fadeInUp">
		          <div class="container">
		            <div class="section-header">
		              <h2>Contato</h2>
		            </div>

    		        <div class="row contact-info">
    		          <div class="col-md-4">
    		            <div class="contact-address">
    		              <i class="ion-ios-location-outline" style="color: #23990F;"></i>
    		              <h3>Endereço</h3>
    		              <address>Rua e número aqui</address>
    		              <address>Bairro aqui - Cidade/UF</address>
  		              </div>
  		            </div>

    		          <div class="col-md-4">
    		            <div class="contact-phone">
    		              <i class="ion-ios-telephone-outline" style="color: #23990F;"></i>
    		              <h3>Telefone</h3>
    		              <p><a href="tel:+55#">(99) 99999-9999</a></p>
    		            </div>
    		          </div>

    		          <div class="col-md-4">
    		            <div class="contact-email">
    		              <i class="ion-ios-email-outline" style="color: #23990F;"></i>
    		              <h3>E-mail</h3>
    		              <p><a href="mailto:#">empresa@email.com</a></p>
    		            </div>
    		          </div>
		          </div>
		        </div>

  		      <div class="container mb-4">
  		        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14735.171647870413!2d-47.3889789!3d-22.5868474!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5e3bb253839645dd!2sBlueSun%20do%20Brasil!5e0!3m2!1spt-BR!2sbr!4v1621945517523!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  		      </div>
		    </section><!-- #contact -->
    <?php } ?>

  </main>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="bg-dark">
    <div class="container">
      <div class="copyright" style="color: #fff;">
        Desenvolvido por <a href="#body"><img src="img/logo_bsum2.png" alt="image" title="" class="responsive" style="width: 10%;" /></a> &copy | 2020/<?php echo date('Y'); ?>
      </div>
      
    </div>
  </footer><!-- #footer -->
  <div><?php include_once('Chat_online.php'); ?></div>  

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
