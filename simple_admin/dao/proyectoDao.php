<?php
	include_once 'dao/dao.php';
	/**
	 * 	@autor: 		Jorge Eduardo Arias Delgado						   
	 *	@Descripcion:	Clase para evitar la repeticion para el manejo de  
	 *					los datos 										   
	 * -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- 
	 *	@Bitacora:		Creacion - 29/03/2018 - jarias
	 *					Modificacion del manejo de la conexion, en una unica clase
	 */
	abstract class ProyectoDao extends Dao{
		/**
		* @Descipcion: Metodo generico para consultar datos de una tabla
		* @param type $value - Valor del campo a consultar
		* @param type $key - Valor de la llave primarya del dato a combiar
		* @return type Retorna la consulta a ejecutar 
		**/
		public function read(){
			$sql = null;
			$sql = "Select * from " . $this->table;
			
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
				$sql = "Select *  from ". $this->table." Where key_pro = ".$this->$value;
			}
			echo $sql;
			$resul = $this->consultarQuery($sql);
			$row = $resul->fetch();
			$this->keyPro = $row['key_pro'];
			$this->cvePro = $row['cve_pro'];
			$this->descPro = $row['desc_pro'];
		}

		public function update($value=''){
			$sql = "Update " . $this->table . " set ";
			$sql .= " cve_pro = ".$this->cvePro.", desc_pro = ".$this->descPro;

			if ($resul->ejecutarQuery($sql)) {
				return true;
			}else{
				return false;
			}
		}

		public function delete(){
			$sql = "Delete ".$this->table . "Where key_pro = ".$this->keyPro;

			if ($resul->ejecutarQuery($sql)){
				return true;
			}else{
				return false;
			}
		}

		public function insert(){
			$sql = "Insert into ".$this->table . 
					"(cve_pro,desc_pro) ".
					"Values ('".$this->cvePro."','".$this->descPro."')";

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
	}