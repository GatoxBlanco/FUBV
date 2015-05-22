<?php 
/**
* 
*/
require("../../modelo/guardar_tema.php");
class tema extends dbTema{
	
	function Pregunta($titulo,$pregunta,$persona){
		// GUARDAR EL TEMA
		if (isset($titulo) && isset($pregunta) && isset($persona)) {
			if (empty($titulo) && empty($pregunta) && empty($persona)) {
				echo "<script>alert('Los campos estan vacios'); location.href='../../';</script>";
			}else{
				dbTema::dbTemaG($titulo,$pregunta,$persona);
				echo "<script>alert('Listo'); location.href='../../';</script>";
			}
		}else{
			echo "<script>alert('Los campos estan vacios'); location.href='../../';</script>";
		}
	}		

	function Guardar_comentario($comentario,$user,$idTema){
		if (isset($comentario) && isset($user) && isset($idTema)) {
			if (empty($comentario) && empty($user) && empty($idTema)) {
				echo "<script>alert('Los campos estan vacios'); location.href='../../';</script>";
			}else{
				dbTema::dbGuardar_Comentario($comentario,$user,$idTema);	
				echo "<script>alert('Listo'); location.href='../../';</script>";
			}
		}else{
			echo "<script>alert('Los campos estan vacios'); location.href='../../';</script>";
		}

	}

	function Guardar_lik($iduser,$lkTema,$like){
		if (empty($iduser) && empty($lkTema) && empty($like)) {
			echo "<script>alert('Los campos estan vacios'); location.href='../../';</script>";
		}else{
			if ($like == "+") {
				# code...
				dbTema::db__Guardar_lik($iduser,$lkTema);
				echo "<script>alert('Listo'); location.href='../../post.php?w=".$lkTema."';</script>";	
			}elseif ($like == "-") {
				# code...
				dbTema::db_Guardar_lik($iduser,$lkTema);
				echo "<script>alert('Listo'); location.href='../../post.php?w=".$lkTema."';</script>";	
			}
		}
	}

}
?>