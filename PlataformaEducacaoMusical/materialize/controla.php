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

				include './Usuario.php';
				$operacao = $_POST["operacao"];
				session_start();

				$user = new Usuario;
				

				 if($operacao == "incluir"){


					$nome = $_POST["nome"];
					$email = $_POST["email"];
					$cidade = $_POST["cidade"];
					$senha = $_POST["senha"];
					$descricao = $_POST["descricao"];
					$tipo = $_POST["tipo"];
					
					
					$user->nome = $nome;
					$user->email = $email;
					$user->cidade = $cidade;
					$user->senha = $senha;
					$user->descricao = $descricao;

					if ($tipo == "aluno") {
						$user->inserirAlu();
					}
					elseif ($tipo == "professor") {
						$user->inserirPro();
					}
					
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=login.php'>";
					
				}		

				else if($operacao == "logar"){
					$email = $_POST["email"];
					$senha = $_POST["senha"];

					$userL = new Usuario;
					
					$userL->email = $email;
					$userL->senha = $senha;
					
					$resultadoAdm = $userL->buscarUsuariosAdm($email);
					
					while($linha=mysqli_fetch_assoc($resultadoAdm)){
						$emailBancoAdm = $linha['email'];
						$senhaBancoAdm = $linha['senha'];
					}
					
					if($email==$emailBancoAdm){
						if($senha==$senhaBancoAdm){
							session_start();
							$_SESSION['nome'] = $nomeBancoAdm;
							$_SESSION['senha'] = $senhaBancoAdm;
							$_SESSION['id'] = $idBancoAdm;
							$_SESSION['email'] = $emailBancoAdm;
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=adm.php'>";
						}
						else{
							session_start();
							$_SESSION['mensagem']='Senha Incorreta!';
							$_SESSION['local']='login.php';

							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=login.php'>";							

						}
					}
					else{ 	

						$resultadoAlu = $userL->buscarUsuariosAlu($email);
						while($linha=mysqli_fetch_assoc($resultadoAlu)){
							$emailBancoAlu = $linha['email'];
							$senhaBancoAlu = $linha['senha'];
						}
						if($senha==$senhaBancoAlu){
							session_start();
							$_SESSION['nome'] = $nomeBancoAlu;
							$_SESSION['senha'] = $senhaBancoAlu;
							$_SESSION['id'] = $idBancoAlu;
							$_SESSION['email'] = $emailBancoAlu;
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=cadastro.php'>";
						}
						else{
							$resultadoPro = $userL->buscarUsuariosPro($email);
							while($linha=mysqli_fetch_assoc($resultadoPro)){
								$emailBancoPro = $linha['email'];
								$senhaBancoPro = $linha['senha'];
							}
							if($senha==$senhaBancoPro){
								session_start();
								$_SESSION['nome'] = $nomeBancoPro;
								$_SESSION['senha'] = $senhaBancoPro;
								$_SESSION['id'] = $idBancoPro;
								$_SESSION['email'] = $emailBancoPro;
								echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=index.html'>";
							}
							else{
								session_start();
								$_SESSION['mensagem']='Senha Incorreta!';
								$_SESSION['local']='login.php';

								echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=login.php'>";							

							}							

						}
					}
					
				}	
			?>
		</div>
	</body>	
</html>