<?php
	/**
	*	@autor:			Jorge Eduardo Arias Delgado - jarias
	*	@Descripcion:	Clase encargada de manejar los datos
	*					de los puestos
	* -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - --
	*	@Bitacora:		04/04/2018 - Creacion - jarias
	* 
	*/
	abstract class PuestoDao{

		/**
		* @Descipcion: Metodo generico para consultar datos de una tabla
		* @param type $value - Valor del campo a consultar
		* @param type $key - Valor de la llave primarya del dato a combiar
		* @return type Retorna la consulta a ejecutar 
		**/
		public function read($pValue = null, $pKey = null){
			$sql = null;
			if(is_null($pKey)){
				$sql = "Select * from " . $this->getTable;
			}else{
				$key = $this->keyPro;
				$sql = "Select * from " . $this->getTable;
			}
			echo $sql;

			$stmt = $this->con->prepare($sql);
			$stmt->execute();

			return $stmt;
		}
		/**
		* @Descripcion: Metodo para obtener los datos mediante la primary key de la table
		* @param type $value valor del campo a consultar
		* @return los datos consultados
		**/
		public function readId($value = null){
			if (is_null($value)) {
				exit('Se requiere un valor para el ID');
			}else{
				$sql = "Select *  from ". $this->table." Where key_puesto = '{$value}";
			}
			echo $sql;

			$stmt = $this->con->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();
			$this->setKeyPuesto 	= $row['key_puesto'];
			$this->setCvePuesto 	= $row['cve_puesto'];
			$this->setDescPuesto 	= $row['desc_puesto'];
		}
		/**
		* @Descripcion: Metodo para obtener los datos mediante la primary key de la table
		* @param type $value valor del campo a consultar
		* @return los datos consultados
		**/
		public function update($value=''){
			$sql = "Update " . $this->getTable . " set ";
			$sql .= " cve_puesto =:cvePuesto, desc_puesto=:descPuesto";

			$campos = array(':cvePuesto' => $this->getCvePuesto,
							':descPuesto'=> $this->getDescPuesto);

			$stmt = $this->con->prepare(sql);
			if ($stmt->execute($campos)) {
				return true;
			}else{
				return false;
			}
		}

		public function delete($pValue , $pKey = null){
			if (is_null($pKey)) {
				$pKey = $this->primaryKey;
			}
			$sql = "Delete ".$this->table . "Where {$pkey} = '{$pValue}'";

			$stmt = $this->con->prepare($sql);
			if ($stmt->execute()){
				return true;
			}
			return false;
				
		}

		public function insert(){
			$campos = array(':ape_pat' 	=> $this->apePat ,
							':ape_mat' 	=> $this->apeMat ,
							':nombre'	=> $this->nombre ,
							':username' => $this->username ,
							':pass'		=> $this->pass ,
							':email'	=> $this->email);
			$sql = "Insert into ".$this->table . 
							"(ape_pat,ape_mat,nombre,username,pass,email) ".
					"Values (':ape_pat',':ape_mat',':nombre',':username',':pass',':email')";
			$stmt = $this->com->prepare($sql);

			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
		}
	}
	}
?>