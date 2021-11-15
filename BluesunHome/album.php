<?php include_once('header.php') ?>
<?php include_once('nav3.php') ?>


    <!--==========================
      Speaker Details Section
    ============================-->
  <main id="main" class="main-page">
    <!--==========================
      Gallery Section - Seção Galeria
    ============================-->
    <section id="galeria" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Galeria</h2>
          
        </div>
      </div>

      <div class="card-group">
        <?php         
          $stmt = $DB_con->prepare('SELECT * FROM bs_album ORDER BY album_id DESC');
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

    </section>

  </main>


  <?php include_once('footer2.php') ?>
