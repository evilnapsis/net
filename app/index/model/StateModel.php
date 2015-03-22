<?php
class StateModel {
	public static $tablename = "state";

	public function StateModel(){
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new StateModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new StateModel());
	}

	public static function getAllByCountryId($id){
		$sql = "select * from ".self::$tablename." where country_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new StateModel());
	}


}

?>