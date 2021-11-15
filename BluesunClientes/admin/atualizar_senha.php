<?php
session_start();
ob_start();
$seguranca = true;

//Incluir a conexao BD

include_once("config/conexao.php");
include_once("config/config.php");


$btnAtualizarSenha = filter_input(INPUT_POST, 'btnAtualizarSenha', FILTER_SANITIZE_STRING);
$chave_rc = filter_input(INPUT_GET, 'chave', FILTER_SANITIZE_STRING);

//Verificar se vem dados do botao
if ($btnAtualizarSenha) {

    //Receber os dodos do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $_SESSION['dados'] = $dados;

    include_once("lib/lib_valida.php");
    $dados_validos = vazio($dados);
    if($dados_validos){

        //validar o tamanho da senha
        if((strlen($dados_validos['senha'])) < 6){

            $_SESSION['msg'] = "<div class='alert alert-danger'>A senha deve ter no mínimo 6 caracteres!</div>";

        }elseif (stristr($dados_validos['senha'], "'")) {

            $_SESSION['msg'] = "<div class='alert alert-danger'>Caracter ( ' ) utilizado na senha é inválido!</div>";

        }else{

            //Inserir a nova senha no banco de dados

            //Criptografar a senha

            $dados_validos['senha'] = md5($dados_validos['senha']);



            $result_usuario = "UPDATE usuarios SET

                    senha='".$dados_validos['senha']."',

                    recuperar_senha=NULL,

                    datamod=NOW()

                    WHERE id='".$dados_validos['id']."'";

            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if(mysqli_affected_rows($conn)){

                unset($_SESSION['dados']);

                $_SESSION['msg_rec'] = "<div class='alert alert-success'>Senha alterada com sucesso!</div>";

                $url_destino = pg . "/index.php";

                header("Location: $url_destino");

            }else{

                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao alterar a senha!</div>";

            }

        }

    }else{

        $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário digitar a nova senha!</div>";

    }



} elseif ($chave_rc) {

    //Limpar a chave

    $chave_st = strip_tags($chave_rc);

    $chave = trim($chave_st);

    //Pesquisar o usuario

    $result_usuario = "SELECT id FROM usuarios WHERE recuperar_senha='$chave' LIMIT 1";

    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (($resultado_usuario) AND ( $resultado_usuario->num_rows != 0)) {

        $row_usuario = mysqli_fetch_assoc($resultado_usuario);

        //echo $row_usuario['id'];

    } else {

        $_SESSION['msg_rec'] = "<div class='alert alert-danger'>Link inválido - tente recuperar novamente a senha!</div>";

        $url_destino = pg . "/reset-senha.php";

        header("Location: $url_destino");

    }

} else {

    $_SESSION['msg_rec'] = "<div class='alert alert-danger'>Link inválido - tente recuperar novamente a senha!</div>";

    $url_destino = pg . "/reset-senha.php";

    header("Location: $url_destino");

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
						<h3>Digite a sua senha</h3>
						<p>Escolha uma senha de seu gosto com no mínimo 6 caracteres.</p>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye" style="color: #ccc;"></i>
						</span>
						<input class="input100" type="password" name="senha" autocomplete="off">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>
					<?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <input type="hidden" name="id" value="<?php
                        if(isset($row_usuario['id'])){
                            echo $row_usuario['id'];
                        }elseif(isset($_SESSION['dados']['id'])){
                            echo $_SESSION['dados']['id'];
                        }
                    ?>">
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input type="submit" name="btnAtualizarSenha" value="RECUPERAR SENHA" class="login100-form-btn btn btn-danger" style="background: linear-gradient(180deg, rgba(13,142,20,1) 0%, rgba(63,167,13,1) 35%, rgba(150,210,0,1) 100%);border: 1px solid #043C93;">
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