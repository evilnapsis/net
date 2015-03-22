<?php
class Registry {

	private static $properties = array();

	public static function delete($k){
		unset(self::$properties[$k]);
	}


	public static function set($k,$v){
		self::$properties[$k] = $v;
	}

	public static function get($k){
		return self::$properties[$k];
	}

}
?>