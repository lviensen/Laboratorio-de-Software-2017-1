<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
	
	<body>
		<div>
			<?php

				include '../dao/Aula.php';
				$operacao = $_POST["operacao"];

				session_start();

				$aula = new Aula;
				

				 if($operacao == "cadastroAula"){

					$idInst = $_POST["idInst"];
					$idProf = $_POST["idProf"];
					$descricao = $_POST["descricao"];
					$video = $_POST["video"];
					$pdf = $_POST["pdf"];
					
					
					$aula->descricao = $descricao;
					$aula->video = $video;
					$aula->pdf = $pdf;
					
					$aula->inserirAula();
					$resultado = $aula->maiorIdAula();
					if($resultado){
                      while($linha=mysqli_fetch_assoc($resultado)){
                      	$idAula=$linha['id'];
                      }
                    }
					$aula->idAula = $idAula;
					$aula->idInst = $idInst;
					$aula->idProf = $idProf;

					$aula->inserirAulaInstProf();
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/home.php'>";
					
				}		

			?>
		</div>
	</body>	
</html>