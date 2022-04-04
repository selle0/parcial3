<?php

class Connection{

	public $driver; 
	public $host; 
	public $user; 
	public $password; 
	public $database; 
	public $conn;  

	public function __construct(){

		$this->driver = "mysql";
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "";
		$this->database = "climas";

		$this->get_connection();

	}

		public function get_connection(){
		  $this->conn = new PDO($this->driver.":"."host=".$this->host.";"."dbname=".$this->database, $this->user, $this->password);

		  if (!$this->conn){

		  	echo "Error al conectar";
		  	
		  }
		  else{
		  	//echo "Conexion establecida";
		  }
		  
		}


	public function registro($Nombre,$Apellido,$Email,$Password){

		$sql = "CALL sp_registro(?,?,?,?)";
		$statement = $this->conn->prepare($sql);
        $statement->bindParam(1,$Nombre);
        $statement->bindParam(2,$Apellido);
		$statement->bindParam(3,$Email);
		$statement->bindParam(4,$Password);

		if($statement->execute()){
            $count=$statement->rowCount();

		if ($count) {
			$cookie_name = "registro";
			$cookie_value = "token";
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            return true;
            return "Registrado";
		}
		else{
            return false;
			return "ERROR";
		}
	} 


	

function login($Email,$Password){

	$sql = "CALL sp_login(?,?)";
	$statement = $this->conn->prepare($sql);

	$statement->bindParam(1,$Email);
	$statement->bindParam(2,$Password);


	if ($statement->execute()){
		
		$count=$statement->rowCount();

		if ($count) {
			$cookie_name = "sesion";
			$cookie_value = "token";
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			return true;
		}
		else{
			return false;
		}
	}
}}}
$obj = new Connection();