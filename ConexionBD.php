<?php
 class Conexion {
	private $host = "localhost";
	private $user = "rosita";
	private $password = "123456";
	private $db = "papeleriarosita";
	private $conect;



public function __construct(){

	$conectionSti= "mysql:hos=".$this->host.";dbname=".$this->db.";charset=utf8";

	try {
		$this->conect = new PDO($conectionSti,$this->user,$this->password); 
		$this->conect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "Se logro";
	} catch (Exception $e) {
		$this->conect ="Error de conexión";
		echo "erroR". $e->getMessage();
		
	}
}


public function connect()
{
	return $this->conect;
}


}

?>