<?php
class Connection {

	public static $db;
	public static $con;
	function Connection(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="net";
//		$this->user="projecti_dbx";$this->pass="l00lapal00za";$this->host="localhost";$this->ddbb="projecti_dbx";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		$con->set_charset("utf8");
		return $con;
	}

	public static function getConnection(){
		if(self::$con==null && self::$db==null){
			self::$db = new Connection();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}

	public static function getLastInsertedId(){
		return self::getConnection()->insert_id;
	}
	
}
?>
