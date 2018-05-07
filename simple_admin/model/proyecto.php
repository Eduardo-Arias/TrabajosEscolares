<?php
	include_once 'dao/proyectoDao.php';
	/**
	 * 	@autor: 		Jorge Eduardo Arias Delgado						   
	 *	@Descripcion:	Clase para evitar la repeticion para el manejo de  
	 *					los datos 										   
	 * -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- 
	 *	@Bitacora:		Creacion - 29/03/2018 - jarias
	 */
	class Proyecto extends ProyectoDao{

		protected $keyPro;
		protected $cvePro;
		protected $descPro;
		protected $table = 'proyecto';
		
		public function setId($pId){
			$this->id = $pId;
		}
		
		public function getId(){
			return $this->id;
		}
		public function setCvePro($pCvePro){
			$this->cvePro = $pCvePro;
		}
		
		public function getCvePro(){
			return $this->cvePro;
		}

		public function setDescPro($pDescPro){
			$this->descPro = $pDescPro;
		}

		public function getCveProyecto(){
			return $this->cveProyecto;
		}

		public function toString(){
			return 'cve_pro = '. $this->cvePro . ' desc_pro = '. $this->descPro;
		}
	}
?>