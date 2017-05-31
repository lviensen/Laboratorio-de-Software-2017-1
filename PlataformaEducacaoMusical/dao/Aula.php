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
			return $bd->query("SELECT descricao, video, pdf
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
		
	}


?>