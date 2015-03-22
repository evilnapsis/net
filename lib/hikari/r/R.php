<?php

/**
* class R
* @brief tareas relacionadas con la obtencion y generacion de links
*/
class R
{
	public static function rlink($array_data){
		/// array format
		/// array("base"=>"index.php","module"=>"","view"=>"");
		$has_base=false;
		$base="";
		$has_module = false;
		$module="";
		$has_view = false;
		$view="";

		$extra = "";

		foreach ($array_data as $key => $value) {
			if($key=="b"){$has_base=true; $base=$value;}
			else if($key=="m"){$has_module=true;$module=$value;}
			else if($key=="v"){$has_view=true;$view=$value;}
			else{
				$extra .="&$key=$value";
			}
		}

		if($has_base&&$has_module&&$has_view){
			return $base."?r=".$module."/".$view.$extra;
		}else if($has_module&&$has_view){
			return Hikari::$base."?r=".$module."/".$view.$extra;
		}


	}

	public function go($array_data){
		/// array format
		/// array("base"=>"index.php","module"=>"","view"=>"");
		$url="";
		$has_base=false;
		$base="";
		$has_module = false;
		$module="";
		$has_view = false;
		$view="";

		$extra = "";

		foreach ($array_data as $key => $value) {
			if($key=="b"){$has_base=true; $base=$value;}
			else if($key=="m"){$has_module=true;$module=$value;}
			else if($key=="v"){$has_view=true;$view=$value;}
			else{
				$extra .="&$key=$value";
			}
		}

		if($has_base&&$has_module&&$has_view){
			$url= $base."?r=".$module."/".$view.$extra;
		}else if($has_module&&$has_view){
			$url= Hikari::$base."?r=".$module."/".$view.$extra;
		}

		if($url!=""){
			echo "<script>window.location='$url';</script>";
		}else{
			echo "Imposible redireccionar";
		}
	}
}
?>
