<?php
	include './ConexaoBD.php';

	class Usuario{
		public $id;
		public $nome;
		public $email;
		public $cidade;
		public $senha;
		public $descricao;
		
		function inserirAlu(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO aluno (nome, email, cidade, senha, descricao)
			VALUES ('$this->nome', '$this->email', '$this->cidade', '$this->senha', '$this->descricao')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		function inserirPro(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO professor (nome, email, cidade, senha, descricao)
			VALUES ('$this->nome', '$this->email', '$this->cidade', '$this->senha', '$this->descricao')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		function buscarUsuariosAdm($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT id, nome, email, senha
			FROM adm WHERE email='$email'");
			$bd->fechar();
		}
		function buscarUsuariosAlu($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT email, senha, id, nome, cidade, descricao
			FROM aluno WHERE email='$email'");
			$bd->fechar();
		}
		function buscarUsuariosPro($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT email, senha, id, nome, cidade, descricao
			FROM professor WHERE email='$email'");
			$bd->fechar();
		}

		
	}


?>