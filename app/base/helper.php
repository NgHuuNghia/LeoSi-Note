<?php
	/**
	 * Function suppport 
	 */
	class helper
	{
		
		function __construct()
		{
			# code...
		}
		public static function randomToken($lenght = 10 ){
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLenght = strlen($characters);
			$randomString = '';
			for ($i=0; $i < $lenght; $i++) { 
				$randomString.=$characters[rand(0,$charactersLenght-1)];
			}
			return $randomString;
		}
	}
?>