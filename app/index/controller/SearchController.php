<?php

/**
* 
*/
class SearchController extends Controller{
	public $default_view = "index";
	public $layout ;
	public $title = "SearchController";
	public $meta_charset = "";
	public $meta_description = "a";
	public $view_name = "";

	public function SearchController(){
		$this->layout = Layout::setLayout("layout-default");
	}

	public function resultsView(){
		$this->title = "Resultados de la Busqueda .:. DBuenComer";
		$this->results = ItemModel::getLike($_GET["q"]);
		$this->view = View::setView("view-default");
	}

}


?>