<?php  
class conectarr{

	public static function conexionn(){


		try{

	//$conexion=new PDO('mysql:host=us-cdbr-east-05.cleardb.net; dbname=heroku_1f5ff059f1d7813','b99c4da36713e8','362d39c9');
	
	
	//mysql://be189203f0cc93:0f4fcad0@us-cdbr-east-06.cleardb.net/heroku_3a692436df94fce?reconnect=true

	//$conexion=new PDO('mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_3a692436df94fce','be189203f0cc93','191bdf26908897b');

	$conexion=new PDO('mysql:host = localhost; dbname=bar','root','');
	$conexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conexion->exec("SET CHARACTER SET UTF8");

	//mysql://b99c4da36713e8:362d39c9@us-cdbr-east-05.cleardb.net/heroku_1f5ff059f1d7813?reconnect=true




}catch(Exception $e){

	die("Error". $e->getmessage());
	echo "Linea del error".$e->getline();
}

return $conexion;






	}

	



}







?>