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


		function mostrarAula(){
			$bd = new ConexaoBD;
			$bd->conectar();
			return $bd->query("SELECT id, descricao, video, pdf
			FROM aula");
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
			$sql = "INSERT INTO aula_prof_inst (idAula, idInst, idProf)
			VALUES ('$this->idAula', '$this->idInst', '$this->idProf')";
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