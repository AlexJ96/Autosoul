<?php

require_once(dirname(__FILE__) . "/../config.php");

class Core
{
	
	public 			$conn;
	private static 	$instance;
	
	private function __construct()
	{
		$this->conn = new PDO("mysql:host=" . Config::read("db.host") . ";dbname=" . Config::read("db.name"), Config::read("db.user"), Config::read("db.password"));
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	public static function GetInstance()
	{
		if(!isset(self::$instance))
		{
			$object = __CLASS__;
			self::$instance = new $object;
		}
		
		return self::$instance;
	}
}

?>