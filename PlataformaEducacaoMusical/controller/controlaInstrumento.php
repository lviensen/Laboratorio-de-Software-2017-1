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

				include '../dao/Instrumento.php';
				$operacao = $_POST["operacao"];
				session_start();

				$inst = new Instrumento;
				

				 if($operacao == "solicitaCadastroInstrumento"){


					$nome = $_POST["nome"];
					
					
					$inst->nome = $nome;
					
					$inst->inserirInstSolicitado();
					
					$_SESSION['mensagem']='Solicitação feita com sucesso!';
					$_SESSION['verificador']='SIM';
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/home.php'>";
					
				}	
				elseif($operacao == "cadastroInstrumento"){


					$nome = $_POST["nome"];
					$id = $_POST["id"];
					$solicitacao = $_POST['solicitacao'];
					echo $solicitacao;

					$inst->nome = $nome;
					$inst->id = $id;

					if ($solicitacao == 'aceitar') {
						$inst->inserirInst();
						$inst->excluirInstSolicitado();	
						$_SESSION['mensagem']='Instrumento cadastrado!';
						$_SESSION['verificador']='SIM';								
						echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/adm.php'>";			
					}
					if ($solicitacao == 'recusar') {
						$inst->excluirInstSolicitado();	
						$_SESSION['mensagem']='Instrumento recusado!';
						$_SESSION['verificador']='SIM';								
						echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/adm.php'>";							
					}
					
					
					
				}		
			?>
		</div>
	</body>	
</html>