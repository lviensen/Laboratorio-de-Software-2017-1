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
		function inserirInstSolicitado(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO instrumentossolicitados (nomeInstSolicitado)
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
			return $bd->query("SELECT DISTINCT *, matricula.idProf as idProf, matricula.idInst as idInst, professor.nome as nomeProf, instrumento.nome as nomeInst  FROM aluno, professor, instrumento, matricula WHERE aluno.id=matricula.idAlu AND aluno.id='$id' AND matricula.idAlu='$id' AND matricula.idProf=professor.id AND matricula.idInst=instrumento.id");
			$bd->fechar();
		}
		function dadosInstrumento($codigo){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT nome FROM instrumento WHERE id='$codigo'");
			$bd->fechar();
		}
		function mostrarInstrumentoOutros($idProf){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM instrumento where instrumento.id not in (SELECT instrumento.id from prof_inst, professor, instrumento WHERE prof_inst.idProf='$idProf' AND professor.id='$idProf' AND instrumento.id=prof_inst.idInst)");
			$bd->fechar();			
		}
		function mostrarInstSolicitados(){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT * FROM instrumentossolicitados");
			$bd->fechar();
		}
		function excluirInstSolicitado(){
			$bd = new ConexaoBD;
			$sql = "DELETE FROM instrumentossolicitados WHERE instrumentossolicitados.idInstSolicitado='$this->id'";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();			
		}			
	}


?>