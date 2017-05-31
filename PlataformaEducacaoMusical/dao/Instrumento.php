<?php
	include '../util/ConexaoBD.php';

	class Instrumento{
		public $id;
		public $nome;
		
		function inserirInst(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO instrumento (nome)
			VALUES ('$this->nome')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		
		function buscarUsuariosPro($email){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT email, senha, id, nome, cidade, descricao
			FROM professor WHERE email='$email'");
			$bd->fechar();
		}
		function mostrarInstrumento(){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM instrumento");
			$bd->fechar();
		}
	}


?>