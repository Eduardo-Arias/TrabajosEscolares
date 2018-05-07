<?php
	include_once 'dao/usuarioDao.php'; 
	
	class Usuario extends UsuarioDao{
		protected $keyUser;
		protected $apePat;
		protected $apeMat;
		protected $nombre;
		protected $username;
		protected $pass;
		protected $email;
		protected $table = 'usuario';

		public function setKeyUser($pKeyUser){
			$this->keyUser = $pKeyUser;
		}

		public function getKeyUser(){
			return $this->keyUser;
		}

		public function setApePat($pApePat){
			$this->apePat = $pApePat;
		}

		public function getApePat(){
			return $this->apePat;
		}

		public function setApeMat($pApeMat){
			$this->apeMat = $pApeMat;
		}

		public function getApeMat(){
			return $this->apeMat;
		}

		public function setNombre($pNombre){
			$this->nombre = $pNombre;
		}

		public function getNombre(){
			return $this->nombre;
		}
		
		public function setUsername($pUsername){
			$this->username = $pUsername;
		}

		public function getUsername(){
			return $this->username;
		}

		public function setPass($pPass){
			$this->pass = $pPass;
		}

		public function getPass(){
			return $this->pass;
		}

		public function setEmail($pEmail){
			$this->email = $pEmail;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getTable(){
			return $this->table;
		}		
	}
?>