<?php 


include('header.php'); 

	

    	if (@$_SESSION['tipo_usuario'] == 'comum' || @$_SESSION['tipo_usuario'] == 'admin') {

    		

?>

	<div class="background_produtos_logado">
		<div class="fundo-produtos">
			<div class="titulo-produtos"> Produtos:</div>
			<form method="POST" action="../controllers/produto.php?action=filtrarProdutos" class="form-search">

				<input type="text" class="search" placeholder="Pesquisar.." name="pesquisa">
				<input type="range" min="1" max="100" value="100" class="slider" id="slider" name="preco">
				<input type="submit" class= "search-button" name="pesquisar" value="filtrar">


			</form>

			<div id="valor-slider" class="valor-slider"></div>

		</div>
	</div>
	
<?php

	require __DIR__."/../models/Produto.php";

	

		$produto = new Produto();
		$lista_produtos = $produto->listar();










	if (@$_SESSION['filtro'] == 'sim') {
		$_SESSION['filtro'] = 'nao';
		foreach ($lista_produtos as $produto){
			foreach (@$_SESSION['produtos_filtrados'] as $produto_filtrado) {
				
			
			if ($produto['id_produto'] == $produto_filtrado['id_produto']) {
			
			$foto = $produto['foto'];
			
		
		
	
?>




	<div class="produto">
		<div class="arquivo-produto" style='background-image: url("../../assets/imagens/produtos/<?=$foto?>.jpg")'></div>

		<div class="info-produto">

			<div class="nome-produto"><?=$produto['nome']?></div>
			<div class="marca-produto"><?=$produto['marca']?></div>

			<div class="clear"></div>

			<div class="preco-produto">R$:<?=$produto['preco']?></div>

			<div class="clear"></div>

			<div class="dt-val">VAL:<?=$produto['data_val']?></div>
		</div>
	</div>

<?php
				}
		    }
		}



	}else{

	

	$lista_produtos = $produto->refreshLista();
	foreach ($lista_produtos as $produto){

		$foto = $produto['foto'];

		
?>




	<div class="produto">
		<div class="arquivo-produto" style='background-image: url("../../assets/imagens/produtos/<?=$foto?>.jpg")'></div>

		<div class="info-produto">

			<div class="nome-produto"><?=$produto['nome']?></div>
			<div class="marca-produto"><?=$produto['marca']?></div>

			<div class="clear"></div>

			<div class="preco-produto">R$:<?=$produto['preco']?></div>

			<div class="clear"></div>

			<div class="dt-val">VAL:<?=$produto['data_val']?></div>
		</div>
	</div>

<?php



		}


	}















	}else{

?>


	<div class="mensagem_produtos">
		<div class="mensagem_texto"> Você precisa estar logado para visualizar esta página!</div>
		<div class="clear"></div>
		<a href="cadastro.php" class="produtos_mensagem_cadastro">Não possui uma conta? Cadastre-se aqui!</a>
	</div>
<div class="background_produtos"></div>


<?php

	}


	
?>

<div class="clear"></div>

<script type="text/javascript">
	
var slider = document.getElementById("slider");
var output = document.getElementById("valor-slider");
output.innerHTML = "Menor que:  R$  " + slider.value + ",00"; 

slider.oninput = function() {
  output.innerHTML = "Menor que:  R$  " + this.value + ",00";
}
</script>

<?php

	

	include('footer.php');

?>
	






