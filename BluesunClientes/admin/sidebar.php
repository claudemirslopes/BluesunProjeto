<div class="sidebar" data-background-color="white" data-active-color="danger">

<!--
	Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
	Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

	<div class="sidebar-wrapper" style="background: linear-gradient(to bottom, #FF9300 0%, #FF6100 100%);">
        <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ ?>
        <div class="logo" style="padding-bottom: 8px;">
            <a href="admin_bluesun.php" class="simple-text">
                <img src="../public/img/bsum_logo1a.png" style="width: 170px;height: auto;">
            </a>
        </div>
        <?php } elseif ($_SESSION['usuarioNiveisAcessoId'] == "2") { ?>
        <div class="logo" style="padding-bottom: 8px;">
            <a href="admin_franquiado.php" class="simple-text">
                <img src="../public/img/bsum_logo1a.png" style="width: 170px;height: auto;">
            </a>
        </div>
        <?php } elseif ($_SESSION['usuarioNiveisAcessoId'] == "3") { ?>
        <div class="logo" style="padding-bottom: 8px;">
            <a href="admin_integrador.php" class="simple-text">
                <img src="../public/img/bsum_logo1a.png" style="width: 170px;height: auto;">
            </a>
        </div>
        <?php } ?>

        <ul class="nav">
            <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ ?>
            <li>
                <a href="admin_bluesun.php">
                    <i class="fa fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <?php } elseif ($_SESSION['usuarioNiveisAcessoId'] == "2") { ?>
                <li>
                <a href="admin_franquiado.php">
                    <i class="fa fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <?php } elseif ($_SESSION['usuarioNiveisAcessoId'] == "3") { ?>
                <li>
                <a href="admin_integrador.php">
                    <i class="fa fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <?php } ?>
            
            <li>
                <a href="contato_mapa.php">
                    <i class="fa fa-map-marker"></i>
                    <p>Contato</p>
                </a>
            </li>
            <li>
                <a href="sobrefran.php">
                    <i class="fa fa-building"></i>
                    <p>Sobre a Empresa</p>
                </a>
            </li>

            <?php if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2"): ?>
            <li>
                <a href="depoimentos.php">
                    <i class="fa fa-comments"></i>
                    <p>Depoimentos</p>
                </a>
            </li>
            <?php endif; ?>
            
            <li>
                <a href="obras_imagens.php">
                    <i class="fa fa-camera-retro"></i>
                    <p>Imagens</p>
                </a>
            </li>
             <?php if($_SESSION['usuarioNiveisAcessoId'] == "1" || $_SESSION['usuarioNiveisAcessoId'] == "2"): ?>
            <li>
                <a href="equipe.php">
                    <i class="fa fa-user-circle"></i>
                    <p>Equipe</p>
                </a>
            </li>

            <?php endif; ?>


            <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"): ?>
            <li>
                <a href="sobreblue.php">
                    <i class="fa fa-sun-o"></i>
                    <p>Sobre a Bluesun</p>
                </a>
            </li>
            <li>
                <a href="slides.php">
                    <i class="fa fa-picture-o"></i>
                    <p>Slides</p>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class="fa fa-users"></i>
                    <p>Usuários</p>
                </a>
            </li>
            <?php endif; ?>

            </li>
			<li class="active-pro active">
                <a href="perfil.php">
                    <i class="fa fa-user" style="color: #333;"></i>
                    <p style="color: #333;">Meu Perfil</p>
                </a>
            </li>
        </ul>
	</div>
</div>