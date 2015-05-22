<?php 
require("../../modelo/dbRegistro.php");
class registro extends dbRegistro{
	
	function RegistroUser($nombre,$apellido,$correo,$clave){
		if (isset($nombre) && isset($apellido) && isset($correo) && isset($clave)) {
			if (empty($nombre) && empty($apellido) && empty($correo) && empty($clave)) {
				echo "<script>alert('Hay campos vacios'); location.href='../../';</script>";
			}else{
				dbRegistro::dbRegistrarUser($nombre,$apellido,$correo,$clave);
				echo "<script>alert('Bienvenido'); location.href='../../';</script>";
			}
		}else{
			echo "<script>alert('Debe completar los campos'); location.href='../../';</script>";
		}
	}		

}
?>