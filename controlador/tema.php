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


	function tema_simple($titulo,$pos,$neg,$id_user){
		#PARA QUE GUARDE EL TEMA SIMPLE
		if (empty($titulo) && empty($pos) && empty($neg)) {
			echo "<script>alert('Los campos estan vacios'); location.href='../../pregunta_simple.php';</script>";
		}else{
			dbTema::db_tema_simple($titulo,$pos,$neg,$id_user);
			echo "<script>alert('Listo'); location.href='../../pregunta_simple.php';</script>";	
		}
	}

	function g_tema_Simple_P_M($idTema,$resul,$user){
	
		#PARA QE GUARDE LOS POSITIVOS Y NEGATIVOS
		if ($resul == "po") {
			# Positivo
			$table="tema_simple_po";
			dbTema::guardar_simple_po_ne($idTema,$user,$table);
		}elseif ($resul == "ne") {
			# negativo.
			$table="tema_simple_ma";
			dbTema::guardar_simple_po_ne($idTema,$user,$table);
		}
		echo "<script>alert('Listo');location.href='../../post_simple.php?w=".$idTema."';</script>";
	}	
}
?>