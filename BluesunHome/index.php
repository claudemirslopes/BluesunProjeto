<?php
  require_once 'admin/dbconfig.php';
  require_once 'admin/conexion.php';
?>

<?php include_once('header.php') ?>
<?php include_once('nav.php') ?>

<style type="text/css">
  .smais a {
    width: 30% !important;  
    color: #28A745 !important;
}

.smais a:hover {
    color: #fff !important;
}
.btn {
  font-size: .7em !important;
}
</style>

  
  <!--==========================
    Intro Section - Seção Intodução
  ============================-->
  <?php         
    $stmt = $DB_con->prepare('SELECT * FROM bs_slide ORDER BY slide_id ASC LIMIT 1');
    $stmt->execute();
    if($stmt->rowCount() > 0) {
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
  ?>
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0"><?php echo $row['slide_titulo']; ?></h1> 
      <p class="mb-4 pb-0"><?php echo $row['slide_subtitulo']; ?></p>
      <a href="<?php echo $row['slide_url']; ?>" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a><br>
      <a href=""><img src="img/ABGD.png" width="80%" alt="image" title="" class="responsive"/></a>
    </div>
  </section>
  <?php }
      } else { ?>
        <div class="col-xs-12">
          <div class="alert alert-warning">
              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
            </div>
        </div>
  <?php } ?>

<main id="main">

  <!--==========================
      About Section
    ============================-->
    <?php         
      $stmt = $DB_con->prepare('SELECT * FROM bs_slide ORDER BY slide_id ASC LIMIT 1');
      $stmt->execute();
      if($stmt->rowCount() > 0) {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
    ?>
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12" text-align="center">
            <h2><?php echo $row['slide_texto']; ?></h2>
                    
          </div>
          
        </div>
      </div>
    </section>
    <?php }
      } else { ?>
        <div class="col-xs-12">
          <div class="alert alert-warning">
              <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
            </div>
        </div>
    <?php } ?>

    <!--==========================
      Schedule Section - Seção Historia Bluesun
    ============================-->
    <section id="historia" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="container">
        <div class="section-header">
          <h2>Nossa História</h2>
          
        </div>
        <?php         
          $stmt = $DB_con->prepare('SELECT * FROM bs_historia ORDER BY historia_id ASC LIMIT 1');
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
          <?php echo $row['historia_texto']; ?>
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
    </section>
  


        <!--==========================
      Speakers Section - Seção Fundadores
    ============================-->
    <section id="fundadores" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Nossos Fundadores</h2>
          
        </div>

        <?php         
          $stmt = $DB_con->prepare('SELECT * FROM bs_fundadores ORDER BY fundadores_id ASC LIMIT 1');
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="row" style="justify-content: center;">
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="img/fundadores/<?php echo $row['fundadores_img']; ?>" alt="Fundadores 1" class="img-fluid">
            </div>
          </div>
          <div class="col-md-6">
            <div class="details">
              <h2 style="color: #FD834C;margin-bottom: -1px !important;"><?php echo $row['fundadores_titulo']; ?></h2>
              <h3 class="text-dark" style="font-size: 1.2em;"><?php echo $row['fundadores_subtitulo']; ?></h3>
                <?php echo $row['fundadores_texto']; ?>
            </div>
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
        <hr class="mb-4" />
        <?php         
          $stmt = $DB_con->prepare('SELECT * FROM bs_fundadores ORDER BY fundadores_id DESC LIMIT 1');
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="row" style="justify-content: center;">
          <div class="col-md-6">
            <div class="details">
              <h2 style="color: #FD834C;margin-bottom: -1px !important;"><?php echo $row['fundadores_titulo']; ?></h2>
              <h3 class="text-dark" style="font-size: 1.2em;"><?php echo $row['fundadores_subtitulo']; ?></h3>
                <?php echo $row['fundadores_texto']; ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="img/fundadores/<?php echo $row['fundadores_img']; ?>" alt="Fundadores 1" class="img-fluid">
            </div>
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
    </section>

    
    <!--==========================
      Hotels Section - Divisões Bluesun
    ============================-->
    <section id="divisoes" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Divisões Bluesun</h2>
          <h6>Somos 3 empresas em 1 empresa só!</h6>
        </div>

        <div class="row">

          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM bs_divisoes WHERE divisoes_id = 1');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="divisoes">
              <div class="divisoes-img">
                <iframe width="100%" height="180" src="<?php echo $row['divisoes_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <center><img src="img/divisoes/<?php echo $row['divisoes_img']; ?>" class="img" alt="" class="responsive" style="width: 30%; margin-bottom: -15%;"></center>                
              <h3 style="margin-top: 9%;"><?php echo $row['divisoes_titulo']; ?></h3>
              </div>
              <h6><?php echo $row['divisoes_subtitulo']; ?></h6>
              <br>
              <div class="text-center" style="padding-bottom: 5%;">
                <a href="<?php echo $row['divisoes_linkbotao']; ?>" target="_blank"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#marcas-modal" data-ticket-type="standard-access" style="width: 30%;">Saiba Mais</button></a>
                <br>
              </div>
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

          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM bs_divisoes WHERE divisoes_id = 2');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="divisoes">
              <div class="divisoes-img">
                <iframe width="100%" height="180" src="<?php echo $row['divisoes_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <center><img src="img/divisoes/<?php echo $row['divisoes_img']; ?>" class="img-fluid" alt="" class="responsive" style="width: 30%; margin-bottom: -15%;"></center>                
              <h3 style="margin-top: 9%;"><?php echo $row['divisoes_titulo']; ?></h3>
              </div>
              <h6><?php echo $row['divisoes_subtitulo']; ?></h6>
              <br>
              <div class="text-center smais" style="padding-bottom: 5%;">
                <a href="" class="btn btn-outline-success" data-toggle="modal" data-target="#<?php echo $row['divisoes_linkbotao']; ?>" data-ticket-type="standard-access">Saiba Mais</a>
                <br>
              </div>
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


          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM bs_divisoes WHERE divisoes_id = 3');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="divisoes">
              <div class="divisoes-img">
                <iframe width="100%" height="180" src="<?php echo $row['divisoes_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <center><img src="img/divisoes/<?php echo $row['divisoes_img']; ?>" class="img-fluid" alt="" class="responsive" style="width: 30%; margin-bottom: -15%;"></center>                
              <h3 style="margin-top: 9%;"><?php echo $row['divisoes_titulo']; ?></h3>
              </div>
              <h6><?php echo $row['divisoes_subtitulo']; ?></h6>
              <br>
              <div class="text-center" style="padding-bottom: 5%;">
                <a href="<?php echo $row['divisoes_linkbotao']; ?>" target="_blank"><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#marcas-modal" data-ticket-type="standard-access" style="width: 30%;">Saiba Mais</button></a>
                <br>
              </div>
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

    </section>

    <!--==========================
      Gallery Section - Seção Galeria
    ============================-->
    <section id="galeria" class="wow fadeInUp" style="margin-bottom: -35px;">

      <div class="container">
        <div class="section-header">
          <h2>Galeria</h2>
          
        </div>
      </div>

      <div class="card-group">
        <?php         
          $stmt = $DB_con->prepare('SELECT * FROM bs_album ORDER BY album_id DESC LIMIT 6');
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-lg-4">
          <div class="card">
            <a href="galeria.php?edit_id=<?php echo $row['album_id']; ?>"><img class="card-img-top" style="height: 190px;" src="img/album/<?php echo $row['album_img']; ?>" alt="<?php echo $row['album_descricao']; ?>"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['album_descricao']; ?></h5>
              <p class="card-text" style="font-size: .8em !important;"><?php echo $row['album_texto']; ?></p>
              <p class="card-text text-right"><small class="text-muted"><?php echo date('d/m/Y', strtotime($row['date'])); ?></small></p>
            </div>
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
      <p style="text-align: center;margin-top: 25px;text-transform: uppercase;"><a class="btn btn-danger btn-sm" href="album.php">Ver galeria completa</a></p>

    </section>

    <!--==========================
      Seção Nossas Marcas
    ============================-->

    <section id="marcas" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Nossas Marcas</h2>
          <p>Conheça nossos fornecedores e parceiros.</p>
        </div>
       
        <div class="row">

          <?php         
            $stmt = $DB_con->prepare('SELECT * FROM bs_marcas ORDER BY marcas_id ASC LIMIT 16');
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($rows_d=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($rows_d);
          ?>
          <div class="col-lg-3">
            <div class="card mb-4 mb-lg-4">
              <div class="card-body">
                <center><img src="img/logo-marcas/<?php echo $rows_d['marcas_img']; ?>" class="img-fluid" alt=""></center>
                <hr>
                <div class="text-center">
                  <a href="<?php echo $rows_d['marcas_url']; ?>" target="_blank" class="btn">Conheça a <?php echo $rows_d['marcas_titulo']; ?></a>
                </div>
                <hr style="border-top: none; margin-top: -20px;">
                <div class="text-center">
                  <a href="marca.php?id_banner=<?php echo $rows_d['marcas_id']; ?>"><button type="button" class="btn" data-toggle="modal" data-target="#marcas-modal" data-ticket-type="standard-access">Datasheets</button></a>
                </div>
              </div>
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


    </section>
    


    <!--==========================
      Contact Section - Seção Contato
    ============================-->
      <section id="contato" class="section-bg wow fadeInUp">

        <div class="container">

          <div class="section-header">
            <h2>Contato</h2>
      
          </div>

          <div class="row contato-info">
            <?php         
              $stmt = $DB_con->prepare('SELECT * FROM bs_contato ORDER BY contato_id DESC LIMIT 1');
              $stmt->execute();
              if($stmt->rowCount() > 0) {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                  extract($row);
            ?>
            <div class="col-md-4">
              <div class="contato-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Endereço</h3>
                <address><?php echo $row['contato_endereco']; ?><br/>
                <?php echo $row['contato_bairro']; ?> - <?php echo $row['contato_cidade']; ?>/<?php echo $row['contato_estado']; ?></address>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contato-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Telefone</h3>
                <p><a href="tel:+55<?php echo $row['contato_telefone']; ?>"><?php echo $row['contato_telefone']; ?></a></p>
                <p><a href="tel:+55<?php echo $row['contato_celular']; ?>"><?php echo $row['contato_celular']; ?> (WhatsApp)</a></p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contato-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:<?php echo $row['contato_email']; ?>"><?php echo $row['contato_email']; ?></a></p>
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

              <div class="container mb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14735.171647870413!2d-47.3889789!3d-22.5868474!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5e3bb253839645dd!2sBlueSun%20do%20Brasil!5e0!3m2!1spt-BR!2sbr!4v1617818257338!5m2!1spt-BR!2sbr" width="100%" height="500"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            
         </div>
        

          <div class="form">
            <div id="sendmessage" class="text-success" style="border-color: #333;">Sua mensagem foi enviada. Obrigado!</div>
            <div id="errormessage" class="text-dark" style="border-color: #333;">Sua mensagem não pode ser enviada!</div>
            <form action="mail.php" method="post" role="form" class="contactForm">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="nome" class="form-control" id="name" placeholder="Seu Nome" data-rule="minlen:4" data-msg="Por favor, digite ao menos 4 caracteres" />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Seu E-mail" data-rule="email" data-msg="Por favor, informe um e-mail válido" />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="assunto" id="subject" placeholder="Assunto" data-rule="minlen:4" data-msg="Por favor, insira pelo menos 8 caracteres do assunto" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="mensagem" rows="5" data-rule="required" data-msg="Por favor, escreva algo para nós" placeholder="Mensagem"></textarea>
                <div class="validation"></div>
              </div>
              <div class="alert-msg" style="text-align: left;"></div>
              <div class="text-center"><button type="submit" class="bg-success">Enviar Mesagem</button></div>
            </form>
          </div>

        </div>
      </section><!-- #contact -->

  </main>

  <!-- Modal da Seção Franquias -->
      <div class="modal fade" id="encontrefranqueado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle" style="color: #FD834C;">Franqueadora Bluesun</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Para você que deseja ser um Franqueado Bluesun ou Encontrar um Franqueado mais próximo!
            </div>
            <div class="modal-footer" style="justify-content: center;">
              <a href="https://franquias.bluesundobrasil.com.br/" target="_blank"><button type="button" class="btn btn-success">Quero ser Franqueado</button></a>
              <a  href="https://bluesundobrasil.com.br/franqueados/" target="_blank"><button type="button" class="btn btn-warning text-light">Encontre um Franqueado</button></a>
            </div>
          </div>
        </div>
      </div>

  <?php include_once('footer.php') ?>



 
