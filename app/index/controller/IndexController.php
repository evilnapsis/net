<?php

/**
* 
*/
class IndexController extends Controller{
	public $default_view = "index";
	public $layout ;
	public $title = "IndexController";
	public $meta_charset = "";
	public $meta_description = "a";
	public $view_name = "";

	public function IndexController(){
		$this->countries = CountryModel::getAll();
		$this->layout = Layout::setLayout("layout-default");
	}

	public function indexView(){
		$this->title = "InFlask NET .:. Social Platform";


		$this->view = View::setView("view-default");
	}

	public function otroView(){
		echo "Hola";
		$this->noLayout();
	}
}


?>