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
		function mostrarInstrumentoProf($id){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * from prof_inst, professor, instrumento WHERE prof_inst.idProf='$id' AND professor.id='$id' AND instrumento.id=prof_inst.idInst");
			$bd->fechar();
		}
		function mostrarInstrumentoAlu($id){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * from alu_inst, aluno, instrumento WHERE alu_inst.idAlu='$id' AND aluno.id='$id' AND instrumento.id=alu_inst.idInst");
			$bd->fechar();
		}
		function dadosInstrumento($codigo){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT nome FROM instrumento WHERE id='$codigo'");
			$bd->fechar();
		}
	}


?>