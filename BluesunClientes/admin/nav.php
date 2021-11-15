<nav class="navbar navbar-default" style="background-color: #272C33;border-bottom: 3px solid #279B0F;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>

            <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){ ?>
            <a class="navbar-brand" href="admin_bluesun.php">Painel Administrativo</a>
            <?php } elseif ($_SESSION['usuarioNiveisAcessoId'] == "2") { ?>
            <a class="navbar-brand" href="admin_franquiado.php">Painel do Franqueado</a>
            <?php } elseif ($_SESSION['usuarioNiveisAcessoId'] == "3") { ?>
            <a class="navbar-brand" href="admin_integrador.php">Painel do Integrador</a>
            <?php } ?>

        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="perfil.php">
                        <i class="fa fa-user-circle-o"></i>
                        <p><?php echo $_SESSION['usuarioNome']; ?></p>
                    </a>
                </li>
                <!--<li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-panel"></i>
						<p>Estatísticas</p>
                    </a>
                </li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-bell"></i>
                            <p class="notification">2</p>
							<p>Notificações</p>
							<b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Mensagem 1</a></li>
                        <li><a href="#">Mensagem 2</a></li>
                      </ul>
                </li>-->
				<li>
                    <a href="sair.php">
						<i class="fa fa-power-off"></i>
						<p>Sair</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>