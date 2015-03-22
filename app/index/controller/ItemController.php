<?php

/**
* 
*/
class ItemController extends Controller{
	public $default_view = "index";
	public $layout ;
	public $title = "IndexController";
	public $meta_charset = "";
	public $meta_description = "a";
	public $view_name = "";

	public function ItemController(){
		$this->layout = Layout::setLayout("layout-default");
	}

	public function indexView(){
		$this->noLayout();
		$this->title = "Mi titulo";
		$this->view = View::setView("view-default");
	}

	public function newView(){
		$this->title = "DBuenComer .:. Agregar nuevo elemento";
		$this->kinds = KindModel::getAll();
		$this->zones = ZoneModel::getAll();
		$this->cusines = CusineModel::getAll();
		$this->prices = PriceModel::getAll();
		$this->countries = CountryModel::getAll();
		$this->services = ServiceModel::getAll();

		$this->view = View::setView("view-default");
	}

	/**
	* @function addView
	* @brief Agrega elementos a la base de datos
	**/
	public function addView(){
		$this->noLayout();
		$sql="insert into item (kind_id,title,description,city,ext_num,int_num,cp,phone,phone2,phone3,website,fburl,twurl,gpurl,email,deal_id,member_id,cusine_id,zone_id,state_id,price_id) value (\"$_POST[kind_id]\",\"$_POST[title]\",\"$_POST[description]\",\"$_POST[city]\",\"$_POST[ext_num]\",\"$_POST[int_num]\",\"$_POST[cp]\",\"$_POST[phone]\",\"$_POST[phone2]\",\"$_POST[phone3]\",\"$_POST[website]\",\"$_POST[fburl]\",\"$_POST[twurl]\",\"$_POST[gpurl]\",\"$_POST[email]\",1,$_SESSION[member_id],$_POST[cusine_id],$_POST[zone_id],$_POST[state_id],$_POST[price_id])";
		Model::setSQL($sql);
		Model::run();

		$item_id=Connection::getLastInsertedId();

		if(count($_POST["services"])>0){
			foreach($_POST["services"] as $s=>$v){
		$sql="insert into item_service (item_id,service_id) value ($item_id,$v)";
		Model::setSQL($sql);
		Model::run();
	
			}
		}

		R::go(array("m"=>"item","v"=>"admin","itid"=>$item_id));
	}


	/**
	* @function editView
	* @brief Muestra el formulario de edicion de un elemento en la base de datos
	**/
	public function editView(){
		$this->item = ItemModel::getById($_GET["itid"]);
		$this->title = "DBuenComer .:. Editar elemento";
		$this->kinds = KindModel::getAll();
		$this->zones = ZoneModel::getAll();
		$this->cusines = CusineModel::getAll();
		$this->prices = PriceModel::getAll();
		$this->countries = CountryModel::getAll();
		$this->services = ServiceModel::getAll();

		$this->view = View::setView("view-default");
	}

	/**
	* @function adminView
	* @brief habilita la vista de administracion de un elemento
	**/
	public function adminView(){
		$this->item = ItemModel::getById($_GET["itid"]);
		$this->title = $this->item->title;

		$this->view = View::setView("view-default");
	}


	/**
	* @function viewView
	* @brief carga la informacion de un elemento
	**/
	public function viewView(){
		$this->item = ItemModel::getById($_GET["itid"]);
		$this->services = ItemServiceModel::getAllByItemId($_GET["itid"]);
		$this->title = $this->item->title." .:. DBuenComer";
		$this->view = View::setView("view-default");
	}
	/**
	* @function qualifyView
	* @brief Agrega una calificacion al elemento
	**/
	public function qualifyView(){
		$this->noLayout();
		$cal = CalificationModel::getByCI($_SESSION["client_id"],$_POST["item_id"]);
		if($cal==null){
		
				$sql="insert into calification (food,service,price,comment,item_id,client_id) value (\"$_POST[food]\",\"$_POST[service]\",\"$_POST[price]\",\"$_POST[comment]\",\"$_POST[item_id]\",$_SESSION[client_id])";
				Model::setSQL($sql);
				Model::run();
				setcookie("qualified","true");
			}else{
				setcookie("isqualified","true");

			}
///		R::go(array("m"=>"item","v"=>"view","itid"=>$_POST["item_id"]));
	}

	/**
	* @function qualifyView
	* @brief Agrega una calificacion al elemento
	**/
	public function calificationsView(){
		$this->califications = CalificationModel::getAllByItemId($_GET["itid"]);
		$this->view = View::setView("view-default");
	}

	public function updateView(){
		$this->noLayout();

		$sql = "delete from item_service where item_id=$_POST[item_id]";
		Model::setSQL($sql);
		$query = Model::run();


		if(count($_POST["services"])>0){
			foreach($_POST["services"] as $s=>$v){
		$sql="insert into item_service (item_id,service_id) value ($_POST[item_id],$v)";
		Model::setSQL($sql);
		Model::run();
	
			}
		}
		R::go(array("m"=>"item","v"=>"edit","itid"=>$_POST["item_id"]));


	}


}


?>