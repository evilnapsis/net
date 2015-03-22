<?php

/**
* 
*/
class Model
{
	public static $sql;
	public static function select($name=""){

		$con = Connection::getConnection();

	}
	public static function setSQL($sql){
		self::$sql=$sql;

	}

	public static function run(){
		$con = Connection::getConnection();
		return $con->query(self::$sql);
	}

	public static function getArray(){
		$con = Connection::getConnection();
		$data = array();
		$query = $con->query(self::$sql);
		while ($r=$query->fetch_array()) {
			$data[]=$r;
		}
		return $data;
	}

	public static function getObjects(){
		$con = Connection::getConnection();
		$data = array();
		$query = $con->query(self::$sql);
		while ($r=$query->fetch_object()) {
			$data[]=$r;
		}
		return $data;
	}
	public static function many($query,$aclass){
		$cnt = 0;
		$array = array();

		while($r = $query->fetch_array()){
			$array[$cnt] = new $aclass;
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0 && $cnt2%2==0){ 
					$array[$cnt]->$key = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
	}
	//////////////////////////////////
	public static function one($query,$aclass){
		$cnt = 0;
		$found = null;
		$data = new $aclass;
		while($r = $query->fetch_array()){
			$cnt=1;
			foreach ($r as $key => $v) {
				if($cnt>0 && $cnt%2==0){ 
					$data->$key = $v;
				}
				$cnt++;
			}

			$found = $data;
			break;
		}
		return $found;
	}

}


?>