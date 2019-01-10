<?php
require_once ('app/base/database.php');
class m_note extends database{
	function __construct(){
		parent:: __construct();
		$this->connect = $this->connect();
		$this->connection = $this->getConnection();
	}
	function insertNote($content,$token){
		$query = "INSERT INTO note (content,create_at,token) VALUES ( '$content',CURRENT_TIME(), '$token')";
		$this->connection->query($query);
		return true;
	}
	function selectContent($token){
		$query = "SELECT * FROM note WHERE token = '$token'";
		$result = $this->connection->query($query);
		$content = '';
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		    	$content= $row['content'];
		    }
		} 
		return $content;
	}
}
?>