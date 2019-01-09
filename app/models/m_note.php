<?php
require_once ('app/base/database.php');
class m_note extends database{
	function __construct(){
		parent:: __construct();
		$this->connection = $this->getConnection();
		$this->connect = $this->connect();
		if($this->connect == true){
		echo 'Ket noi thanh cong';
		}
		else{
			echo 'ket noi that bai';
		}
	}
	function insertNote($content,$token){
		$query = "INSERT INTO note (content,create_at,token) VALUES ( '$content',CURRENT_TIME(), '$token')";
		$this->connection->query($query);
		return true;
	}
}
?>