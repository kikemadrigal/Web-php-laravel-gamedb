<?php
include_once("env.php");
class MysqliClient{
	private $servidor;
	private $usuario;
	private $password;
	private $base_de_datos;
	private $resultado;
	private $mysqli_result;
	public $msqli;

	public function __construct(){
		$this->servidor=SERVER;
		$this->usuario=USER;
		$this->password=PASSWORD;
		$this->base_de_datos=DATABASE;


	}
	/* Realliza la conexión a la base de datos */
	public function conectar_mysql(){
        	$this->msqli = new mysqli($this->servidor, $this->usuario, $this->password,$this->base_de_datos);
        	$this->msqli->query("SET NAMES 'utf8'");
			//$this->mysqli_result=new mysqli_result();
			if($this->msqli->connect_errno){
				echo "<p>Error al conectar con el servidor.</p>";
				//die (“ERROR AL CONECTAR MYSQL”);
			}

	}

	public function getMysqliObject(){
		return $this->msqli;
	}

	public function getTables(){
		$tables=array();
		$resultado = $this->msqli->query("SHOW TABLES");
		while ($linea = mysqli_fetch_array($resultado)) 
		{
			$tables[]= $linea[0];
			//echo $linea[0]."<br>";
		}
		return $tables;
	}

	/*metodo para ejecutar una secuencia sql*/
	public function ejecutar_sql($sql){
		//envía una única consulta a la base de datos actualmente activa en el servidor 
		$this->resultado=$this->msqli->query($sql);
		if (!$this->resultado) {
			echo "<p>Error al ejecutar la consulta</p>";
		}
		return $this->resultado;
	}
	//Desconectar y liberar
	public function desconectar(){
		//$this->resultado->free();
		$this->msqli->close();
		
	}
	
		
	
	


}

?>