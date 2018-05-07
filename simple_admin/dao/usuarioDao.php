<?php
	include_once 'dao/dao.php';
	/**
	 * @autor: Jorge Eduardo Arias Delgado
	 * @Descripcion: Clase para el manejo de los datos 
	 * 
	 */
	abstract class UsuarioDao extends Dao{
	    
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
				$sql = "Select *  from ". $this->table." Where key_user = ".$value;
			}

			$resul = $this->consultarQuery($sql);
			$row = $resul->fetch();
			$this->setKeyUser($row['key_user']);
			$this->setApePat($row['ape_pat']);
			$this->setApeMat($row['ape_mat']);
			$this->setNombre($row['nombre']);
			$this->setUsername($row['username']);
			$this->setPass($row['pass']);
			$this->setEmail($row['email']);
		}

		public function update($value=''){
			$sql = "Update " . $this->table . " set ";
			$sql .= " username =".$this->username.", pass=".$this->pass ;

			if ($resul->ejecutarQuery($sql)) {
				return true;
			}else{
				return false;
			}
		}

		public function delete($pValue , $pKey = null){
			if (is_null($pKey)) {
				$pKey = $this->primaryKey;
			}
			$sql = "Delete ".$this->table . "Where key_user = ".$this->keyUser;

			if ($this->ejecutarQuery($sql)){
				return true;
			}
			return false;
				
		}

		public function insert(){
			$query = "Insert into ".$this->table . 
					"(ape_pat,ape_mat,nombre,username,pass,email) ".
					"Values ('".$this->apePat."','".$this->apeMat."','".$this->nombre."'"
					.",'".$this->username."','".$this->pass."','".$this->email."')";
			echo $query;
			if ($this->ejecutarQuery($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function gridHtml(){
			$tableHtml = "<div class='container'>"
							."<table class='table table-striped'>".
								"<tr>".
									"<th>ID</th>".
									"<th>Nombre</th>".
									"<th>Apellido Materno</th>".
									"<th>Apellido Paterno</th>".
									"<th>Nombre de Usuario</th>".
									"<th>Correo Eletronico</th>".
									"<th>&nbsp;</th>".
									"<th>&nbsp;</th>".
								"</tr>";
			$registros = $this->read();
			 
			if ($registros->rowCount() > 0 ){
				while ($row = $registros->fetch(PDO::FETCH_ASSOC)){
					$tableHtml = $tableHtml.
									"<tr>".
										"<td>".$row['key_user']."</td>".
										"<td>".$row['nombre']."</td>".
										"<td>".$row['ape_pat']."</td>".
										"<td>".$row['ape_pat']."</td>".
										"<td>".$row['username']."</td>".
										"<td>".$row['email']."</td>";

					$tableHtml = $tableHtml."<td><a href='leer_usuario.php?key_user=".$row['key_user']
											."'class='btn btn-success left-margin'>"
											."<span class='glyphicon glyphicon-edit'></span>Leer</a></td>"
									."</tr>";
				}
				$tableHtml = $tableHtml.'</table></div>';
				echo $tableHtml;
			}else {
				echo "";
			}
		}

		public function validarUsuario(){
			//session_start();
			$username = $this->username;
			$pass = $this->pass;
			$sql = "Select * from usuario Where username = '".$username . "'";
			
			$resul = $this->consultarQuery($sql);

			if ($resul->rowCount() > 0) {
				$row = $resul->fetch();
				$passHasd = password_hash($row['pass'],PASSWORD_DEFAULT);
				if (password_verify($pass,$passHasd)) {
					$_SESSION['loggedin'] = true;
				    $_SESSION['username'] = $username;
				    $_SESSION['start'] = time();
				    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                    return true;
					//header("Location: ?c=main&a=main");
					
				} else {
				    return false;
					//header("Location: ?c=usuario&a=loginUser");
					//echo "<h1 class='test-info'>El usuario o contraseña son incorrecta</h1>";
			 	}
			 }
		}

		public function enviarEmail($pNombre,$pEmail){
			$destinatario = $pEmail; 
			$asunto = "Bienvenido a SimpleAdmin"; 
			$cuerpo = ' 
				<html> 
				<head> 
					<title>Bienvenido</title> 
				</head> 
				<body> 
				<h1>Hola '.$pNombre.'!</h1> 
				<p>Me da mucho gusto darte la bienvenida a esta gran comunidad.</p>
				<br><br><br>
				<p>Nota: No contestar este correo.</p>
				</body> 
				</html> 
				'; 

			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

			//dirección del remitente 
			$headers .= "From: ".$pNombre." <".$pEmail.">\r\n"; 

			mail($destinatario,$asunto,$cuerpo,$headers);
		}
	}
?>