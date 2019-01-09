<?php
require_once('app/models/m_note.php');
class c_note {
	function __construct ()	 {
		$this->note = new m_note();
	}
	function createNote($content,$token){
		$bool = $this->note->insertNote($content,$token);
		return $bool;
	}
}
?>