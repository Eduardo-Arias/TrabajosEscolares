<?php
	include_once 'dao/actividadDao.php';
	/**
	 * 	@autor: 		Jorge Eduardo Arias Delgado						   
	 *	@Descripcion:	Clase para evitar la repeticion para el manejo de  
	 *					los datos 										   
	 * -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- 
	 *	@Bitacora:		Creacion - 29/03/2018 - jarias
	 */
	class Actividad extends ActividadDao{
		protected $keyAct;
		protected $cveAct;
		protected $descAct;
		protected $table = 'actividad';

		public function setKeyAct($pKeyAct){
			$this->keyAct = $pKeyAct;
		}

		public function getKeyAct(){
			return $this->keyAct;
		}

		public function setCveAct($pCveAct){
			$this->CveAct = $pCveAct;
		}

		public function getCveAct(){
			return $this->cveAct;
		}

		public function setDescAct($pDescAct){
			$this->DescAct = $pDescAct;
		}

		public function getDescAct(){
			return $this->DescAct;
		}
	}

?>