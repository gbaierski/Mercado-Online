<?php

require __DIR__."/../models/Produto.php";


function criarProduto(){

	$nome = $_POST['nome_produto'];
	$marca = $_POST['marca'];
	$preco = $_POST['preco'];
	$data_val = $_POST['data_val'];


	

	if (is_null($_FILES) or (pathinfo($_FILES['foto_produto']['name'], PATHINFO_EXTENSION) == 'jpg'))  {

		$produto = new Produto();

		$produto->criar($nome, $marca, $preco, $data_val, $_FILES);

		session_start();
		
		$_SESSION['action'] = 'sucesso';
		$_SESSION['mensagem'] = 'O produto foi cadastrado com sucesso!';

		

		header("location: ../views/cadastro_produto.php");

	}else{
		
		session_start();

		$_SESSION['action'] = 'foto';
		$_SESSION['mensagem'] = 'Você enviou um arquivo com o formato errado. (permitido: jpg)';

		
		header("location: ../views/cadastro_produto.php");

	}

}

function filtrarProdutos(){

	session_start();

	$texto_filtro = $_POST['pesquisa'];
	$preco_filtro = $_POST['preco'];

	$pesquisa = new Produto();

	$produtos_filtrados = $pesquisa->filtrar($texto_filtro,$preco_filtro); 

	$_SESSION['produtos_filtrados'] = $produtos_filtrados;

	header("location: ../views/produtos.php");
}




//gerenciador de rotas
if(isset($_GET['action']) and function_exists($_GET['action']) ){
        call_user_func($_GET['action']);
    }else{

    	header("location: ../views/home.php");


    }
?>