<?php

//importa a conexão
require __DIR__.'/../connection/Connection.php';

/**
 * 
 */
class Produto{
	
	public $conexao;
	
	public $nome;
	public $marca;
	public $preco;
	public $data_val;


	function __construct(){

		$this->conexao = new Connection();
		$this->conexao = $this->conexao->getConnection();

	}


	function criar($nome, $marca, $preco, $data_val, $file){

		

		$foto_nome = $nome;

		

		$target_dir = "../../assets/imagens/produtos/";
		$target_file = $target_dir . basename($file["foto_produto"]["name"]);


		if (move_uploaded_file($file["foto_produto"]["tmp_name"], $target_file)) {

	        $nome_antigo = $target_dir.basename($file["foto_produto"]["name"]);
	        $nome_novo = $target_dir.$foto_nome.$marca.'.jpg';

	        rename($nome_antigo, $nome_novo);



	    	} else {
	        	echo "Sorry, there was an error uploading your file.";
	    	}

	    $nome_bd = $foto_nome.$marca;
	    //cria a consulta que insere os dados no banco
		$sql = "INSERT INTO produtos (id_produto, nome, preco, marca,  data_val, foto) VALUES ('','$nome','$preco', '$marca','$data_val', '$nome_bd')";


		$this->conexao->exec($sql);

		

	}

	function listar(){

		$sql = "SELECT * FROM produtos";
		$result = $this->conexao->query($sql);

		$array_produtos = [];

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {

			$array_produtos[] = $row;
		}
		
		return $array_produtos;
	}

	function refreshLista(){
		
		$sql = "SELECT * FROM produtos";
		$result = $this->conexao->query($sql);

		$array_produtos = [];

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {

			$array_produtos[] = $row;
		}
		
		return $array_produtos;
	}

	function filtrar($texto,$preco){

		
		if ($texto != '') {
			$sql = "SELECT `id_produto` FROM `produtos` WHERE `nome` LIKE '%$texto%' OR `marca` LIKE '%$texto%' AND `preco` <= '$preco';";
		}else{
			$sql = "SELECT `id_produto` FROM `produtos` WHERE `preco` <= '$preco';";
		}
		
		$result = $this->conexao->query($sql);

  		while($row = $result->fetch(PDO::FETCH_ASSOC)) {

			$array_produtos[] = $row;
		}

  		$_SESSION['filtro'] = 'sim';

  		return $array_produtos;
	}
}

?>