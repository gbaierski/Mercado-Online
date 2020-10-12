<?php include('header.php'); ?>


<?php

                
                  
                  if (@$_SESSION['action'] == 'sucesso' || @$_SESSION['action'] == 'foto') {

                    
?>


                        <script type="text/javascript">
  
                         setTimeout(function(){ alert("<?=$_SESSION['mensagem']?>"); }, 300);
                        
                        </script>
                                     
<?php

                    $_SESSION['action'] = 'none';
                  }


?>



<div class="background_cadastro_produtos"></div>

<div class="clear"></div>

<?php

	include('footer.php');

?>

<div class="div-cadastro">
	
	

	<form enctype="multipart/form-data" class="form-cadastro" method="POST" action="../controllers/produto.php?action=criarProduto">

		<div class="titulo-cadastro" id="titulo-cadastro-prod"> Cadastro de produto:</div>

		<label for="nome_produto" class="label-cadastro" maxlength="20">Nome do produto:</label>
		<input type="text" name="nome_produto" class="input-cadastro" required>

		<label for="marca" class="label-cadastro" maxlength="30">Marca:</label>
		<input type="text" name="marca" class="input-cadastro" required>

		<label for="preco" class="label-cadastro">Preço:</label>
		<input type="number" min="1" max="100"  step=any name="preco" class="input-cadastro" required>

    	<label for="data_val" class="label-cadastro">Data de validade:</label>
    	<input type="date" name="data_val" class="input-cadastro" required>

    	<label class="label-cadastro"  for="foto_produto">Foto do produto:</label>
    	<input type="file" id="foto_produto" name="foto_produto" placeholder=""  class="foto_produto">

		<input type="submit" name="enviar" id="botao-cadastro">
	</form>
</div>






