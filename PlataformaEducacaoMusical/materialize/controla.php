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
					$_SESSION['mensagem']='Usuário cadastrado com sucesso';
					$_SESSION['local']='login.php';
					
					echo "<meta http-equiv='refresh' 
					content='0;url=jquerymodal.php?numero=1'>";
					
				}		

				else if($operacao == "logar"){
					$email = $_POST["email"];
					$senha = $_POST["senha"];

					$userL = new Usuario;
					
					$userL->email = $email;
					$userL->senha = $senha;
					
					$resultadoAdm = $userL->buscarUsuariosAdm($email);
					
					while($linha=mysqli_fetch_assoc($resultadoAdm)){
						$idBancoAdm = $linha['id'];
						$nomeBancoAdm = $linha['nome'];
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

							echo "<meta http-equiv='refresh' content='0;url=jqueryModal.php?numero=1'>";							

						}
					}
					else{ 	

						$resultadoAlu = $userL->buscarUsuariosAlu($email);
						while($linha=mysqli_fetch_assoc($resultadoAlu)){
							$idBancoAlu = $linha['id'];
							$nomeBancoAlu = $linha['nome'];
							$emailBancoAlu = $linha['email'];
							$senhaBancoAlu = $linha['senha'];
							$cidadeBancoAlu = $linha['cidade'];
							$descricaoBancoAlu = $linha['descricao'];
						}
						if($senha==$senhaBancoAlu){
							session_start();
							$_SESSION['nome'] = $nomeBancoAlu;
							$_SESSION['senha'] = $senhaBancoAlu;
							$_SESSION['id'] = $idBancoAlu;
							$_SESSION['email'] = $emailBancoAlu;
							$_SESSION['cidade'] = $cidadeBancoAlu;
							$_SESSION['descricao'] = $descricaoBancoAlu;
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=cadastro.php'>";
						}
						else{
							$resultadoPro = $userL->buscarUsuariosPro($email);
							while($linha=mysqli_fetch_assoc($resultadoPro)){
								$idBancoPro = $linha['id'];
								$nomeBancoPro = $linha['nome'];
								$emailBancoPro = $linha['email'];
								$senhaBancoPro = $linha['senha'];
								$cidadeBancoPro = $linha['cidade'];
								$descricaoBancoPro = $linha['descricao'];
							}
							if($senha==$senhaBancoPro){
								session_start();
								$_SESSION['nome'] = $nomeBancoPro;
								$_SESSION['senha'] = $senhaBancoPro;
								$_SESSION['id'] = $idBancoPro;
								$_SESSION['email'] = $emailBancoPro;
								$_SESSION['cidade'] = $cidadeBancoPro;
								$_SESSION['descricao'] = $descricaoBancoPro;
								echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=home.php'>";
							}
							else{
								session_start();
								$_SESSION['mensagem']='Dados incorretos!';
								$_SESSION['local']='login.php';

								echo "<meta http-equiv='refresh' content='0;url=jqueryModal.php?numero=1'>";							

							}							

						}

					}
					
				}	
			?>
		</div>
	</body>	
</html>