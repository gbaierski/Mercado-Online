<?php

require __DIR__."/../models/Usuario.php";

	

function criarUsuario(){

	session_start();

	$cpf = $_POST['cpf'];
	$login  = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
	$senha = $_POST['senha'];
	$confirma_senha = $_POST['confirma_senha'];



	$usuario = new Usuario();

	$verificacao = $usuario->verifica($cpf,$login,$senha,$confirma_senha);

	if ($verificacao == 'ok' ) {

		$usuario->criar($cpf,$login,$senha);

		$_SESSION['action'] = 'sucesso';
		$_SESSION['mensagem'] = 'Sua conta foi criada com sucesso!';

		header("location: ../views/home.php");

	}elseif ($verificacao == 'senha'){

		$_SESSION['action'] = 'senha';
		$_SESSION['mensagem'] = "Para a confirmação, as senhas devem ser iguais.";

		header("location: ../views/cadastro.php");


	}elseif ($verificacao == 'cpf') {

		$_SESSION['action'] = 'cpf';
		$_SESSION['mensagem'] = "O cpf que você está tentando cadastrar já está cadastrado.";

		header("location: ../views/cadastro.php");


	}elseif ($verificacao == 'login') {

		$_SESSION['action'] = 'login';
		$_SESSION['mensagem'] = "O login que você está tentando cadastrar já está cadastrado.";

		header("location: ../views/cadastro.php");

	}
	

	

 }

 function login(){

 	$login = $_POST['login'];
 	$senha = $_POST['senha'];

 	$usuario = new Usuario();

 	$usuarioLogin = $usuario->verificaLogin($login, $senha);

 	if ($usuarioLogin == 'existe') {
 		
 		$usuarioLogado = $usuario->retornaLogin($login);

 		session_start();
 		$_SESSION['id_usuario'] = $usuarioLogado['id_usuario'];
 		$_SESSION['cpf'] =  $usuarioLogado['cpf'];
 		$_SESSION['tipo_usuario'] = $usuarioLogado['tipo_usuario'];
 		$_SESSION['login'] = $login;
 		$_SESSION['senha'] = $senha;
 		
 		
 		header("location: ../views/home.php");
 	}else{
 		echo "A senha está incorreta ou o usuário não existe";
 	}

 	

 }


 function logout(){

 	session_start();	
 	session_destroy();
 	header("location: ../views/home.php");
 }



	
//gerenciador de rotas
if(isset($_GET['action']) and function_exists($_GET['action']) ){
        call_user_func($_GET['action']);
    }else{

    	header("location: ../views/home.php");


    }
?>