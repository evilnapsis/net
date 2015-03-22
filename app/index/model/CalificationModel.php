<?php
class CalificationModel {
	public static $tablename = "calification";

	public function CalificationModel(){
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new CalificationModel());
	}

	public static function getByCI($c,$i){
		$sql = "select * from ".self::$tablename." where client_id=$c and item_id=$i";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new CalificationModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new CalificationModel());
	}

	public static function getAllByItemId($id){
		$sql = "select * from ".self::$tablename." where item_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new CalificationModel());
	}

}

?>