<?php
class HeartModel {
	public static $tablename = "heart";

	public function HeartModel(){
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new HeartModel());
	}

	public static function countByPostId($id){
		$sql = "select count(*) as c from ".self::$tablename." where type_id=2 and ref_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new HeartModel());
	}

	public static function countByType($t,$id){
		$sql = "select count(*) as c from ".self::$tablename." where type_id=$t and ref_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new HeartModel());
	}

	public static function getByUPtoPost($u,$p){
		$sql = "select * from ".self::$tablename." where type_id=2 and ref_id=$p and user_id=$u";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new HeartModel());
	}

	public static function getByType($u,$t,$r){
		$sql = "select * from ".self::$tablename." where type_id=$t and ref_id=$r and user_id=$u";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new HeartModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new HeartModel());
	}

	public static function getAllByPostId($id){
		$sql = "select * from ".self::$tablename." where post_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new HeartModel());
	}


}

?>