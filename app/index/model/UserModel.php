<?php
class UserModel {
	public static $tablename = "user";

	public function UserModel(){
	}

	public function getFullname(){ return $this->name." ".$this->lastname;}
	public function getProfile(){ return ProfileModel::getByUserId($this->id); }


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new UserModel());
	}

	public static function getByEmail($email){
		$sql = "select * from ".self::$tablename." where email=\"$email\"";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new UserModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new UserModel());
	}


}

?>