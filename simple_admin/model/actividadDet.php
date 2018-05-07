<?php 
	require_once 'dao/actividadDetDao.php';
/**
 * 
 */
class ActividadDet extends ActividadDetDao{
	protected $keyActMov;
	protected $keyUser;
	protected $KeyAct;
	protected $KeyPro;
	protected $fechaIni;
	protected $fechaFin;
	protected $estatus;

	protected $table = 'actividad_det';

	public function setActMov($pKeyActMov){
		$this->keyActMov = $pKeyActMov;
	}

	public function getActMov(){
		$this->keyActMov;
	}

	public function setKeyUser($pKeyUser){
		$this->keyUser = $pKeyUser;
	}

	public function getKeyUser(){
		$this->keyUser;
	}

	public function setKeyAct($pKeyAct){
		$this->keyAct = $pKeyAct;
	}

	public function getKeyAct(){
		$this->keyAct;
	}

	public function setKeyPro($pKeyPro){
		$this->keyPro = $pKeyPro;
	}

	public function getKeyPro(){
		$this->keyPro;
	}

	public function setFechaIni($pFechaIni){
		$this->fechaIni = $pFechaIni;
	}

	public function getFechaIni(){
		$this->fechaIni;
	}

	public function setFechaFin($pFechaFin){
		$this->fechaFin = $pFechaFin;
	}

	public function getFechaFin(){
		$this->fechaFin;
	}

	public function setEstatus($pEstatus){
		$this->estatus = $pEstatus;
	}

	public function getEstatus(){
		$this->estatus;
	}
}