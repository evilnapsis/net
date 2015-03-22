<?php
class PostImageModel {
	public static $tablename = "post_image";

	public function PostImageModel(){
	}

	public function getImage(){ return ImageModel::getById($this->image_id); }


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new PostImageModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new PostImageModel());
	}

	public static function getAllByPostId($id){
		$sql = "select * from ".self::$tablename." where post_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new PostImageModel());
	}

}

?>