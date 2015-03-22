<?php

/// configurations
/// default module and view
Registry::set("modulename","index");
Registry::set("viewname","index");
// loading models


function __autoload($classname){
	$file = "app/index/model/".$classname.".php";
	if(file_exists($file)){
		include $file;
	}
}

// loading modules
$modules = array(
	"index"=>array("name"=>"index","controller"=>"IndexController"),
	"clients"=>array("name"=>"clients","controller"=>"ClientsController"),
	"users"=>array("name"=>"users","controller"=>"UsersController"),
	"search"=>array("name"=>"search","controller"=>"SearchController"),
	"item"=>array("name"=>"item","controller"=>"ItemController"),
	"post"=>array("name"=>"post","controller"=>"PostController")
	);

Module::setModules($modules);

?>