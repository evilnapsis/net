<?php
class View {

	public function View(){}

	public static function setView($name){
		$folder ="app/".Registry::get("appname")."/modules/".Registry::get("modulename")."/view/".Registry::get("viewname"); 
		$file =$folder."/".$name.".php"; 
		if(file_exists($file)){
			return $file;
		}else{
			if(!is_dir($folder)){
				mkdir($folder,0667,true);
			}
			$f=fopen($file,"w");
			fwrite($f, "<div class=\"container\">\n");
			fwrite($f, "<div class=\"row\">\n");
			fwrite($f, "<div class=\"col-md-12\">\n");
			fwrite($f, "<h1>Archivo generado automaticamente por <b>Hikari Framework</b></h1>\n");
			fwrite($f, "</div>\n");
			fwrite($f, "</div>\n");
			fwrite($f, "</div>\n");

			fclose($f);
			
			return $file;
		}
	}

	
}
?>