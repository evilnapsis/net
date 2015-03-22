<?php
class CountryModel {
	public static $tablename = "country";

	public function CountryModel(){
	}

	public function getStates(){ return StateModel::getAllByCountryId($this->id);}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new CountryModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new CountryModel());
	}


}

?>