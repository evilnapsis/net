<?php
class ProfileModel {
	public static $tablename = "profile";

	public function ProfileModel(){
	}

	public function getUser(){ return UserModel::getById($this->user_id); }


	public static function getByUserId($id){
		$sql = "select * from ".self::$tablename." where user_id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new ProfileModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new ProfileModel());
	}


}

?>