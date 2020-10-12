<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">



    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css"/>
    <link rel="shortcut icon" href="../../assets/imagens/icon_mercado.ico" />


	
    </head>

    <?php

    session_start();

    

    ?>

    <body>

        <header class="header" style="position: fixed;">

        	<nav class="nav-bar">

	        	<div class="titulo">Mercado Online</div>

	        	
	        		<div class="itens-menu">
	        			<a href="home.php">
	        				Home
	        			</a>
	        			<a href="produtos.php">
	        				Produtos
	        			</a>
	        			
<?php

if (isset($_SESSION)) {
    	if (@$_SESSION['tipo_usuario'] == 'comum') {
    		
    	




?>

						
						<form method="POST" action="../controllers/usuario.php?action=logout" id="form-logout">

	        				<input type="submit" name="logout" id="botao-logout" value="Logout"></input>
	        				
	        			</form>

<?php

		}elseif (@$_SESSION['tipo_usuario'] == 'admin') {
			
		

?>
						<a href="cadastro_produto.php">
	        				Cadastrar Produtos
	        			</a>
						
	        			<form method="POST" action="../controllers/usuario.php?action=logout"  id="form-logout">

	        				<input type="submit" name="logout" id="botao-logout" value="Logout"></input>

	        			</form>
						


<?php


		}else{


		

?>

	        			<a href="cadastro.php" class="cadastro_menu">
	        				Cadastro
	        			</a>
	        		</div>


	        		<button id="botao-login">Login</button>


<?php
			}
		}else{

?>

						<a href="cadastro.php">
	        				Cadastro
	        			</a>
	        		</div>


	        		<button id="botao-login">Login</button>

<?php



 }

?>


        	</nav>


        	<!-- Modal de login -->
								<div id="modal-login" class="modal">

								  <!--Conteúdo do modal login -->
								  	<div class="modal-conteudo">

								    	<div class="modal-form">

											<p class="titulo-modal">Faça Login</p>

											<form method="POST" action="../controllers/usuario.php?action=login">
												
												<input type="text" class="login-input" placeholder="Login" name="login" maxlength="20">
												<br/>
												
												<input type="password" class="login-input" placeholder="Senha" name="senha" maxlength="20">
												<br/>
												
												<input type="submit" class="login-submit" name="enviar">
												<br />



												<a href="cadastro.php" class="ajuda-modal">Ainda não possui uma conta? Cadastre-se aqui!</a>

												


											</form>
											
											<span class="fechar"></span>
								    	</div>


								  	</div>

								</div>


<!-- Javascript-->

								<script type="text/javascript">
								// seleciona o modal
								var modal = document.getElementById("modal-login");

								// seleciona o botão que abre o modal
								var btn = document.getElementById("botao-login");

								// seleciona o elemento <span> que fecha o modal
								var span = document.getElementsByClassName("fechar")[0];

								// quando o usuário clicar no botão, abre o modal 
								btn.onclick = function() {
								  modal.style.display = "block";
								}

								// quando o usuário clicar em <span> (x), fecha o modal
								// não utilizada por enquanto
								span.onclick = function() {
								  modal.style.display = "none";
								}

								// quando o usuário clicar em qualquer lugar fora da tela, fecha-o
								window.onclick = function(event) {
								  if (event.target == modal) {
									modal.style.display = "none";
								  }
								}

								</script>
        </header>