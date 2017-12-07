<?php  

class DAO{

	private $dsn = 'mysql:host=localhost; port=3306;dbname=cpvilles;cherset=utf8';
	private static $username = 'app';
	private static $password = 'apppw';
	private static $_instance;

	public static function getInstance(){
		if(self::$instance != null){
			self::$_instance = new PDO(self::$dsn, self::$username, self::$password);
		}
		return self::$_instance;
	}

}

?>