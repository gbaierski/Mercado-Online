<?php

//importa a conexão
require __DIR__.'/../connection/Connection.php';

class Usuario{
	
	public $conexao;
	
	public $cpf;
	public $login;
	public $senha;

	


	public function __construct(){
		
		//constrói a conexão com o banco
		$this->conexao = new Connection();
		$this->conexao = $this->conexao->getConnection();
	}
	

	function criar($cpf, $login, $senha){


		//cria a consulta que insere os dados no banco
		$sql = "INSERT INTO usuarios (id_usuario,cpf,tipo_usuario, login, senha) VALUES ('','$cpf','comum','$login','$senha')";


		$this->conexao->exec($sql);

		return 'sucesso';
	}

	function verifica($cpf,$login,$senha,$confirma_senha){

		//verifica se as senhas são iguais
		if ($senha == $confirma_senha) {

			//seleciona o cpf e o login dos usuarios no banco
			$sql = "SELECT cpf , login FROM usuarios";

			$result = $this->conexao->query($sql);
		
			//define um contador para depois verificar qual dos 2 já existe
			$count_cpf = 0;
			$count_login = 0;

			//percorre a lista dos usuarios do banco
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {

		 	
				//verifica se o cpf e o login do parâmetro são iguais aos do banco
		 		if ($cpf == $row['cpf']) {

		 			$count_cpf = 1;
		 		
		 		}elseif ($login == $row['login']){

		 			$count_login = 1;
		 		
		 		}
 			}

 			//faz a verificação do contador e retorna o valor correspondente
			if ($count_cpf > 0 ) {
		 		
		 		return "cpf";
		 	
		 	}elseif($count_login > 0){

		 		return "login";
		 		
			}else{

		 		return "ok";
			}
		
		//retorna a informação que a senha está incorreta
		}else{

			return "senha";
		}

				
  	}


  	function verificaLogin($login, $senha){

  		$sql = "SELECT login, senha FROM usuarios";
  		$result = $this->conexao->query($sql);

  		$existe = 0;

  		while($row = $result->fetch(PDO::FETCH_ASSOC)) {

		 		if ($login == $row['login'] && $senha == $row['senha']) {

		 			$existe = 1;
		 	
		 		}
 		}

 		if ($existe == 1) {

 			return "existe";
 			
 		}else{

 			return "nao_existe";
 		}
  		
  		
  	}


  	function retornaLogin($login){

  		$sql = "SELECT * FROM usuarios WHERE login = '$login'";
  		$result = $this->conexao->query($sql);
  		$row = $result->fetch(PDO::FETCH_ASSOC);

  		$usuario['id_usuario'] = $row['id_usuario'];
  		$usuario['cpf'] = $row['cpf'];
  		$usuario['tipo_usuario'] = $row['tipo_usuario'];
  		$usuario['login'] = $row['login'];
  		$usuario['senha'] = $row['senha'];

  		return $usuario;

  	}
		
}



?>
