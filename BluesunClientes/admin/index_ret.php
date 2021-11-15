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
	<title>Login | Bluesun do Brasil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: linear-gradient(135deg, #FF6000 0, #FF8D00 25%, #FDC100 50%, #FF9400 75%, #FCB801 100%);">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="valida.php" autocomplete="off">
					<span class="login100-form-title p-b-26">
						<img src="../public/img/logo_bsum2.png" class="img-fluid" alt="Logo" width="250" height="auto">
					</span>
					<div class="wrap-input100 validate-input" data-validate = "E-mail válido é: a@b.c">
						<input class="input100" type="email" name="email" autocomplete="off">
						<span class="focus-input100" data-placeholder="E-mail"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Entre com a sua senha">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye" style="color: #ccc;"></i>
						</span>
						<input class="input100" type="password" name="senha" autocomplete="off">
						<span class="focus-input100" data-placeholder="Senha"></span>
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
	                }?>
					</p>
					<div class="alert alert-info" role="alert" style="font-size: 0.6em;margin-top: 2px;text-align: center">
					  Link enviado por e-mail, <b>recupere a sua senha!</b>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="btnsave" class="login100-form-btn"  style="background: linear-gradient(180deg, rgba(13,142,20,1) 0%, rgba(63,167,13,1) 35%, rgba(150,210,0,1) 100%);">
								<i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;&nbsp; Fazer Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115" style="padding-top: 2px;">
						<span class="txt1">
							Esqueceu a senha?
						</span>

						<a class="txt2" href="reset-senha.php">
							Clique aqui
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>