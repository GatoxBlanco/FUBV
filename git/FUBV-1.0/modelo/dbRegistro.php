<?php 
/**
* 
*/
require("dbConex.php");
class dbRegistro extends conex{
	
	function dbRegistrarUser($nombre,$apellido,$correo,$clave){
		mysql_query("insert into persona(nombre,apellido,correo,clave) values('".$nombre."','".$apellido."','".$correo."','".$clave."') ");
	}
}
?>