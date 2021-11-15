<!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #FF5F00">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3">
                <center><img src="img/logobordabranca.png" class="img-fluid" alt="" class="responsive" style="width: 150%;"></center>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-fw fa-home" style="color: #fff"></i>
                    <span style="color: #fff">Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"): ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="contato.php?edit_id=1">
                    <i class="fa fa-fw fa-address-book" style="color: #fff"></i>
                    <span style="color: #fff">Contato</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="slides.php?edit_id=1">
                    <i class="fa fa-fw fa-file-image-o" style="color: #fff"></i>
                    <span style="color: #fff">Slides</span>
                </a>
            </li>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="historia.php?edit_id=1">
                    <i class="fas fa-fw fa-history" style="color: #fff"></i>
                    <span style="color: #fff">Nossa História</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="fundadores.php">
                    <i class="fas fa-fw fa-street-view" style="color: #fff"></i>
                    <span style="color: #fff">Fundadores</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="divisoes.php">
                    <i class="fas fa-fw fa-cog" style="color: #fff"></i>
                    <span style="color: #fff">Divisões Bluesun</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="album.php">
                    <i class="fas fa-fw fa-camera" aria-hidden="true" style="color: #fff"></i>
                    <span style="color: #fff">Galeria de Fotos</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="redessociais.php?edit_id=1">
                    <i class="fa fa-fw fa-facebook-official" style="color: #fff"></i>
                    <span style="color: #fff">Redes Sociais</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="marcas.php">
                    <i class="fas fa-fw fa-copyright" style="color: #fff"></i>
                    <span style="color: #fff">Marcas</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="datasheets.php">
                    <i class="fas fa-fw fa-folder" style="color: #fff"></i>
                    <span style="color: #fff">Datasheets</span>
                </a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="franqueados.php">
                    <i class="fas fa-fw fa-users" style="color: #fff"></i>
                    <span style="color: #fff">Franqueados</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"): ?>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">
                    <i class="fas fa-fw fa-user-plus" style="color: #fff"></i>
                    <span style="color: #fff">Usuários</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <?php endif; ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- End of Sidebar -->