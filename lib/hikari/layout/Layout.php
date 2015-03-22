<?php
class Layout {

	public function Layout(){}

	public static function setLayout($name){
		return "app/".Registry::get("appname")."/layout/".$name.".php";
	}

	
}
?>