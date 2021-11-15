<?php
session_start();
ob_start();

$btnRecuperarSenha = filter_input(INPUT_POST, 'btnRecuperarSenha', FILTER_SANITIZE_STRING);

//Verificar se vem dados do botão
if ($btnRecuperarSenha) {
    //Receber os dados co campor email e limpar
    $email_rc = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email_st = strip_tags($email_rc);
    $email = trim($email_st);
    //Verificar se a variável email possui valor
    if ($email != "") {
        //Incluir o validar e-mail e validar o mesmo
        $seguranca = true;
        include_once("lib/lib_valida.php");
        if (validarEmail($email)) {
            //Incluir a conexao BD, pesquisar o usuário
            include_once("config/conexao.php");
            $result_usuario = "SELECT id, nome, email FROM usuarios WHERE email='$email' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if (($resultado_usuario) AND ( $resultado_usuario->num_rows != 0)) {
                //$_SESSION['msg'] = "<div class='alert alert-success'>Usuário encontrado com esse e-mail!</div>";
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                //Criar a chave recuperar a senha e salvar no BD
                $recuperar_senha = md5($row_usuario['id'] . $row_usuario['email'] . date("Y-m-d H:i:s"));
                //echo $recuperar_senha;
                $result_up_usuario = "UPDATE usuarios SET
                        recuperar_senha='$recuperar_senha',
                        datamod=NOW()
                        WHERE id='" . $row_usuario['id'] . "'";
                $resultado_up_usuario = mysqli_query($conn, $result_up_usuario);
                
                //Criar e enviar o e-mail para o usuário recuperar senha
                $assunto = "Recuperar senha";
                $nome_destino = current(str_word_count($row_usuario['nome'], 2));
                include_once('config/config.php');
                $url = pg . "/atualizar_senha.php?chave=" . $recuperar_senha;

                $mensagem = "Olá <b>" . $nome_destino . "</b><br><br>";
                $mensagem .= "Você solicitou uma alteração de senha em Bluesun do Brasil.<br>";
                $mensagem .= "Seguindo o link abaixo você poderá alterar sua senha.<br>";
                $mensagem .= "Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço abaixo no seu navegador.<br><br>";
                $mensagem .= $url . "<br><br>";
                $mensagem .= "<b>Usuário:</b> {$row_usuario['nome']}<br><br>";
                $mensagem .= "Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                $mensagem .= "<b>Mensagem automática:</b> Não responder esta mensagem<br><br>";
                $mensagem .= "Respeitosamente,<br><br>";
                $mensagem .= "Webmaster - Bluesun do Brasil<br>";
                $mensagem_texo = $mensagem;

                include_once("lib/lib_email_phpmailer.php");
                if (email_phpmailer($assunto, $mensagem, $mensagem_texo, $nome_destino, $row_usuario['email'])) {
                    $_SESSION['msg_rec'] = "<div class='alert alert-success'>Enviado no seu e-mail o link para recuperar a senha!</div>";
                    $url_destino = pg . "/index_ret.php";
                    header("Location: $url_destino");
                }else{

                    $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao enviar o e-mail - Necessário inserir o servidor, o e-mail de origem ... na página 'lib/lib_email_phpmailer.php'!</div>";
                }
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Nenhum usuário encontrado com esse e-mail!</div>";
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>E-mail inválido!</div>";
        }
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>O campo e-mail deve ser preechido!</div>";
    }
}
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
	<style type="text/css">
		.aviso {
			margin-bottom: 20px;
		}
		.aviso p {
			font-size: 0.7em;
			color: #ccc;
			text-align: center;
		}
		.aviso h3 {
			font-size: 0.8em;
			color: #ccc;
			font-weight: bold;
			text-align: center;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: linear-gradient(135deg, #FF6000 0, #FF8D00 25%, #FDC100 50%, #FF9400 75%, #FCB801 100%);">
			<div class="wrap-login100">
				<form method="post" action="" class="login100-form validate-form" autocomplete="off">
					<span class="login100-form-title p-b-26">
						<img src="../public/img/logo_bsum2.png" class="img-fluid" alt="Logo" width="250" height="auto">
					</span>
					<div class="aviso">
						<h3>Esqueceu sua senha?</h3>
						<p>Digite seu endereço de e-mail lhe enviaremos instruções sobre como redefinir sua senha.</p>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" name="email" autocomplete="off">
						<span class="focus-input100" data-placeholder="E-mail"></span>
					</div>
					<?php

                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    if (isset($_SESSION['msg_rec'])) {
                        echo $_SESSION['msg_rec'];
                        unset($_SESSION['msg_rec']);
                    }
                    ?>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input type="submit" name="btnRecuperarSenha" value="RECUPERAR SENHA" class="login100-form-btn btn btn-danger" style="background: linear-gradient(180deg, rgba(13,142,20,1) 0%, rgba(63,167,13,1) 35%, rgba(150,210,0,1) 100%);border: none;">
						</div>
					</div>

					<div class="text-center p-t-115" style="padding-top: 2px;">
						<span class="txt1">
							Acessar a página de login
						</span>

						<a class="txt2" href="index.php">
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