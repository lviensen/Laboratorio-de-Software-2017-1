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
			return $bd->query("SELECT DISTINCT *, aula.descricao as aulaDescricao FROM instrumento, aula, professor, aula_prof_inst WHERE professor.id=aula_prof_inst.idProf and instrumento.id=aula_prof_inst.idInst AND professor.id='$idProf' AND aula_prof_inst.idProf='$idProf' AND instrumento.id='$idInst' and aula_prof_inst.idInst='$idInst' AND aula_prof_inst.idAula=aula.id");
			$bd->fechar();
		}
		function mostrarAulaEspecifica(){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT descricao, video, pdf
			FROM aula where id = 2");
			$bd->fechar();
		}
		function inserirAulaInstProf(){
			$bd = new ConexaoBD;
			$sql = "INSERT INTO aula_prof_inst (idAula, idProf, idInst)
			VALUES ('$this->idAula', '$this->idProf', '$this->idInst')";
			$bd->conectar();
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
	}


?>