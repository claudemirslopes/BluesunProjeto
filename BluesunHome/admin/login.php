<?php
session_start();
ob_start();
$seguranca = true;
include_once 'config/conexao.php';
include_once 'config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   
   <title>Bluesun - Login</title>

   <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body style="background-color: #F36B2B;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/logo.png" style="width: 50%;">
                                        <br>
                                        <h1 class="h4 text-gray-900 mb-4">Bem Vindo!</h1>
                                    </div>
                                    <form method="POST" action="valida.php" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="senha" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Senha">
                                        </div>
                                        <p style="font-size: 0.6em;text-align: center;"><?php
                                        if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                            unset($_SESSION['msg']);
                                        }if (isset($_SESSION['msg_rec'])) {
                                            echo $_SESSION['msg_rec'];
                                            unset($_SESSION['msg_rec']);
                                        }
                                        ?></p>
                                        <p class="text-center text-danger" style="font-weight: bold;">
                                        <?php if(isset($_SESSION['loginErro'])){
                                          echo $_SESSION['loginErro'];
                                          unset ($_SESSION['loginErro']);
                                        }?>
                                        </p>
                                        <p class="text-center text-success" style="font-weight: bold;">
                                        <?php if(isset($_SESSION['loginDeslogado'])){
                                          echo $_SESSION['loginDeslogado'];
                                          unset ($_SESSION['loginDeslogado']);
                                        }?></p>
                                        <button name="btnsave" class="btn btn-outline-success btn-user btn-block">Fazer Login</a>
                                        
                                    </form>
                                    
                                    </div>
                            </div>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>