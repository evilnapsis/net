<?php
class ImageModel {
	public static $tablename = "image";

	public function ImageModel(){
	}

	public function getFullpath(){ return "storage/users/".$this->user_id."/images/".$this->src;}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new ImageModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new ImageModel());
	}


}

?>