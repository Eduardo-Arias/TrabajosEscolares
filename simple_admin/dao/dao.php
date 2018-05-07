<?php
	/**
	 * @autor: Jorge Eduardo Arias Delgado
	 * @Descripcion: Clase para el manejo de los datos 
	 * 
	 */
	abstract class Dao{
		
		// Variables para el manejo de la conexion
		private $con = null;

		function __construct(){
			$instance = DataBase::getInstance();
			$this->con = $instance->getConnection();
		}

		public function ejecutarQuery($pSql){
			$stmt = $this->con->prepare($pSql);
			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function consultarQuery($pSql){
			$stmt = $this->con->prepare($pSql);
			$stmt->execute();

			return $stmt;
		}

	}
?>