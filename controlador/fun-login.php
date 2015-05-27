<?php 
/**
* 
*/
require("../../modelo/dblogin.php");
session_start();
class verficacion_login extends dbverficacion_login{
	
/**************************
* VERIFICAICION DEL LOGIN
**************************/

	function met_verficacion_login($user,$pass){
		dbverficacion_login::dbverificacion($user,$pass);
		if ($this->estado == "true") {
			$_SESSION['user']=$this->correo;
			$_SESSION['id']=$this->id;
			$_SESSION['NomApell']=$this->noA;
			$_SESSION['statud']='true';
			header("location:../../");
		}elseif ($this->estado == "false") {
			echo "<script>alert('El usuario o la contraseña esta incorrecta');location.href='../../';</script>";
		}else{
			echo "<script>alert('Debes ingresar el usuario y la contraseña');location.href='../../';</script>";
		}
	}	

}
?>