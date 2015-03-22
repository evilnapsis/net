<?php
class FriendModel {
	public static $tablename = "friend";

	public function FriendModel(){
	}

	public function getSender(){ return UserModel::getById($this->sender_id); }



	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new FriendModel());
	}

	public static function getFriend($s,$r){
		$sql = "select * from ".self::$tablename." where (sender_id=$s and receptor_id=$r) or (receptor_id=$s and sender_id=$r) ";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new FriendModel());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new FriendModel());
	}

	public static function getAllByUserId($uid){
		$sql = "select * from ".self::$tablename." where receptor_id=$_SESSION[user_id] or sender_id=$_SESSION[user_id]";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new FriendModel());
	}


	public static function countMyPendings(){
		$sql = "select count(*) as c from ".self::$tablename." where receptor_id=$_SESSION[user_id] and is_accepted=0 and is_ignored=0";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new FriendModel());
	}

	public static function getMyPendings(){
		$sql = "select * from ".self::$tablename." where receptor_id=$_SESSION[user_id] and is_accepted=0 and is_ignored=0";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new FriendModel());
	}

	public static function getLast4Pendings(){
		$sql = "select * from ".self::$tablename." where receptor_id=$_SESSION[user_id] and is_accepted=0 and is_ignored=0 order by created_at desc limit 4";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new FriendModel());
	}


}

?>