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

				include '../dao/Usuario.php';
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
						$userAlu = new Usuario;
						$resultado1 = $userAlu->buscarUsuariosAlu($email);
						$num_linhas = mysqli_num_rows($resultado1);
						if ($resultado1) {							
							while($linha=mysqli_fetch_assoc($resultado1)){ 
								if ($linha['email'] == $email) {
									$_SESSION['mensagem']='ERRO!! Este email já está cadastrado!';
									$_SESSION['verificador']='SIM';
									echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../cadastro.php'>";
								}	
							}	
						}
						if ($num_linhas==0){
							$user->inserirAlu();
							$_SESSION['mensagem']='Cadastro realizado com sucesso!';
							$_SESSION['verificador']='SIM';
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";
						}
					}
					elseif ($tipo == "professor") {
						$userPro = new Usuario;
						$resultado1 = $userPro->buscarUsuariosPro($email);
						$num_linhas = mysqli_num_rows($resultado1);
						if ($resultado1) {							
							while($linha=mysqli_fetch_assoc($resultado1)){ 
								if ($linha['email'] == $email) {
									$_SESSION['mensagem']='ERRO!! Este email já está cadastrado!';
									$_SESSION['verificador']='SIM';
									echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../cadastro.php'>";
								}	
							}	
						}
						if ($num_linhas==0){
							$user->inserirPro();
							$_SESSION['mensagem']='Cadastro realizado com sucesso!';
							$_SESSION['verificador']='SIM';
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";
						}
					}
				}		

				else if($operacao == "logar"){
					$email = $_POST["email"];
					$senha = $_POST["senha"];
					$tipo = $_POST["tipo"];

					
					$userL = new Usuario;
					
					$userL->email = $email;
					$userL->senha = $senha;
					
					if ($tipo == "adm") {
						$resultadoAdm = $userL->buscarUsuariosAdm($email);
						$num_linhas = mysqli_num_rows($resultadoAdm);
						while($linha=mysqli_fetch_assoc($resultadoAdm)){
							$idBancoAdm = $linha['id'];
							$nomeBancoAdm = $linha['nome'];
							$emailBancoAdm = $linha['email'];
							$senhaBancoAdm = $linha['senha'];
						}
	                    if ($num_linhas==0) {
							$_SESSION['mensagem']='Este email não é do Administrador!';
							$_SESSION['verificador']='SIM';
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";		                        
	                    }						
						elseif($email==$emailBancoAdm){
							if($senha==$senhaBancoAdm){
								$_SESSION['nome'] = $nomeBancoAdm;
								$_SESSION['senha'] = $senhaBancoAdm;
								$_SESSION['id'] = $idBancoAdm;
								$_SESSION['email'] = $emailBancoAdm;
								echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/adm.php'>";
							}
							else{
								$_SESSION['mensagem']='Senha incorreta!!';
								$_SESSION['verificador']='SIM';
								echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";							

							}
						}						
					}
					elseif ($tipo == "aluno") {
						$resultadoAlu = $userL->buscarUsuariosAlu($email);
						$num_linhasAlu = mysqli_num_rows($resultadoAlu);
						while($linha=mysqli_fetch_assoc($resultadoAlu)){
							$idBancoAlu = $linha['id'];
							$nomeBancoAlu = $linha['nome'];
							$emailBancoAlu = $linha['email'];
							$senhaBancoAlu = $linha['senha'];
							$cidadeBancoAlu = $linha['cidade'];
							$descricaoBancoAlu = $linha['descricao'];
						}						
	                    if ($num_linhasAlu==0) {
							$_SESSION['mensagem']='Este email não está cadastrado como aluno!';
							$_SESSION['verificador']='SIM';
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";		                        
	                    }
						elseif($senha==$senhaBancoAlu){
							$_SESSION['nome'] = $nomeBancoAlu;
							$_SESSION['senha'] = $senhaBancoAlu;
							$_SESSION['id'] = $idBancoAlu;
							$_SESSION['email'] = $emailBancoAlu;
							$_SESSION['cidade'] = $cidadeBancoAlu;
							$_SESSION['descricao'] = $descricaoBancoAlu;
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/homeAluno.php'>";
						}
						else{
							$_SESSION['mensagem']='Senha incorreta!!';
							$_SESSION['verificador']='SIM';
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";		
						}
					}
					elseif ($tipo == "professor") {
						$resultadoPro = $userL->buscarUsuariosPro($email);
						$num_linhasPro = mysqli_num_rows($resultadoPro);
						while($linha=mysqli_fetch_assoc($resultadoPro)){
							$idBancoPro = $linha['id'];
							$nomeBancoPro = $linha['nome'];
							$emailBancoPro = $linha['email'];
							$senhaBancoPro = $linha['senha'];
							$cidadeBancoPro = $linha['cidade'];
							$descricaoBancoPro = $linha['descricao'];
						}
	                    if ($num_linhasPro==0) {
							$_SESSION['mensagem']='Este email não está cadastrado como professor!';
							$_SESSION['verificador']='SIM';
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";		                        
	                    }
						elseif($senha==$senhaBancoPro){
							$_SESSION['nome'] = $nomeBancoPro;
							$_SESSION['senha'] = $senhaBancoPro;
							$_SESSION['id'] = $idBancoPro;
							$_SESSION['email'] = $emailBancoPro;
							$_SESSION['cidade'] = $cidadeBancoPro;
							$_SESSION['descricao'] = $descricaoBancoPro;
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/home.php'>";
						}
						else{
							$_SESSION['mensagem']='Senha incorreta!!';
							$_SESSION['verificador']='SIM';
							echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../login.php'>";
						}						
					}
					
				}	
				elseif ($operacao == "alterar"){
					$id = $_POST["id"];
					$nome = $_POST["nome"];
					$cidade = $_POST["cidade"];
					$email = $_POST["email"];
					$senha = $_POST["senha"];
					$descricao = $_POST["descricao"];
					
					$u = new Usuario;
					
					$u->id = $id;
					$u->nome = $nome;
					$u->cidade = $cidade;
					$u->email = $email;
					$u->senha = $senha;
					$u->descricao = $descricao;
					$u->atualizarUsuarioProfessor();
					
					$_SESSION['mensagem']='Usuário alterado com sucesso';
					$_SESSION['local']='perfil.php';
					$_SESSION['nome'] = $nome;
					$_SESSION['cidade'] = $cidade;
					$_SESSION['email'] = $email;
					$_SESSION['senha'] = $senha;
					$_SESSION['descricao'] = $descricao;
					echo "<meta http-equiv='refresh' 
					content='0;url=../views/jquerymodal.php?numero=1'>";
					
				}
				elseif ($operacao == "cadastrarProfInst") { 
					$idProf = $_POST["idProf"];
					$idInst = $_POST["idInst"];	
					$user->idInst = $idInst;
					$user->idProf = $idProf;

					$user->inserirProfInst();
					
					$_SESSION['mensagem']='Cadastro realizado com sucesso!';
					$_SESSION['verificador']='SIM';
					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/home.php'>";
						
				}
				elseif ($operacao == "cadastroAlunoInstrumentoProfessor") {
					$idAlu = $_POST['idAlu'];
					$idProf = $_POST['idProf'];
					$idInst = $_POST['idInst'];

					$user->idAlu = $idAlu;
					$user->idProf = $idProf;
					$user->idInst = $idInst;

					$user->inserirAlunoInstrumentoProfessor();

					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/homeAluno.php'>";				
				}
				elseif ($operacao == "avaliar") {

					$idMatri = $_POST['idMatri'];
					$nota = $_POST['nota'];

					$user->idMatri = $idMatri;
					$user->nota = $nota;

					$user->avaliar();

					echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=../views/homeAluno.php'>";
				}
			?>
		</div>
	</body>	
</html>