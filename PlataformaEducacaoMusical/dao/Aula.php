<?php
	include '../util/ConexaoBD.php';

	class Aula{
		public $id;
		public $video;
		public $pdf;
		public $descricao;
		
		function inserirAula(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO aula (descricao, video, pdf)
			VALUES ('$this->descricao', '$this->video', '$this->pdf')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}


		function mostrarAula($idProf, $idInst){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT DISTINCT *, aula.descricao as aulaDescricao, aula.id as aulaId FROM instrumento, aula, professor, aula_prof_inst WHERE professor.id=aula_prof_inst.idProf and instrumento.id=aula_prof_inst.idInst AND professor.id='$idProf' AND aula_prof_inst.idProf='$idProf' AND instrumento.id='$idInst' and aula_prof_inst.idInst='$idInst' AND aula_prof_inst.idAula=aula.id");
			$bd->fechar();
		}
		function mostrarAulaEspecifica($profId, $instId, $aulaId){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT DISTINCT * FROM professor, instrumento, aula, prof_inst, aula_prof_inst WHERE professor.id='$profId' AND prof_inst.idProf='$profId' AND aula_prof_inst.idProf='$profId' AND professor.id=aula_prof_inst.idProf AND professor.id=prof_inst.idProf AND aula_prof_inst.idProf=prof_inst.idProf AND instrumento.id='$instId' AND prof_inst.idInst='$instId' AND aula_prof_inst.idInst='$instId' AND instrumento.id=aula_prof_inst.idInst AND instrumento.id=prof_inst.idInst AND aula_prof_inst.idInst=prof_inst.idInst AND aula.id='$aulaId' AND aula_prof_inst.idAula='$aulaId' AND aula_prof_inst.idAula=aula.id");
			$bd->fechar();
		}
		function inserirAulaInstProf(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO aula_prof_inst (idAula, idProf, idInst)
			VALUES ('$this->idAula', '$this->idProf', '$this->idInst')";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();
		}
		function maiorIdAula(){ 
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT MAX(ID) as id FROM aula");
			$bd->fechar();			
		}
		function excluirAula(){
			$bd = new ConexaoBD;
			$sql = "DELETE FROM aula_prof_inst WHERE aula_prof_inst.idAula='$this->idAula' AND aula_prof_inst.idProf='$this->idProf' AND aula_prof_inst.idInst='$this->idInst'";
			$bd->conectar();
			$bd->query($sql);
			$sql2 = "DELETE FROM aula WHERE aula.id='$this->idAula'";
			$bd->query($sql2);
			$bd->fechar();			
		}
		function editarAula(){
			$bd = new ConexaoBD;
			$sql = "UPDATE aula SET descricao='$this->descricao', video='$this->video', pdf='$this->pdf' WHERE aula.id ='$this->idAula';";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();			
		}
		function mostrarAulaEspecificaAluno($idAula){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT DISTINCT * FROM aula WHERE aula.id='$idAula'");
			$bd->fechar();			
		}
		function incrementarAula(){
			$bd = new ConexaoBD;
			$sql = "UPDATE matricula SET aula_num=aula_num+1 WHERE matricula.idMatri='$this->idMatri'";
			$bd->conectar();
			$bd->query($sql);
			$bd->fechar();				
		}
		function buscarMatricula($idAlu, $idProf, $idInst){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT *, matricula.idMatri as idMatri FROM matricula, professor, instrumento, aluno WHERE professor.id='$idProf' AND professor.id=matricula.idProf AND aluno.id='$idAlu' AND matricula.idAlu=aluno.id AND instrumento.id='$idInst' AND instrumento.id=matricula.idInst");
			$bd->fechar();				
		}
	}


?>