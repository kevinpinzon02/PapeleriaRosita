<?php


/**
 * Clase Conexion
 *
 * Esta clase maneja la conexión a la base de datos utilizando PDO en PHP.
 */
 class Conexion {
	private $host = "localhost";
	private $user = "rosita";
	private $password = "123456";
	private $db = "papeleriarosita";
	private $conect;


/**
     * Constructor de la clase Conexion.
     *
     * Establece la conexión a la base de datos utilizando los parámetros de configuración.
     */
public function __construct(){

	$conectionSti= "mysql:hos=".$this->host.";dbname=".$this->db.";charset=utf8";

	try {
		$this->conect = new PDO($conectionSti,$this->user,$this->password); 
		$this->conect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		$this->conect ="Error de conexión";
		echo "erroR". $e->getMessage();
		
	}
}

/**
     * Método connect
     *
     * Retorna la conexión establecida a la base de datos.
     *
     * @return PDO La conexión establecida a la base de datos.
     */
public function connect(){
	return $this->conect;
}

}

?>