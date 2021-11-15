<?php
require_once 'admin/conexao/init.php';
header( 'Content-Type: text/html; charset=utf-8' );

// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
// Veja o Exemplo 2 deste link: http://php.net/manual/pt_BR/pdostatement.rowcount.php
$sql_count = "SELECT COUNT(*) AS total FROM bs_marcas ORDER BY marcas_id ASC";

// SQL para selecionar os registros
$sql = "SELECT * FROM bs_marcas ORDER BY marcas_id DESC limit 1";

// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>

<?php include_once("admin/conexao/conexao.php");
$id_curso = $_GET['id_banner'];
$result_cursos = "SELECT * FROM bs_marcas WHERE marcas_id='$id_curso'";
$resultado_cursos = mysqli_query($conn, $result_cursos);
$rows_d = mysqli_fetch_assoc($resultado_cursos);
?>

<?php

  require_once 'admin/dbconfig.php';
  
  if(isset($_GET['delete_id']))
  {    
    // it will delete an actual record from db
    $stmt_delete = $DB_con->prepare('DELETE FROM bs_datasheet WHERE datasheet_id =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_id']);
    $stmt_delete->execute();
    
    header("Location: index.php");
  }

  date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');


?>
<?php include_once('header.php') ?>
<?php include_once('nav2.php') ?>


    <!--==========================
      Speaker Details Section
    ============================-->
  <main id="main" class="main-page">
    <section id="fundadores-details" class="wow fadeIn">
      <div class="container">
          <div class="section-header">
            <center><img src="img/logo-marcas/<?php echo $rows_d['marcas_img'];?>" class="img-fluid" alt="" class="responsive" style="width: 50%;"></center>
            <br>
            <h2></h2>
            <p>Veja aqui os datasheets <strong><?php echo $rows_d['marcas_titulo'];?></strong></p>
          </div>

          <div class="row">
          <?php
            $stmt = $DB_con->prepare("SELECT * FROM bs_datasheet WHERE datasheet_marca_id = {$rows_d['marcas_id']} ORDER BY datasheet_id ASC");
            $stmt->execute();
            if($stmt->rowCount() > 0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
          ?>
            <style type="text/css">
              .btn-danger {
                background: #FD834C;
                border: 1px solid #FD834C;
              }
              .btn-danger:hover {
                background: #EF8F29;
                border: 1px solid #fff;
              }
              .btn-danger:active {
                background: #FD834C;
                color: #fff;
              }
              .btn-danger:visited {
                background: #FD834C;
                color: #fff;
              }
            </style>
            <div class="col-lg-4">
              <div class="card mb-3 mb-lg-3">
                <div class="card-body">
                  <h5 class="card-title text-muted text-uppercase text-center" style="font-size: .9em; font-family: Arial;"><?php echo $datasheet_titulo; ?></h5>
                  <hr>
                  <div class="text-center">
                    <a href="assets/pdf/<?php echo $datasheet_arquivo; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Clique Aqui</a>
                  </div>
                </div>
              </div>
            </div>
          
          <?php }
            } else {
          ?>
            <div class="col-xs-12">
              <div class="alert alert-warning">
                  <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Não existem datasheets para esta marca...
                </div>
            </div>
          <?php } ?>
          </div>
                
        </div>
      </div>

    </section>

  </main>


  <?php include_once('footer2.php') ?>
