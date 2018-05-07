<?php
	include_once 'dao/dao.php';
	/**
	 * 	@autor: 		Jorge Eduardo Arias Delgado						   
	 *	@Descripcion:	Clase para evitar la repeticion para el manejo de  
	 *					los datos 										   
	 * -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- 
	 *	@Bitacora:		Creacion - 29/03/2018 - jarias
	 *					Modificacion del completa del flujo, debido a error de unica instancia 
	 *					de conexion - 28/04/2018 - jarias
	 */
	 abstract class ActividadDao extends Dao{
		
		/**
		* @Descipcion: Metodo generico para consultar datos de una tabla
		* @param type $value - Valor del campo a consultar
		* @param type $key - Valor de la llave primarya del dato a combiar
		* @return type Retorna la consulta a ejecutar 
		**/
		public function read($pValue = null, $pKey = null){
			$sql = null;
			if(is_null($pKey)){
				$sql = "Select * from " . $this->table;
			}else{
				$key = $this->keyPro;
				$sql = "Select * from " . $this->table;
			}

			$resul = $this->consultarQuery($sql);

			return $resul;
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
				$sql = "Select *  from ". $this->table." Where key_act = ".$value;
			}
			echo $sql;

			$resul = $this->consultarQuery($sql);
			$row = $stmt->fetch();
			$this->keyPro = $row['key_act'];
			$this->cvePro = $row['cve_act'];
			$this->descPro = $row['desc_act'];
		}

		public function update($value=''){
			$sql = "Update " . $this->table . " set ";
			$sql .= " cve_=".$this->cveAct.", desc_pro=".$this->descAct;

			if ($this->ejecutarQuery($sql)) {
				return true;
			}else{
				return false;
			}
		}

		public function delete($pValue , $pKey = null){
			if (is_null($pKey)) {
				$pKey = $this->primaryKey;
			}
			$sql = "Delete ".$this->table . "Where key_act = ".$this->keyAct;

			if ($this->ejecutarQuery($sql)){
				return true;
			}else{
				return false;		
			}
		}

		public function insert(){
			$sql = "Insert into ".$this->table . 
					"(cve_act,desc_act) ".
					"Values ('".$this->cveAct."','".$this->descAct."')";
					echo $sql;

			if ($this->ejecutarQuery($sql)) {
				return true;
			}else{
				return false;
			}
		}

		public function gridHtml(){
			$tableHtml = "<div class='container'><table class='table table-hover'>".
							"<tr>".
								"<th>ID</th>".
								"<th>Clave del Proyecto</th>".
								"<th>&nbsp;</th>".
								"<th>&nbsp;</th>".
							"</tr>";
			$registros = $this->read();
			 
			if ($registros->rowCount() > 0 ){
				while ($row = $registros->fetch(PDO::FETCH_ASSOC)){
					$tableHtml = $tableHtml.
						"<tr>".
							"<td>".$row['key_pro']."</td>".
							"<td>".$row['cve_pro']."</td>";
#update_usuario.php?id=".$row['key_pro']."
					$tableHtml = $tableHtml."<td><a href='?c=main&a=proyectNav' class='btn btn-primary pull-right'>Administrar</a></td></tr>";
				}
				$tableHtml = $tableHtml.'</table></div>';
				echo $tableHtml;
			}else {
				echo "";
			}
		}

		public function getUser(){			
			$sql = "Select key_user,nombre from usuario";
			$i = 0; 
			$resul = $this->consultarQuery($sql);
			$select = '<select class="form-control" multiple>';
			if ($resul->rowCount() > 0 ){
				while ($row = $resul->fetch(PDO::FETCH_ASSOC)){
					$i = $i + 1;
					$select = $select . "<option name='user' value='".$row['key_user']."'>".$row['nombre']."</option>";
				}
				$select = $select . '</select>';
				echo $select;
			}else {
				echo "";
			}
		}
	}
?>