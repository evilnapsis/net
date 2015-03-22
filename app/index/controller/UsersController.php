<?php

/**
* 
*/
class UsersController extends Controller{
	public $default_view = "index";
	public $layout ;
	public $title = "IndexController";
	public $meta_charset = "";
	public $meta_description = "a";
	public $view_name = "";

	public function UsersController(){
		$this->layout = Layout::setLayout("layout-default");
	}

	public function indexView(){
		$this->title = "Se parte de DBuenComer!";

		Model::setSQL("select * from user");
		$this->usuarios = Model::getObjects();
		$this->view = View::setView("view-default");
	}

	/**
	* @function registerView
	* @brief Registrar los miembros en la base de datos
	**/
	public function registerView(){
		$this->noLayout();
		$user = UserModel::getByEmail($_GET["email"]);
		if($user==null){
			echo $sql="insert into user (name,lastname,email,password,created_at) value (\"$_POST[name]\",\"$_POST[lastname]\",\"$_POST[email]\",\"".sha1(md5($_POST["password"]))."\",NOW())";
			Model::setSQL($sql);
			Model::run();
			$user_id = Connection::getLastInsertedId();
			echo $sql="insert into profile (gender,day_of_birth,country_id,user_id,level_id) value (\"$_POST[gender]\",\"$_POST[day_of_birth]\",\"$_POST[country_id]\",$user_id,1)";
			Model::setSQL($sql);
			Model::run();
			setcookie("registred_success","true");
		}else{
			setcookie("user_exists","true");
		}
		
		R::go(array("m"=>"index","v"=>"index"));
	}

	/**
	* @function loginView
	* @brief Procesa el inicio de session de los miembros
	**/
	public function loginView(){
		$this->noLayout();
		Model::setSQL("select * from user where email=\"$_POST[email]\" and password=\"".sha1(md5($_POST["password"]))."\" limit 1");
		$members = Model::getArray();
		if(count($members)>0){
			$uid = 0;
			foreach ($members as $m) {
				$uid=$m["id"];
				break;
			}
			$_SESSION["user_id"]=$uid;
			Registry::set("logged_user_id",$_SESSION["user_id"]);
			R::go(array("m"=>"users","v"=>"view","uid"=>$_SESSION["user_id"]));

		}else{
			R::go(array("m"=>"index","v"=>"index"));
		}
	}

	public function homeView(){
		$this->user = UserModel::getById($_SESSION["user_id"]);
		$this->profile = $this->user->getProfile();
		$this->posts = PostModel::getAllByUserId($_SESSION["user_id"]);
		$this->view = View::setView("view-default");
	}

	public function editView(){
		$this->user = UserModel::getById($_SESSION["user_id"]);
		$this->profile = $this->user->getProfile();
		$this->view = View::setView("view-default");
	}

	public function viewView(){
		$this->is_logged = false;
		$this->is_me = false;
		$this->user = null;

		if(isset($_SESSION["user_id"])){ $this->is_logged=true; }

		if(isset($_SESSION["user_id"])){
		$this->user = UserModel::getById($_SESSION["user_id"]);
		if($this->user->id==$_GET["uid"]){
			$this->is_me=true;
		}
		}
		$this->person = UserModel::getById($_GET["uid"]);
		$this->profile = $this->person->getProfile();
		$this->posts = PostModel::getAllByUserId($_GET["uid"]);
		$this->view = View::setView("view-default");
	}


	public function publishView(){
		$this->noLayout();
//		print_r($_FILES);

    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/users/$_SESSION[user_id]/images/";
            	$handle->Process($url);
 // $handle->file_dst_name;
		$sql="insert into image (src,level_id,user_id,created_at) value (\"$handle->file_dst_name\",1,\"$_SESSION[user_id]\",NOW())";		
		Model::setSQL($sql);
		Model::run();

		$image_id = Connection::getLastInsertedId();
    		}


		$sql="insert into post (content,author_type_id,author_ref_id,receptor_type_id,receptor_ref_id,level_id,created_at) value (\"$_POST[content]\",1,\"$_SESSION[user_id]\",$_POST[receptor_type_id],\"$_POST[receptor_ref_id]\",1,NOW())";		
		Model::setSQL($sql);
		Model::run();
		$post_id = Connection::getLastInsertedId();
		$status = PostModel::getById($post_id);

       	if ($handle->uploaded) {
		$sql="insert into post_image (post_id,image_id) value ($post_id,$image_id)";		
		Model::setSQL($sql);
		Model::run();
		}

		// si el tipo de referencia, el usuario logeado y el receptor son el mismo ... entoncess vamos a pa pagina inicial
		// [se elimino la vista home]
		/*if($_POST["receptor_type_id"]==1&&$_SESSION["user_id"]==$_POST["receptor_ref_id"]){
			R::go(array("m"=>"users","v"=>"home"));
			}
		*/

		if($_POST["receptor_type_id"]==1){
			R::go(array("m"=>"users","v"=>"view","uid"=>$_POST["receptor_ref_id"]));
		}
		$author = $status->getUser()->getFullname();
		$content = $status->content;
echo <<<AAA

<div class="thumbnail">
      <div class="caption">

<!-- Single button -->
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle btn-xs " data-toggle="dropdown">
    <i class="fa fa-chevron-down"></i>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Editar</a></li>
    <li class="divider"></li>
    <li><a href="#">Eliminar</a></li>
  </ul>
</div>

      <h4 style="margin:0px;">$author</h4>
      <hr style="margin:5px;">
        <p>$content</p>
        <p><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-up"></i></a> <a href="#" class="btn btn-sm btn-default"><i class="fa fa-copy"></i></a></p>

<form role="form" id="status">
  <div class="form-group">
    <textarea rows="1" name="content" class="form-control" placeholder="Escribe un comentario"></textarea>
  </div>
</form>

      </div>
    </div><br>
AAA;


	}

	public function updatebasicView(){
		$this->noLayout();
//		print_r($_FILES);

    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/users/$_SESSION[user_id]/profile/";
            	$handle->Process($url);
 // $handle->file_dst_name;
		$sql="update profile set image= \"$handle->file_dst_name\" where user_id=".$_SESSION["user_id"];		
		Model::setSQL($sql);
		Model::run();

		$image_id = Connection::getLastInsertedId();
    		}
		R::go(array("m"=>"users","v"=>"edit"));
	}


	public function likeView(){
		$this->noLayout();
//		print_r($_FILES);
		$heart = HeartModel::getByType($_SESSION["user_id"],$_GET["t"],$_GET["pid"]);

		if($heart==null){
		$sql="insert into heart (type_id,ref_id,user_id,created_at) value ($_GET[t],$_GET[pid],$_SESSION[user_id],NOW())";		
		Model::setSQL($sql);
		Model::run();
		}else{
		$sql="delete from heart where type_id=$_GET[t] and ref_id=$_GET[pid] and user_id=$_SESSION[user_id]";		
		Model::setSQL($sql);
		Model::run();
		}
		echo HeartModel::countByType($_GET["t"],$_GET["pid"])->c;
	}

	public function friendView(){
		$this->noLayout();
//		print_r($_FILES);
		$friend = FriendModel::getFriend($_SESSION["user_id"],$_GET["fid"]);

		if($friend==null){
		$sql="insert into friend (sender_id,receptor_id,created_at) value ($_SESSION[user_id],$_GET[fid],NOW())";		
		Model::setSQL($sql);
		Model::run();
		}else{
		$sql="delete from heart where sender_id=$_SESSION[user_id] and receptor_id=".$_GET["fid"];		
		Model::setSQL($sql);
		Model::run();
		}
	}

	public function acceptView(){
		$this->noLayout();
//		print_r($_FILES);
		$friend = FriendModel::getById($_GET["id"]);

		if($friend!=null){
		$sql="update friend set is_accepted=1 where id=".$_GET["id"];		
		Model::setSQL($sql);
		Model::run();
		}
	}


	public function logoutView(){
		$this->noLayout();
		unset($_SESSION["user_id"]);
		Registry::delete("logged_user_id");
		Registry::delete("user");
		R::go(array("m"=>"index","v"=>"index"));
	}

	public function friendsView(){
		$this->is_logged = false;
		$this->is_me = false;
		$this->user = null;

		if(isset($_SESSION["user_id"])){ $this->is_logged=true; }

		if(isset($_SESSION["user_id"])){
		$this->user = UserModel::getById($_SESSION["user_id"]);
		if($this->user->id==$_GET["uid"]){
			$this->is_me=true;
		}
		}
		$this->person = UserModel::getById($_GET["uid"]);
		$this->profile = $this->person->getProfile();
		$this->posts = FriendModel::getAllByUserId($_GET["uid"]);

		$this->view = View::setView("view-default");
	}



}



?>