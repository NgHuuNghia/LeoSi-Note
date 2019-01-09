<?php
require_once ('app/config/const.php');
class database {
	private $database_host ;
	private $database_name;
	private $user_name;
	private $password; 
	function __construct(){
		$this->database_host = DATABASE_HOST;
		$this->database_name = DATABASE_NAME;
		$this->user_name = USER_NAME;
		$this->password = PASSWORD;
	}
	public function getConnection(){
			$this->connection = mysqli_connect($this->database_host,$this->user_name,$this->password,$this->database_name);
			return $this->connection;
		}
	public function connect(){
		$this->connected = false;
		$this->connection = mysqli_connect($this->database_host,$this->user_name,$this->password,$this->database_name);
		if($this->connection  !== false){
			$this->connected = true;
		}
		return $this->connected;
	}
	public function disconnect(){
		if($this->connection == true){
		@mysqli_free_result($this->results);
		$this->connected = !@mysqli_close($this->connection);
		return !$this->connected;
		}
	} 
}

?>