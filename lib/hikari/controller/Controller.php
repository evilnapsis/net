<?php
class Controller {

	public $no_layout;
	public $view;
	public $appname;

	public function Controller(){}

	public function renderView(){
		if($this->view!=""&&file_exists($this->view)){
				include $this->view; 
			}
	}

	public function renderLayout(){
		if(!$this->no_layout){
				include $this->layout; 
			}
	}
	
	public function noLayout(){
		$this->no_layout=true;
	}

}
?>