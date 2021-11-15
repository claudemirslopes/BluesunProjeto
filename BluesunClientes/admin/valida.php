<?php
	session_start();
	include_once("conexao/conexao.php");
	//Verifica se os campos possuem dados 
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
		
		$result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrando um usuário na tabela usuario com os mesmos dados digitado pelo usuario
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['id'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['id_nivacesso'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: admin_bluesun.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
				header("Location: admin_franquiado.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){
				header("Location: admin_integrador.php");
			}else{
				$_SESSION['loginErro'] = "Erro - Entre em contato com administrador";
				header("Location: index.php");
			}
		}else{
			$_SESSION['loginErro'] = "Usuário ou senha inválido";
			header("Location: index.php");
		}
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: index.php");
	}
?>