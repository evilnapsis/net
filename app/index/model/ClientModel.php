<?php
class ClientModel {
	public static $tablename = "client";

	public function ClientModel(){
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new ClientModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new ClientModel());
	}


}

?>