<?php
	//require 'config/dataBase.php';
	include_once 'dao/dao.php';

	/**
	 * 	@autor: 		Jorge Eduardo Arias Delgado						   
	 *	@Descripcion:	Clase para evitar la repeticion para el manejo de  
	 *					los datos 										   
	 * -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- - -- 
	 *	@Bitacora:		Creacion - 29/03/2018 - jarias
	 */
	abstract class ActividadDetDao extends Dao {
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
				$sql = "Select *  from ". $this->table." Where key_act_mov = ".$value;
			}
			echo $sql;

			$resul = $this->consultarQuery($sql);
			$row = $stmt->fetch();
			$this->keyActMov = $row['key_act_mov'];
			$this->KeyUser = $row['fk_user'];
			$this->KeyAct = $row['fk_act'];
			$this->KeyPro = $row['fk_act'];
			$this->fechaIni = $row['fecha_ini'];
			$this->fechaFin = $row['fecha_fin'];
		}

		public function update($value=''){
			$sql = "Update " . $this->table . " set ";
			$sql .= "fk_user = ".$this->KeyUser.", estatus = ".$this->estatus;
			$sql .= " Where fk_act = ".$this->keyAct;
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
					"(fk_user,fk_act,fk_pro,fecha_ini,fecha_fin,estatus) ".
					"Values (".$this->KeyUser.",".$this->keyAct.",".$this->keyPro.","
							  .$this->fechaIni.",".$this->fechaFin.",'".$this->estatus."')";
					echo $sql;

			if ($this->ejecutarQuery($sql)) {
				return true;
			}else{
				return false;
			}
		}

		/*public function gridHtml(){
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
		}*/

		
	}
?>