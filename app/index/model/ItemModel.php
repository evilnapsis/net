<?php
class ItemModel {
	public static $tablename = "item";

	public function ItemModel(){
	}

	public function getDeal(){ return DealModel::getById($this->deal_id); }
	public function getKind(){ return KindModel::getById($this->kind_id); }


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::one($query,new ItemModel());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query[0],new ItemModel());
	}

	public static function getAllBymemberId($member_id){
		$sql = "select * from ".self::$tablename." where member_id=$member_id";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new ItemModel());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like \"%$q%\" or description like \"%$q%\"";
		Model::setSQL($sql);
		$query = Model::run();
		return Model::many($query,new ItemModel());
	}


}

?>