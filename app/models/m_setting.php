<?php
require_once ('app/base/database.php');
class m_setting extends database{
	function __construct(){
		parent:: __construct();
		$this->connect = $this->connect();
		$this->connection = $this->getConnection();
	}
	function insertSetting($color,$token){
		$query = "INSERT INTO setting (text_color,token) VALUES ( '$color', '$token')";
		$this->connection->query($query);
		return true;
	}
	function selectColor($token){
		$query = "SELECT * FROM setting WHERE token = '$token'";
		$result = $this->connection->query($query);
		$color = '';
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		    	$color= $row['text_color'];
		    }
		} 
		return $color;
	}
}
?>