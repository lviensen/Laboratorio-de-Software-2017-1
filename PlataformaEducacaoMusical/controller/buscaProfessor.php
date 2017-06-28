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
	$resultado = $db->query("SELECT * FROM professor
	WHERE nome LIKE '%$pesquisa%'");
	
	if (mysqli_num_rows($resultado) <=0){
		echo "<li class='collection-item grey lighten-3'><div>Professor não encontrado...<a class='secondary-content tooltipped' </a></div></li>";
	}
	else {
		while($linha=mysqli_fetch_assoc($resultado)){
			$nome=$linha['nome']; 
			$idInstrumento=$linha['id'];
			?>

                        <form method="post" action="../controller/controla.php">
                          <input type="hidden" name="operacao" value="cadastroAlunoInstrumentoProfessor">
                          <input type="hidden" name="idInst" value="<?php echo $codigo; ?>">
                          <input type="hidden" name="idProf" value="<?php echo $linha['idProf']; ?>">    
                          <input type="hidden" name="idAlu" value="<?php echo $_SESSION['id']; ?>">                      
                          <li class='collection-item'>
                            <div><?php echo $nome; ?>     
                              <?php 
                                $resultado3 = $u->buscarNota($idProf, $codigo);
                                if($resultado3){
                                  while($linha=mysqli_fetch_assoc($resultado3)){
                                    if (is_null($linha['nota'])) {
                                      $nota='Ainda não avaliado';
                                    }
                                    if ($linha['nota'] <=1 && $linha['nota'] > 0) {
                                      $nota='Ruim';
                                    }
                                    elseif ($linha['nota'] <=2 && $linha['nota'] > 1) {
                                      $nota='Razoável';
                                    }
                                    elseif ($linha['nota'] <=3 && $linha['nota'] > 2) {
                                      $nota='Bom';
                                    }
                                    elseif ($linha['nota'] <=4 && $linha['nota'] > 3) {
                                      $nota='Muito bom';
                                    }
                                    elseif ($linha['nota'] <=5 && $linha['nota'] > 4) {
                                      $nota='Ótimo';
                                    }
                                  }
                                }
                              ?>                    
                              <button type="submit" class='secondary-content tooltipped white' id="botaoVisualizar" data-position='bottom' data-delay='50' data-tooltip='Cadastrar-se'><i class='material-icons green-text'>add </i> </button> </form>
                              <!--<form method="post" action="./perfilProfessor.php">
                                <input type="hidden" name="idProf" value="<?php echo $idProf; ?>">
                                <input type="hidden" name="nomeProf" value="<?php echo $nome; ?>">
                                <input type="hidden" name="emailProf" value="<?php echo $emailProf; ?>">    
                                <input type="hidden" name="cidProf" value="<?php echo $cidProf; ?>"> 
                                <input type="hidden" name="descricaoProf" value="<?php echo $descricaoProf; ?>">                               
                                <button class='secondary-content tooltipped' id="botaoVisualizar" type="submit" data-position='bottom' data-delay='50' data-tooltip='Ver Perfil'> <i class='material-icons orange-text'> visibility </i></button> 
                              </form> -->
                              <a  class='secondary-content tooltipped black-text' data-position='bottom' data-delay='50' data-tooltip='Pontuação'> <?php echo $nota; ?>  &nbsp; </a></div></li>		
		<?php			
		}
	}
	$db->fechar();

?>
</html>
