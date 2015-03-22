<?php

/**
* 
*/
class PostController extends Controller{
	public $default_view = "index";
	public $layout ;
	public $title = "IndexController";
	public $meta_charset = "";
	public $meta_description = "a";
	public $view_name = "";

	public function IndexController(){
		$this->layout = Layout::setLayout("layout-default");
	}

	public function indexView(){
		$this->noLayout();
		$this->title = "Mi titulo";
		$this->view = View::setView("view-default");
	}

	public function holaView(){
		echo "Hola";
		$this->noLayout();
	}
}


?>