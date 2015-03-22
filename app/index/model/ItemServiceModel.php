<?php
class ItemServiceModel {
	public static $tablename = "item_service";

	public function ItemServiceModel(){
	}

	public function getService(){ return ServiceModel::getById($this->service_id); }


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new ItemServiceModel());
	}

	public static function getByIS($i,$s){
		$sql = "select * from ".self::$tablename." where item_id=$i and service_id=$s";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new ItemServiceModel());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new ItemServiceModel());
	}

	public static function getAllByItemId($id){
		$sql = "select * from ".self::$tablename." where item_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new ItemServiceModel());
	}


}

?>