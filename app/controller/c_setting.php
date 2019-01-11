<?php
require_once('app/models/m_setting.php');
require_once ('app/base/helper.php');
class c_setting {
	function __construct ()	 {
		$this->setting = new m_setting();
	}
	function createSetting($color,$token){
		$bool = $this->setting->insertSetting($color,$token);
		 if($bool){
		 	return true;
		 }
	}
	function getColor($token){
		$color = $this->setting->selectColor($token);
		return $color;
	}
}
?>