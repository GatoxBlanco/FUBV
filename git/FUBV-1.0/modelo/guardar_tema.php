<?php 
/**
* 
*/
require("dbConex.php");
class dbTema extends conex{
	
	function dbTemaG($titulo,$pregunta,$persona){
		mysql_query("insert into tema(titulo,pregunta,id_persona) values('".$titulo."','".$pregunta."','".$persona."') ");
	}

	function dbGuardar_Comentario($comentario,$user,$idTema){
		mysql_query("insert into comentarios(comentario,id_persona,id_tema) values('".$comentario."','".$user."','".$idTema."') ");
	}

	function db__Guardar_lik($iduser,$lkTema){
		mysql_query("insert into persona_buen_tema(id_tema,id_persona) values('".$lkTema."','".$iduser."') ");
	}

	function db_Guardar_lik($iduser,$lkTema){
		mysql_query("insert into persona_mal_tema(id_tema,id_persona) values('".$lkTema."','".$iduser."') ");
	}	

}
?>