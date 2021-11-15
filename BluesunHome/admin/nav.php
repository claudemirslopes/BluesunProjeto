<!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #6E6E6E; border-bottom: solid 3px #FF5F00;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                                     
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" style="color: #FD834C;">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                                              

                        <!-- Nav Item - User Information -->
                        <?php
                            $stmt = $DB_con->prepare("SELECT id as IDD, userPic as IMGG FROM usuarios WHERE id = {$_SESSION['usuarioId']}");
                            $stmt->execute();
                            if($stmt->rowCount() > 0) {
                              while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                                extract($row);
                          ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="nome-usuarios" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small" style="color: #fff;"><?php echo $_SESSION['usuarioNome']; ?></span>
                                <img class="img-profile rounded-circle" src="../img/usuarios/<?php echo $row['IMGG']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="nome-usuarios">
                            <a class="dropdown-item" href="perfil.php?edit_id=<?php echo $_SESSION['usuarioId']; ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2" style="color: #FF5F00;"></i>Perfil</a>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sair.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color: #FF5F00;"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                        <?php  }
                              } else {
                                ?>
                              <div class="col-xs-12">
                                <div class="alert alert-warning">
                                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Não existem dados para mostrar ...
                                  </div>
                              </div>
                          <?php } ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->