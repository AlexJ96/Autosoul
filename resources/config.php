<?php

class Config
{

	static $siteConfig;
	
	public static function read($var)
	{
		return self::$siteConfig[$var];
	}
	
	public static function write($var, $value)
	{
		self::$siteConfig[$var] = $value;
	}

}

Config::write("db.host", "localhost");
Config::write("db.name", "autosoul");
Config::write("db.user", "root");
Config::write("db.password", "");

?>