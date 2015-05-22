<?php 
/**
* Verifcacion el login
*/
require("dbConex.php");
class  dbverficacion_login extends conex{

/**************************
* VERIFICAICION DEL LOGIN
**************************/

	public $estado;
	public $correo;
	public $id;
	
	function dbverificacion($user,$pass){
		$Verif=mysql_query("select * from persona");
		while ($Dato=mysql_fetch_array($Verif)) {
			if ($Dato['correo'] == $user && $Dato['clave'] == $pass) {
				$this->estado="true";
				$this->correo=$Dato['correo'];
				$this->noA=$Dato['nombre']." ".$Dato['apellido'];
				$this->id=$Dato['id'];
				break;
			}else{
				$this->estado="false";
			}
		}
	}	

}
?>