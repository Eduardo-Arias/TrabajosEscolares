<?php
	class DataBase{
		// Variables para el manejo de la conexion
		private static $intance = null;
		private $host = null;
		private $dataBase = null;
		private $user = null;
		private $password = null;
		private $con = null;
	
	/*
	 * Metodo para leer el archivo de configuracion XML a la base de datos
	 */
		private function readXML(){
			// Archivo xml que contiene los datos de conexión
			$xmlFile = __DIR__."/datosConexion.xml";
			if (file_exists($xmlFile)){
				$xml = simplexml_load_file($xmlFile);
			}else{
				exit('Fallo al abrir el archivo configuracion.xml');
			}
			$this->host = $xml->mysql[0]->host;
			$this->dataBase = $xml->mysql[0]->database;
			$this->user = $xml->mysql[0]->user;
			$this->password = $xml->mysql[0]->password;

		} // end function ReadXML
		
		/*
		 * @Contructor de la clase
		 */
		private function __construct(){
			try{
				// Carga los datos de la conexión a la BD
				$this->readXML();
				$this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->dataBase,
    									 $this->user,$this->password);
			}catch (PDOException $e){
				echo 'No se a podido generar la conexión con la base de datos '.$e->getMessage();
			}
			
		} // End function Construct
		
		/*
		 * Método estatico que regresa la unica instancia de la clase
		 * @return type Objeto de la base
		 */
		public static function getInstance(){
			if (!(self::$intance instanceof DataBase)){
				self::$intance = new DataBase();
			}
			return self::$intance;
		} // End function getInstance
		
		/*
		 * Extrae la conexion de la BD
		 * @return type Connection
		 */
		public function getConnection(){
			return $this->con;
		} // End function getConnection
	}
?>