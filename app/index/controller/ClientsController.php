<?php

/**
* 
*/
class ClientsController extends Controller{
	public $default_view = "index";
	public $layout ;
	public $title = "IndexController";
	public $meta_charset = "";
	public $meta_description = "a";
	public $view_name = "";

	public function ClientsController(){
		$this->layout = Layout::setLayout("layout-default");
	}

	public function indexView(){
		$this->title = "Mi titulo";

		Model::setSQL("select * from user");
		$this->usuarios = Model::getObjects();

		$this->view = View::setView("view-default");
	}

	/**
	* @function registerView
	* @brief Registrar los clientes en la base de datos
	**/
	public function registerView(){
		$this->noLayout();
		$sql="insert into client (name,lastname,email,password) value (\"$_POST[name]\",\"$_POST[lastname]\",\"$_POST[email]\",\"".sha1(md5($_POST["password"]))."\")";
		Model::setSQL($sql);
		Model::run();
		R::go(array("m"=>"clients","v"=>"index"));
	}

	/**
	* @function loginView
	* @brief Procesa el inicio de session de los clientes
	**/
	public function loginView(){
		$this->noLayout();
		Model::setSQL("select * from client where email=\"$_POST[email]\" and password=\"".sha1(md5($_POST["password"]))."\" limit 1");
		$clients = Model::getArray();
		if(count($clients)>0){
			$uid = 0;
			foreach ($clients as $m) {
				$uid=$m["id"];
				break;
			}
			$_SESSION["client_id"]=$uid;
			Registry::set("logged_member_id",$_SESSION["member_id"]);
			R::go(array("m"=>"clients","v"=>"home"));

		}else{
			R::go(array("m"=>"clients","v"=>"index"));
		}
	}

	public function homeView(){
//		print_r($_SESSION);
		$this->view = View::setView("view-default");
	}

	public function logoutView(){
		$this->noLayout();
		unset($_SESSION["client_id"]);
		Registry::delete("logged_user_id");
		Registry::delete("user");
		R::go(array("m"=>"clients","v"=>"index"));
	}


}


?>