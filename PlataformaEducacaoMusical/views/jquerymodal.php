<html><head>
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
			$numero = $_GET["numero"];
			session_start();
			if ($numero == 1){
		?>
		<!-- Modal -->
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel"><?php echo $_SESSION['mensagem']; ?></h4>
			  </div>
			  
			  <div class="modal-footer">
				<a class="btn btn-default" href="<?php echo $_SESSION['local']; ?>">Ok</a>
				
			  </div>
			</div>
		  </div>
		</div>
		
		<script>
			$('document').ready(function(){
				$('#myModal1').modal('show');
			})
		</script>
		<?php
			}
			if($numero==2){
				$codigo = $_GET["codigo"];
			
		?>
		<!-- Modal -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel">Deseja realmente excluir?</h4>
			  </div>
			  
			  <div class="modal-footer">
				<form class="form-horizontal" role="form" method="post" action="controlaJogador.php">
					<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
					<input type="submit" class="btn btn-danger" name="operacao" value="Sim"/>
					<a class="btn btn-primary" href=editarPergunta.php?codigo=<?php echo $codigo ?>>Não</a>
				
				</form>
			  </div>
			</div>
		  </div>
		</div>
		
		<script>
			$('document').ready(function(){
				$('#myModal2').modal('show');
			})
		</script>
		
		<?php
			}
		?>
		
		</div>
	</body>
</html>