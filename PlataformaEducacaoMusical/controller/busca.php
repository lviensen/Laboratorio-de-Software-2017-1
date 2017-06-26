<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
	      $(".button-collapse").sideNav();
	      $(document).ready(function(){
	        $('.tooltipped').tooltip({delay: 50});
	      });
	    </script>
    </head>
<?php
	include '../util/ConexaoBD.php';
	
	$pesquisa = $_POST['palavra'];
	
	$db = new ConexaoBD();
	$db->conectar();
	$resultado = $db->query("SELECT * FROM instrumento
	WHERE nome LIKE '%$pesquisa%'");
	
	if (mysqli_num_rows($resultado) <=0){
		echo "<li class='collection-item grey lighten-3'><div>Instrumento não encontrado...<a href='./instrumentoTela.php'' class='secondary-content tooltipped' </a></div></li>";
	}
	else {
		while($linha=mysqli_fetch_assoc($resultado)){
			$nome=$linha['nome']; 
			$idInstrumento=$linha['id'];
			?>

 			<form method="post" action="../views/InstrumentoProfessores.php">
	          <input type="hidden" name="nomeInst" value="<?php echo $nome; ?>">
	          <input type="hidden" name="idInst" value="<?php echo $idInstrumento; ?>">
	          <li class="collection-item"><div><?php echo $nome; ?><button type="submit" id="botaoVisualizar"  class="secondary-content tooltipped white" data-position="bottom" data-delay="50" data-tooltip="Ver Professores"><i class="material-icons orange-text">visibility</i> </button></div></li></form> 			
		<?php			
		}
	}
	$db->fechar();

?>
</html>
