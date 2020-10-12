<?php include('header.php'); ?>


<div class="background_cadastro"></div>

<div class="clear"></div>

<?php

  include('footer.php');

?>

	

	<form class="form-cadastro" method="POST" action="../controllers/usuario.php?action=criarUsuario">

	  <div class="titulo-cadastro"> Cadastre-se:</div>
		<label for="cpf" class="label-cadastro">CPF:</label>
		<input type="text" name="cpf" class="input-cadastro" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" required>

		<label for="login" class="label-cadastro">Login:</label>
		<input type="text" name="login" class="input-cadastro" required>

		<label for="senha" class="label-cadastro">Senha:</label>
		<input type="password" name="senha" class="input-cadastro" required>

    <label for="confirma_senha" class="label-cadastro">Confirmar Senha:</label>
    <input type="password" name="confirma_senha" class="input-cadastro" required>

		<input type="submit" name="enviar" id="botao-cadastro">
	</form>


<?php

                
                  
                  if (@$_SESSION['action'] == 'senha' || @$_SESSION['action'] == 'cpf' || @$_SESSION['action'] == 'login') {

                    
?>


                        <script type="text/javascript">
  
                         setTimeout(function(){ alert("<?=$_SESSION['mensagem']?>"); }, 300);
                        
                        </script>
                                     
<?php

                    session_destroy();

                  }


?>

<script type="text/javascript">

		//função para aplicar a máscara no cpf
      function fMasc(objeto,mascara) {

      	//objeto = input
      	//mascara = tipo de mascara (cpf)
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
      }
      function fMascEx() {
        obj.value=masc(obj.value)
      }
      
      //função para realmente aplicar a máscara no código
      function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
      }
      
    </script>

