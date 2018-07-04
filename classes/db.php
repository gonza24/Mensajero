<?php 

class Db{

	private $host = "localhost";
	private $dbname = "mensajero";
	private $username = "root";
	private $password = "";
	protected $con;

	public function __construct(){

		try{
			//new PDO("mysql:host=localhost;dbname=mensajero","root", "");
			$this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username,$this->password);
		}
		catch(Exception $e){
			echo "Problema de coneccion en la Base de Datos: ".$e->getMessage();
		}
	}
}