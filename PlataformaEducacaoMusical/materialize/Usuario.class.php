<?php
	include 'ConexaoBD.class.php';

	class Usuario{
		public $id;
		public $nome;
		public $email;
		public $cidade;
		public $senha;
		public $descricao;
		
		function inserir(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO aluno (nome, email, cidade, senha, descricao)
			VALUES ('$this->nome', '$this->email', '$this->cidade', '$this->senha', '$this->descricao')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		

		
	}


?>