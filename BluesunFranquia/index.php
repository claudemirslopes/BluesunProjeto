<?php
  require_once 'connect/dbconfig.php';
  require_once 'connect/conexion.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Franquias - Bluesun Solar do Brasil</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/validacoes.css" rel="stylesheet">
  <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
  <script src="js/jquery.validate1.min.js" type="text/javascript"></script>
  <script src="js/validacao.js" type="text/javascript"></script>

  <style type="text/css">
    .table th {
      border-top: none;
    }
  </style>
</head>

<body>
  <!-- Page Content
    ================================================== -->
  <!-- Hero -->

  <section class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" href="index.php" title="Home"><img alt="Bluesun Logo" src="img/logo.png" class="img-responsive"></a>
        </div>
      </div>

      <div class="col-md-12">
        <h1>
            <strong>Entre para o mercado que <br>mais cresce no Brasil!</strong>
          </h1>

        <p class="tagline">
          Seja Franqueado de uma das maiores Importadoras e Distribuidoras do mercado.
        </p>
        <a class="btn btn-full" href="#conheca">Saiba mais!</a>
      </div>
    </div>

  </section>
  <!-- /Hero -->

  <!-- Header -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="img/logo-nav.png" class="img-responsive" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#about">Nossos números</a></li>
          <li><a href="#tiposfranquias">Franquias</a></li>
          <li><a href="#portfolio">Padrão Bluesun</a></li>
          <li><a href="#team">Depoimentos</a></li>
          <li><a href="#contact">Contato</a></li>
          <li><a href="https://bluesundobrasil.com.br/franqueados/" target="_blank">Nossas Unidades</a></li>
          <li><a class="btn btn-sm" href="#cof" style="height: 30px; padding-top: 3px; margin-top: 15px;">Receba a C.O.F.</a></li>
        </ul>
      </nav>
      
    </div>
  </header>
  <!-- #header -->

  <!-- Seção Conheça Franquia Bluesun -->

<section class="conheca" id="conheca">
  <div class="container text-center">

    <h2 class="text-center" style="color: #23A887; margin-bottom: -6px;"><strong>Conheça a Franquia Bluesun</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">Um negócio rentável e sólido!</h2>

      <iframe width="100%" height="500" src="https://www.youtube.com/embed/QOBqqumghZU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</section>
  <!-- FIM Seção Conheça Franquia Bluesun -->

  <!-- About -->

  <section class="about" id="about">
    <div class="container text-center">
      <h2 class="text-center" style="color: #23A887; padding-top: -10px;"><strong>Nossos Números</strong></h2>

      <div class="row stats-row">
        <div class="stats-col text-center col-md-4 col-sm-6">
          <div class="circle">
          <?php         
            $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados");
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
            <span class="stats-no" data-toggle="counter-up"><?php echo $row['contador']; ?></span> Nossos Franqueados
          <?php } } ?>
          </div>
        </div>

        <div class="stats-col text-center col-md-4 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up">8.000</span> Projetos Instalados
          </div>
        </div>

        <div class="stats-col text-center col-md-4 col-sm-6">
          <div class="circle">
            <span class="stats-no" data-toggle="counter-up">13</span> Anos de Experiência
          </div>
        </div>

      </div>
    </div>
  </section>



<!-- Seção Bluesun Fature -->

  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <h2>
              Fature mais de R$ 1,5 milhão no ano com a Franquia Bluesun e faça parte de um mercado que cresce até 300% ao ano com adesão até 70% abaixo do mercado*
          </h2><br>
          <p>*valores estimados aproximados do mercado fotovoltaico nacional segundo pesquisa GREENER de AGO/2020</p>
        </div>          
      </div>
    </div>
  </section>
  <!-- FIM Seção Bluesun Fature -->
      
  <!-- Seção Vantagens Bluesun -->
<section class="Vantagens" id="vantagens">
  <div class="container">
    
    <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Antes de escolher uma franquia</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">faça estas perguntas!</h2>

<table class="table table-striped" style="border: none;">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col" style="background: #23A887; color: #fff; text-align: center;">Bluesun</th>
      <th scope="col" style="background: #FBBA00; color: #fff; text-align: center;">Média Mercado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>A franqueadora é também Importadora e Distribuidora para garantir o melhor preço?</td>
      <td style="text-align: center;">SIM</td>
      <td style="text-align: center;">NÃO</td>
    </tr>
    <tr>
      <td>Quantos projetos instalados têm a Franqueadora?</td>
      <td style="text-align: center;">+ 8.000</td>
      <td style="text-align: center;">500</td>
    </tr>
    <tr>
      <td>A quanto tempo a empresa Franqueadora está no mercado?</td>
      <td style="text-align: center;">13 ANOS</td>
      <td style="text-align: center;">4 ANOS</td>
    </tr>
    <tr>
      <td><strong>A empresa Franqueadora está entre as TOP 10 do mercado?</strong></td>
      <td style="text-align: center; color: #23A887;"><strong>SIM</strong></td>
      <td style="text-align: center; color: #FF0000;"><strong>Nenhuma outra no mercado</strong></td>
    </tr>
    <tr>
      <td>Quanto a Franqueadora cobra de Royalties Iniciais (Taxa de Adesão)?</td>
      <td style="text-align: center;">A PARTIR DE R$ 7.000,00</td>
      <td style="text-align: center;">A partir de R$ 25.000,00</td>
    </tr>
    <tr>
      <td>A empresa Franqueadora parcela os Royalties Iniciais em 10 pagamentos?</td>
      <td style="text-align: center;">SIM</td>
      <td style="text-align: center;">NÃO</td>
    </tr>
    <tr>
      <td><strong>Quanto a Franqueadora cobra de Royalties a cada venda?</strong></td>
      <td style="text-align: center; color: #23A887;"><strong>DE 1% A 3%</strong></td>
      <td style="text-align: center; color: #FF0000;"><strong>10%</strong></td>
    </tr>
    <tr>
      <td>A empresa Franqueadora possui Transportadora Própria para entrega em menor tempo?</td>
      <td style="text-align: center;">SIM</td>
      <td style="text-align: center;">NÃO</td>
    </tr>
  </tbody>
</table>
</div>
</section>

<!-- FIM Seção Vantagens Bluesun -->


  <!-- Seção Bluesun Diferente -->

  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <h2>
              Diferente das demais Franquias do mercado, o objetivo da Bluesun é distribuir sistemas fotovoltaicos. Por isso cobra apenas valores simbólicos de seus franqueados, tornando-os MUITO COMPETITIVOS!
            </h2>
        </div>
    
      </div>
    </div>
  </section>
  <!-- FIM Seção Bluesun Diferente -->

  <!-- Seção Escolha Opção de Franquia -->
<section class="tiposfranquias" id="tiposfranquias">
  <div class="container">
    
        <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Escolha entre as DUAS opções de Franquias</strong></h2>
        <h2 class="text-center" style="color: #FBBA00;">que criamos para você!!</h2>

    <div class="row">
        <div class="col-md-6 text-lg-left">
          <div class="card card-block1" style="padding-top: 15px;">
            <h2><strong>Home Office</strong></h2>
            <center><a><img alt="" class="team-img img-responsive" src="img/ophome.jpg"></a>
              <div class="card-title-wrap" style="border: 1px solid #fff; border-radius: 20px; width: 300px;height: 75px; background: #fff;">
                <center><span class="card-title">Investimento <strike>de R$ 100.000,00</strike></span><br> 
                  <span class="card-text" style="color: #FF0000;"><strong>Promocional de R$ 7.000,00</strong></span><br>
                  <span class="card-text">Rumo aos <strong>300 Franqueados</strong></span></center>
              </div> 
              <div class="row"> 
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left;padding-left: 8px;"><i class="fa fa-money fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Venda Total em 6 meses <br><span style="float: left; color: #fff;">R$ 1.316.000,00*</span></span></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left; padding-left: 8px;"><i class="fa fa-pie-chart fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Receita do Franqueado <br><span style="float: left; color: #fff;">R$ 363.000,00*</span></span></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left; padding-left: 8px;"><i class="fa fa-undo fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Retorno sobre Investimento <br><span style="float: left; color: #fff;">30 a 45 dias*</span></span></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left; padding-left: 8px;"><i class="fa fa-line-chart fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Margem de Lucro <br><span style="float: left; color: #fff;">30% a 45%*</span></span></strong></p>
                </div>
              </div>               
            </center>
          </div>
        </div>

        <div class="col-sm-6 text-lg-right">
          <div class="card card-block2" style="padding-top: 15px;">
            <h2><strong>Loja</strong></h2>
            <center><a><img alt="" class="team-img2 img-responsive" src="img/oploja.jpg"></a>
              <div class="card-title-wrap" style="border: 1px solid #fff; border-radius: 20px; width: 300px;height: 75px; background: #fff;">
                <center><span class="card-title">Investimento <strike>de R$ 150.000,00</strike></span><br> 
                  <span class="card-text" style="color: #FF0000;"><strong>Promocional de R$ 15.000,00</strong></span><br>
                  <span class="card-text">Rumo aos <strong>300 Franqueados</strong></span></center>
              </div>
              <div class="row"> 
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left;padding-left: 8px;"><i class="fa fa-money fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Venda Total em 6 meses <br><span style="float: left; color: #fff;">R$ 1.742.000,00*</span></span></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left; padding-left: 8px;"><i class="fa fa-pie-chart fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Receita do Franqueado <br><span style="float: left; color: #fff;">R$ 476.000,00*</span></span></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left; padding-left: 8px;"><i class="fa fa-undo fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Retorno sobre Investimento <br><span style="float: left; color: #fff;">45 a 90 dias*</span></span></strong></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2" style="float: left;">
                  <p style="text-align: left; padding-left: 8px;"><i class="fa fa-line-chart fa-3x" aria-hidden="true" style="border: 2px solid #fff;padding: 15px;border-radius: 50px; color: #fff;"></i></p>
                </div>  
                <div class="col-md-10" style="float: right;margin-top: 25px;">   
                   <p style="float: left;padding-left: 15px;"><strong><span style="padding-top: -15px;">Margem de Lucro <br><span style="float: left; color: #fff;">40% a 55%*</span></span></strong></p>
                </div>
              </div>              
            </center>
          </div>
        </div>
    </div>
    
  </div> 
  <p><center>*Valores baseados no desenvolvimento de Franqueados Bluesun nos últimos 6 meses.</center></p>
</section>


  <!-- Seção Escolha Opção de Franquia -->

  <!-- Seção Bluesun Garante -->
  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <h2>
              Ao se tornar um franqueado de uma marca reconhecida nacionalmente, você irá trabalhar em um modelo de negócio, comprovadamente eficiente, conquistando resultados com muito mais rapidez!
            </h2>
        </div>
    
      </div>
    </div>
  </section>
  <!-- FIM Seção Bluesun Garante -->


  <!-- Seção Compare -->
<section class="compare" id="compare">
  <div class="container">
    
    <h2 class="text-center" style="color: #23A887; margin-bottom: -7px;"><strong>Compare e veja</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">e escolha a melhor opção para você!</h2>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col" style="background: #23A887; color: #fff; text-align: center;">Home Office</th>
      <th scope="col" style="background: #FBBA00; color: #fff; text-align: center;">Loja</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Acesso a desconto na tabela de preços Bluesun</td>
      <td style="text-align: center; color: #23A887; "><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Curso de capacitação ao Franqueado</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Projeto, ART e acompanhamento com a concessionária gratuito</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Assessoria de Engenharia antes, durante e depois da venda</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Assessoria de Marketing gratuita</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Assessoria Jurídica especializada</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Frete GRÁTIS em todo território nacional</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Aterramento fotovoltaico GRÁTIS</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Acesso à ferramenta exclusiva de CRM</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
    <tr>
      <td>Projeto arquitetônico interno e externo</td>
      <td style="text-align: center; color: #FBBA00;"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true">*</i></td>
    </tr>
    <tr>
      <td>Taxa reduzida de Royalties</td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
      <td style="text-align: center; color: #23A887;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></td>
    </tr>
  </tbody>
</table>
<p style="font-size: 12px;">*Consulte condições.</p>
</div>
</section>

<!-- FIM Seção Vantagens Bluesun -->

<!-- Seção Padrão Bluesun -->

  <section class="portfolio" id="portfolio">
    <div class="container text-center">
      <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Padrão Bluesun</strong></h2>
      <h2 class="text-center" style="color: #FBBA00;">Conheça os ambientes modelo da Loja Bluesun para Franqueados.</h2>
    </div>

    <div class="portfolio-grid">
      <div class="row">

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img1.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img1.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img2.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img2.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img3.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img3.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img4.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img4.jpg" class="img-responsive"></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img5.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img5.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img6.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img6.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img7.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img7.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img8.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img8.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img9.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img9.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img10.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img10.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img11.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img11.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/gallery_img12.jpg" data-lightbox="gallery-mf"><img alt="" src="img/gallery_img12.jpg" class="img-responsive"></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Seção Padrão Bluesun -->

<!-- Seção Bluesun Garante -->

  <section class="cta" style="margin-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <h2>
              A Franquia Bluesun te garante todo SUPORTE, LUCRATIVIDADE e COMPETITIVIDADE para crescer nesta área!
            </h2>
        </div>
    
      </div>
    </div>
  </section>
  <!-- FIM Seção Bluesun Garante -->


  <!-- Seção Bluesun Treinamentos-->

<section class="treinamentos" id="treinamentos">
  <div class="container text-justify" style="margin-top: 30px;">
    <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Você não precisa ser um profissional da área</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">Treinamento Completo no maior Centro de Treinamentos do Brasil!</h2>
    
    <iframe width="100%" height="500" src="https://www.youtube.com/embed/3TOvQ6FN94c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br><br>
    <p>A Bluesun do Brasil fornece um Curso Completo (teórico e prático), totalmente GRATUITO para todos os seus Franqueados, no maior Centro de Treinamentos do Brasil, no nosso Centro de Distribuição Sudeste, em Limeira/SP.</p>
    <p>Um Curso completo, com equipamentos de ponta e profissionais capacitados e experientes, que te ensinam desde a Teoria Fotovoltaica à Instalação em todos os tipos de telhados, carport, monoposte e bomba de água movida a energia solar.</p>
    <p>Tudo isso com o suporte de uma das maiores Importadora e Distribuidora do país.</p>
  </div>
  <div class="portfolio-grid">
      <div class="row">

         <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/31.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/31.jpg" class="img-responsive"></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/33.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/33.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/36.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/36.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/47.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/47.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/5.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/5.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/7.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/7.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/8.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/8.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/12.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/12.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block"> 
            <a href="img/curso/13.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/13.jpg" class="img-responsive"></a>
          </div>
        </div>

        
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/18.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/18.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/19.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/19.jpg" class="img-responsive"></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="img/curso/29.jpg" data-lightbox="gallery-mf"><img alt="" src="img/curso/29.jpg" class="img-responsive"></a>
          </div>
        </div>

      </div>
</section>

  <!-- FIM Seção Redes Sociais/Marketing -->

  <!-- Seção Redes Sociais/Marketing-->

<section class="redes" id="redes">
  <div class="container text-justify" style="margin-top: 10px;" >
    <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Mídias Digitais</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">Investimento constante!</h2>
    <center><img class="img-responsive" width="80%" height="500" src="img/redesbluesun.png"></img></center>
    <p>A Bluesun do Brasil investe constantemente em sua marca através de veículos tradicionais como Rádio e TV e em mídias digitais como GoogleAds, FacebookAds e publicidade em portais.</p> 
    <p>O resultado destas ações é atingir, mensalmente, mais de 1,5 milhões de pessoas, gerando mais de 1000 leads  qualificados para nossos Franqueados.<p>
    <p>Esta estratégia é, também, uma grande aliada para prospecção de novos clientes, sendo sempre uma porta aberta na hora de agendar uma visita!</p>
  </div>
</section>
  <!-- FIM Seção Redes Sociais/Marketing -->

  

  <!-- Seção Crescimento Mercado -->

<section class="crescimento" id="crescimento">
  <div class="container text-center" style="margin-top: 30px;">
    <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Crescimento SÓLIDO do setor fotovoltaico</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">desde 2012</h2>
    <img class="img-responsive" width="80%" height="600" src="img/grafico-crescimento-mercado.png"></img>
  </div>
</section>
  <!-- FIM Seção Crescimento Mercado -->

  <!-- Seção Bluesun Garante -->
  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <h2>
              Com crescimento de até 300% ao ano, este mercado é o <br>MELHOR INVESTIMENTO para os próximos anos.
            </h2>
        </div>
    
      </div>
    </div>
  </section>
  <!-- FIM Seção Bluesun Garante -->

  <!-- Seção GREENER -->

<section class="greener" id="greener">
  <div class="container text-center">
    <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>A Bluesun está entre as
TOP 10 do Brasil</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">Pesquisa GREENER de 2020</h2>
    <center><img class="img-responsive" width="80%" height="600" src="img/greener.png"></img></center>
  </div>
</section>
  <!-- FIM Seção GREENER -->

  <!-- Seção Nossas Marcas-->

    <section id="marcas" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Nossas Marcas</strong></h2>
          <h2 class="text-center" style="color: #FBBA00;">Os melhores preços em painéis e inversores de grandes marcas mundiais</h2>
        </div>
        <div class="col-md-12">
          <table class="table">
            <tbody>
              <tr>
                <td style="border: none;"><a href="http://www.ulicasolar.com/" target="_blank"><img src="img/logo-marcas/ulica_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
                <td style="border: none;"><a href="https://www.canadiansolar.com/br/" target="_blank"><img src="img/logo-marcas/canadian_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
                <td style="border: none;"><a href="https://www.fotofix.com.br" target="_blank"><img src="img/logo-marcas/fotofix_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
                <td style="border: none;"><a href="https://www.fronius.com/pt-br/brasil" target="_blank"><img src="img/logo-marcas/fronius_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
              </tr>
              <tr>
                <td style="border: none;"><a href="https://www.ginverter.pt/" target="_blank"><img src="img/logo-marcas/growatt_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
                <td style="border: none;"><a href="https://proauto-electric.com/solar/" target="_blank"><img src="img/logo-marcas/proauto_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
                <td style="border: none;"><a href="http://www.saj-electric.com/" target="_blank"><img src="img/logo-marcas/saj_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
                <td style="border: none;"><a href="https://pt.znshinesolar.com/" target="_blank"><img src="img/logo-marcas/zshine_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
              </tr>
              <tr>
                <td style="border: none;"><a href="https://pt.dahsolarpv.com/" target="_blank"><img src="img/logo-marcas/dah_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
                <td style="border: none;"><a href="https://www.ntcsomar.com.br/" target="_blank"><img src="img/logo-marcas/ntc_l.png" alt="" class="img-responsive" style="width: 100%;"></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section><!-- #clients -->

  <!-- Seção Depoimentos -->

  <section class="team" id="team">
    <div class="container">

    <h2 class="text-center" style="color: #23A887; margin-bottom: -8px;"><strong>Depoimentos</strong></h2>
    <h2 class="text-center" style="color: #FBBA00;">O que falam os Franqueados!</h2>
      
      <div class="row">
        <div class="col-sm-4 col-xs-4">
          <div class="card card-block" >
            <center><i class="fa fa-quote-right fa-2x" aria-hidden="true" style="border: 2px solid #FBBA00; background: #FBBA00; padding: 10px; width: 55px ;border-radius: 27px; color: #23A887; text-align: center;"></i></center>
            <h2 class="text-center" style="color: #000; padding-top: 20px; margin-bottom: 35px !important; font-size: 28px;"><strong>"Uma grande parceira"</strong></h2>
            <p style="color: #000; font-size: 16px; text-align: justify; padding-bottom: 10px;">A Bluesun me ajudou a entrar no mercado fotovoltaico de forma muito competitiva. Minha equipe recebeu treinamento técnico e até treinamento de vendas. Tendo os menores preços, dificilmente perdemos orçamento!</p>
              <div class="card-title-wrap" style="border: 20px;">
                <center><span class="card-title">Giovani Dalzoto</span> <span class="card-text" style="font-size: 16px;">Franqueado Bluesun</span><span class="card-text" style="font-size: 16px;">Ponta Grossa/PR</span></center>
              </div>              
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="card card-block">
            <center><i class="fa fa-quote-right fa-2x" aria-hidden="true" style="border: 2px solid #FBBA00; background: #FBBA00; padding: 10px; width: 55px ;border-radius: 27px; color: #23A887; text-align: center;"></i></center>
            <h2 class="text-center" style="color: #000; padding-top: 20px; margin-bottom: 35px !important; font-size: 28px;"><strong>"Confiança da marca"</strong></h2>
            <p style="color: #000; font-size: 16px; text-align: justify; padding-bottom: 58px;">Já trabalhava como integrador há algum tempo, mas depois que me tornei franqueado Bluesun pude sentir o quanto o "peso" de uma grande marca ajuda a abrir portas!</p>
              <div class="card-title-wrap" style="border: 20px;">
                <center><span class="card-title">Gleyson Castro</span> <span class="card-text" style="font-size: 16px;">Franqueado Bluesun</span><span class="card-text" style="font-size: 16px;">Rio Claro/SP</span></center>
              </div>              
          </div>
        </div>

        <div class="col-sm-4 col-xs-4">
          <div class="card card-block">
            <center><i class="fa fa-quote-right fa-2x" aria-hidden="true" style="border: 2px solid #FBBA00; background: #FBBA00; padding: 10px; width: 55px ;border-radius: 27px; color: #23A887; text-align: center;"></i></center>
            <h2 class="text-center" style="color: #000; padding-top: 20px; margin-bottom: 35px !important; font-size: 28px;"><strong>"Ganhei competitividade"</strong></h2>
            <p style="color: #000; font-size: 16px; text-align: justify; padding-bottom: 10px;">Já era parceira da Bluesun há muito tempo, quando lançaram a Franquia, oferecendo tabelas ainda menores, não exitei em me franquear. Com preços ainda menores, consegui aumentar minha margem de lucro e meus orçamentos!</p>
              <div class="card-title-wrap" style="border: 20px;">
                <center><span class="card-title">Samara Welter</span> <span class="card-text" style="font-size: 16px;">Franqueado Bluesun</span><span class="card-text" style="font-size: 16px;">São Leopoldo/RS</span></center>
              </div>              
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- FIM Seção Depoimentos -->
  <!-- @component: footer -->

  <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 class="text-center" style="color: #23A887;"><center><strong>Contato</strong></center></h2>
          
        </div>

        <div class="row contact-info">

          <div class="col-md-3">
            <div class="contact-address text-center">
              <i class="fa fa-map-marker fa-2x" aria-hidden="true" style="color: #23A887;"></i>
              <h3 style="color: #FBBA00;">Endereço</h3>
              <address>Av. Vitorino Arigone,450</address>
              <address>Jardim Santa Bárbara - Limeira/SP</address>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-phone text-center">
              <i class="fa fa-phone fa-2x" aria-hidden="true" style="color: #23A887;"></i>
              <h3 style="color: #FBBA00;">Telefone</h3>
              <p><a href="tel:+1934438228">(19) 3443-8228</a></p>
              <p><a href="tel:+19983642927">(19) 98364-2927 (WhatsApp)</a></p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-email text-center">
              <i class="fa fa-envelope fa-2x" aria-hidden="true" style="color: #23A887;"></i>
              <h3 style="color: #FBBA00;">E-mail</h3>
              <p><a href="mailto:franquias@bluesundobrasil.com.br">franquias@bluesundobrasil.com.br</a></p>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <i class="fa fa-at fa-2x" aria-hidden="true" style="color: #23A887;"></i>
              <h3 style="color: #FBBA00;">Acompanhe a Bluesun</h3>
            <div class="col-md-2 text-center" style="float: left;">
                  <p><a href="https://www.facebook.com/bluesunsolardobrasil" target="_blank"><i class="fa fa-facebook-official fa-2x" aria-hidden="true" style="color: #0D8BF1;"></i></a></p>
                </div>

                <div class="col-md-2 text-center" style="float: left;">
                  <p><a href="https://www.instagram.com/bluesunsolar/" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true" style="color: #D92C7B;"></i></a></p>
                </div>

                <div class="col-md-2 text-center" style="float: left;">
                  <p><a href="https://twitter.com/bluesunsolarbr" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true" style="color: #1DA1F2;"></i></a></p>
                </div>

                <div class="col-md-2 text-center" style="float: left;">
                  <p><a href="https://www.linkedin.com/in/bluesundobrasil/" target="_blank"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true" style="color: #0A66C2;"></i></a></p>
                </div>

                <div class="col-md-2 text-center" style="float: left;">
                  <p><a href="https://www.youtube.com/channel/UCw89FtaMAwIyCgMLNghTwTg" target="_blank"><i class="fa fa-youtube-play fa-2x" aria-hidden="true" style="color: #FF0000;"></i></a></p>
                </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14735.171647870413!2d-47.3889789!3d-22.5868474!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5e3bb253839645dd!2sBlueSun%20do%20Brasil!5e0!3m2!1spt-BR!2sbr!4v1617818257338!5m2!1spt-BR!2sbr" width="100%" height="500"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    

     <div id="cof">
      <div class="section-header">
        <h2 class="text-center" style="color: #23A887; margin-bottom: -6px;"><center><strong>Receba nossa Circular de Oferta de Franquia (C.O.F.)</strong></center></h2>
        <h2 class="text-center" style="color: #FBBA00;">Preencha seus dados abaixo!</h2>
      </div>


      <div class="container">
        <div class="form">
          <div id="sendmessage" class="text-success" style="border-color: #333;">Sua mensagem foi enviada. Obrigado!</div>
          <div id="errormessage" class="text-dark" style="border-color: #333;">Sua mensagem não pode ser enviada!</div>
          <div id="errormessage"></div>
          <form action="mail.php" method="post" role="form" class="contactForm" id="form_validacao">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nome">Nome Completo <span class="text-danger font-weight-bold">*</span></label>
                <input type="text" name="nome" class="form-control" id="name" placeholder="Seu Nome" data-rule="minlen:4" data-msg="Por favor, insira pelo menos 4 caracteres" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="email">E-mail <span class="text-danger font-weight-bold">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Seu E-mail" data-rule="email" data-msg="Por favor, informe um e-mail válido" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-3">
                <label for="telefone">Telefone</label>
                <input type="telefone" class="form-control telefone" name="telefone" id="telefone" placeholder="Telefone" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-3">
                <label for="celular">Celular <span class="text-danger font-weight-bold">*</span></label>
                <input type="celular" class="form-control celular" name="celular" id="celular" placeholder="Celular" data-rule="minlen:11" data-msg="Por favor, informe um celular válido" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-4">
                <label for="cidade">Cidade <span class="text-danger font-weight-bold">*</span></label>
                <input type="cidade" class="form-control" name="cidade" id="cidade" placeholder="Cidade" data-rule="minlen:3" data-msg="Por favor, informe uma cidade" />
                <div class="validation"></div>
              </div>
                <div class="form-group col-md-2">
                  <label for="uf">Estado <span class="text-danger font-weight-bold">*</span></label>
                  <select class="form-control" name="uf" required="" value="">
                    <option disabled="" selected="">Selecione</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                  </select>
                </div>
              </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="assunto" id="subject" value="Gostaria de receber a COF" data-rule="minlen:4" data-msg="Por favor, insira pelo menos 8 caracteres do assunto" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="mensagem">Mensagem</label>
              <textarea class="form-control" name="mensagem" rows="5" placeholder="Mensagem"></textarea>
            </div><hr/>
            <span class="text-danger font-weight-bold">*</span> Campos com preenchimento obrigatório<hr/>
            <div class="text-center"><button type="submit">Enviar Mesagem</button></div>
          </form>
        </div>
      </div>
    </section><!-- #contact -->

  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-xs-12 text-lg-left text-center">
            <div class="credits">
             Desenvolvido por <a href="https://bluesundobrasil.com.br/">Bluesun Solar</a>
            </div>
          </div>

          <div class="col-lg-9 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>

              <li class="list-inline-item">
                <a href="#about">Nossos Números</a>
              </li>

              <li class="list-inline-item">
                <a href="#portfolio">Padrão Bluesun</a>
              </li>

              <li class="list-inline-item">
                <a href="#team">Depoimentos</a>
              </li>

              <li class="list-inline-item">
                <a href="#contact">Contato</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>


  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/tether/js/tether.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/easing/easing.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/lockfixed/lockfixed.min.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <script src="contactform/contactform.js"></script>

</body>
</html>
