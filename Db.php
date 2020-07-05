<?php

class Db
{
	private const HOST = 'localhost';
	private const USER = 'website';
	private const NAME = 'bardsongs';
	private const PASSWORD = '1';
	// define('DB_NAME', 'lisambik_ksp');
	// define('DB_USER', 'lisambik_ksp');
	// define('DB_PASSWORD', 'Lisa2020');

	private static PDO $db;
	
	private static function connect(){
		self::$db = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASSWORD);
		self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	}

	public static function getInstance() : PDO{
		if(!isset(self::$db)) {
			self::connect();
		}
		return self::$db;
	}


	private function __construct() {}
}