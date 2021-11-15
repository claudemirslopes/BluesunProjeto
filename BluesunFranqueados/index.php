<?php
  require_once 'conn/dbconfig.php';
  require_once 'conn/conexion.php';
  include_once("conn/conexao.php");
?>

<?php include_once('header.php') ?>
  
  <?php
  require_once 'cabecalho.php';
  ?>

    <!--==========================
      Seção Nossas Marcas
    ============================-->

    <section id="franquia" class="section-with-bg wow fadeInUp" style="background-color: #fff;">
      <div class="container">

        <div class="section-header">
          <h2 style="font-size: 3.0em;letter-spacing: -0.06em;color: #61AB45;text-transform: capitalize;font-family: 'Source Sans Pro', sans-serif;font-weight: 900;">Franqueados</h2>
          <p style="font-size: 1.2em;color: #333;">Selecione o estado para pesquisar</p>
        </div>
       
        <div class="row" style="margin-top: -25px;">
          <div class="col-lg-12">
            <div class="externa">
              <form method="GET" action="pesquisa.php#franquia">
                <div class="form-group col-md-12">
                    <select name="uf" class="form-control" id="exampleFormControlSelect1" onchange="this.form.submit()">
                      <option disabled="" selected="">Selecione o Estado</option>
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
              </form>
            </div>
        </div>

      </div>
    </section>
    
    <section class="section-with-bg wow fadeInUp" style="background-color: #fff; margin: 80px;margin-top: -25px;">
      <hr/>
      <h2 style="font-size: 1.5em;letter-spacing: -0.06em;color: #333;text-transform: capitalize;font-family: 'Source Sans Pro', sans-serif;font-weight: 900;">Total de Franqueados por Estados</h2>
      <hr/>
      <div class="row">
        <?php         
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'AC'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=AC#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/acre.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">AC</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'AL'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=AL#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/alagoas.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">AL</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueados(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'AP'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=AP#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/amapa.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">AP</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueados(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'AM'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=AM#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/amazonas.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">AM</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'BA'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=BA#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/bahia.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">BA</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'CE'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=CE#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/ceara.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">CE</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'DF'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=DF#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/dfederal.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">DF</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'ES'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=ES#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/espiritosanto.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">ES</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'GO'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=GO#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/goias.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">GO</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'MA'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=MA#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/maranhao.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">MA</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'MT'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=MT#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/matogrosso.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">MT</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'MS'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=MS#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/matogrossosul.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">MS</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'MG'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=MG#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/minasgerais.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">MG</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'PA'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=PA#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/para.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">PA</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'PB'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=PB#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/paraiba.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">PB</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'PR'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=PR#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/parana.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">PR</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'PE'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=PE#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/pernambuco.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">PE</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'PI'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=PI#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/piaui.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">PI</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'RJ'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=RJ#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/riojaneiro.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">RJ</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'RN'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=RN#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/rgnorte.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">RN</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'RS'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=RS#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/rgsul.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">RS</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'RO'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=RO#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/rondonia.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">RO</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'RR'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=RR#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/roraima.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">RR</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'SC'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=SC#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/santacatarina.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">SC</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'SP'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=SP#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/saopaulo.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">SP</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'SE'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=SE#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/sergipe.png" width="25px;" class="img-responsive">
                <h5 class="card-title" style="font-size: .8em;">SE</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados WHERE uf = 'TO'");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-1 externa">
          <div class="externa">
            <a href="pesquisa.php?uf=TO#franquia" style="color: #373737;"><div class="card text-center cont1 imagem3">
              <div class="card-body">
                <img src="img/bandeiras/tocantins.png" width="25px;" class="img-responsive">
                <h5 class="card-title h5titulo" style="font-size: .8em;">TO</h5>
                <p class="card-text text-center" style="font-weight: bolder;"><?php echo $row['contador']; ?><br>
                  <span style="font-weight: normal;font-size: .7em;">franqueado(s)</span>
                </p>
              </div>
            </div></a>
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
          $stmt = $DB_con->prepare("SELECT count(id_franqueado) as contador FROM bs_franqueados");
          $stmt->execute();
          if($stmt->rowCount() > 0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
        ?>
        <div class="col-md-9" style="margin-top: 10px;">
          <div class="card text-center">
            <div class="card-header" style="font-size: 1.2em;font-weight: bolder;background: #333;color: #fff;vertical-align: middle;">
              <img src="img/bandeiras/brasil.png" width="25px;" class="img-responsive">&nbsp;Brasil
            </div>
            <div class="card-footer text-muted cont2" style="background: #fdfdfd;">
              <a href="#" class="btn btn-danger"><big><?php echo $row['contador']; ?></big>&nbsp;franqueados</a>
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
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14735.171647870413!2d-47.3889789!3d-22.5868474!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5e3bb253839645dd!2sBlueSun%20do%20Brasil!5e0!3m2!1spt-BR!2sbr!4v1617818257338!5m2!1spt-BR!2sbr" width="100%" height="500"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section><!-- #contact -->

  </main>

  <?php include_once('footer.php') ?>



 
