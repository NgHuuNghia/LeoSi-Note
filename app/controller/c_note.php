<?php
require_once('app/models/m_note.php');
require_once ('app/base/helper.php');
class c_note {
	function __construct ()	 {
		$this->note = new m_note();
	}
	function createNote($content){
		$token = helper::randomToken();
		$bool = $this->note->insertNote($content,$token);
		 if($bool){
		 	return $token;
		 }
	}
	function getContent($token){
		$content = $this->note->selectContent($token);
		return $content;
	}
}
?>