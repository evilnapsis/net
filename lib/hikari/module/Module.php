<?php

/**
* 
*/
class Module
{
	public static $default_module = "index";
	public static $modules;
	public static function  load($name)
	{
		$module = null;
		foreach (self::$modules as $key => $value) {
			if($name==$key){
				$module = $value;;
			}
		}
		return $module;
					
	}

	public static function getDefault(){
		return self::$modules[self::$default_module];
	}

	public static function setModules($modules){
		self::$modules = $modules;
	}
}

?>