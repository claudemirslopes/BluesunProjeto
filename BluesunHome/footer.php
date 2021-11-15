 <!--==========================
    Footer
  ============================-->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-4 footer-info">

            <center><img src="img/logobranco.png" alt="TheEvenet" align="center"></center>
              <p>A Energia Solar Fotovoltaica é um dos melhores investimentos para Indústrias, Comércios e Residências. Com linhas de financiamentos de juros baixos, a Energia Solar se tornou muito viável para reduzir sua conta de energia e um payback muito rápido, com médias de 2 a 3 anos.</p><br>

              <p><b><center>INVISTA EM ENERGIA LIMPA E RENOVÁVEL</center></b></p>
            </div>

            <div class="col-lg-4 footer-links">
              <h4>Links Úteis</h4>
              <ul>
                <li><i class="fa fa-angle-right"></i> <a href="#intro">Home</a></li>                
                <li><i class="fa fa-angle-right"></i> <a href="#historia">Nossa História</a></li>
                <li><i class="fa fa-angle-right"></i> <a href="#fundadores">Fundadores</a></li>
                <li><i class="fa fa-angle-right"></i> <a href="#divisoes">Divisões Bluesun</a></li>
                <li><i class="fa fa-angle-right"></i> <a href="#galeria">Galeria</a></li>
                <li><i class="fa fa-angle-right"></i> <a href="#contato">Contato</a></li>
                <li class="buy-tickets"><i class="fa fa-angle-right"></i><a href="http://orcamentos.bluesundobrasil.com.br/login.php" target="_blank">Acesso a Plataforma</a></li>
              </ul>
            </div>

            <div class="col-lg-4 footer-contact">
              <h4>Contatos</h4>
              <?php         
                $stmt = $DB_con->prepare('SELECT * FROM bs_contato ORDER BY contato_id DESC LIMIT 1');
                $stmt->execute();
                if($stmt->rowCount() > 0) {
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
              ?>
              <p>
                <?php echo $row['contato_endereco']; ?> <br>
                <?php echo $row['contato_bairro']; ?><br>
                <?php echo $row['contato_cidade']; ?>/<?php echo $row['contato_estado']; ?> <br>
                <strong>Telefone:</strong> <?php echo $row['contato_telefone']; ?><br>
                <strong>WhatsApp:</strong> <?php echo $row['contato_celular']; ?><br>
                <strong>E-mail:</strong> <?php echo $row['contato_email']; ?><br>
              </p>
              <?php }
                } else { ?>
                  <div class="col-xs-12">
                    <div class="alert alert-warning">
                        <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sem dados encontrados...
                      </div>
                  </div>
              <?php } ?>

              <h4> Siga a Bluesun</h4>
              <div class="social-links">
                <a href="https://www.facebook.com/bluesunsolardobrasil" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/bluesunsolar/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://twitter.com/bluesunsolarbr" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/bluesundobrasil/" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="https://www.youtube.com/channel/UCw89FtaMAwIyCgMLNghTwTg" target="_blank" class="linkedin"><i class="fa fa-youtube"></i></a>
              </div>

            </div>

          </div>
        </div>
      </div>

      <div class="container">
    
        <div class="copyright">
          Desenvolvido por <a href="index.php#intro"><img src="img/logobranco.png" alt="image" title="" class="responsive" style="width: 10%;" /></a>
        </div>
        
      </div>
    </footer><!-- #footer -->
    <div><?php include_once('Chat_online.php'); ?></div>  

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>

</html>