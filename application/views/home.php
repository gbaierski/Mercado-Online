<?php include('header.php'); ?>




<?php

                
                  
                  if (@$_SESSION['action'] == 'sucesso') {

                    
?>


                        <script type="text/javascript">
  
                         setTimeout(function(){ alert("<?=$_SESSION['mensagem']?>"); }, 300);
                        
                        </script>
                                     
<?php

                    session_destroy();

                  }


?>

<div class="logo"></div>
<div class="background_home"></div>



<div class="clear"></div>

<div class="info-section">
	<div class="informacao-home">
		O Mercado Online tem como objetivo facilitar a vida dos nossos clientes através de um site no qual podem ser visualizados os preços dos produtos do mercado. Além de ser um método ecológico (Pois não existe a necessidade de imprimir diversos jornais!), ainda é muito mais fácil para pesquisar e filtrar os produtos que lhe interessam.
	</div>

	<div class="imagem_home"></div>
</div>

<div class="clear"></div>

<?php

	include('footer.php');

?>