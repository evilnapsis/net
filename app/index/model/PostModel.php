<?php
class PostModel {
	public static $tablename = "post";

	public function PostModel(){
	}

	public function getUser(){ return UserModel::getById($this->receptor_ref_id);}
	public function getAuthor(){ return UserModel::getById($this->author_ref_id);}
	public function getReceptor(){ return UserModel::getById($this->receptor_ref_id);}
	public function getPIS(){ return PostImageModel::getAllByPostId($this->id);}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new PostModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new PostModel());
	}

	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where (author_type_id=1 and author_ref_id=$id) or (receptor_type_id=1 and receptor_ref_id=$id) order by created_at desc";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new PostModel());
	}

}

?>