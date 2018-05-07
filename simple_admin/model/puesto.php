<?php
/**
* 
*/
class puesto{
	private $keyPuesto;
	private $cvePuesto;
	private $descPuesto;
	
	function __construct(){
		# code...
	}

	public function setKeyPuesto($pKeyPuesto){
		$this->keyPuesto = $pKeyPuesto;
	}
	public function getKeyPuesto(){
		return $this->keyPuesto;
	}

	public function setCvePuesto($pCvePuesto){
		$this->CvePuesto = $pCvePuesto;
	}
	public function getCvePuesto(){
		return $this->CvePuesto;
	}

	public function setDescPuesto($pDescPuesto){
		$this->DescPuesto = $pDescPuesto;
	}
	public function getDescPuesto(){
		return $this->DescPuesto;
	}

}
?>