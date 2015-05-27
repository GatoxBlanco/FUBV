<?php 
/**
* 
*/
require("dbConex.php");
class dbInicio extends conex{
	
	public $POST_TODO;

	public $po_ne; 

	/****
	* VERIFICACIONES
	****/


	/****
	* INSERCION
	****/

	/****
	* MODIFICACION
	****/

	/******************
	** PUBLICA TODAS LAS PREGUNTAS
	***********/
	function dbPublicar_preguntar(){
		$Q_pregunta=mysql_query("select * from tema,persona where persona.id=tema.id_persona order by (tema.id) DESC ");
		while ($r_pregunta=mysql_fetch_array($Q_pregunta)) {
			echo "
				<div class='row'>
				<article>
					<a href='post.php?w=".$r_pregunta['0']."'><div class='cont'>
						<h2>".$r_pregunta['titulo']." - <small>
						".$r_pregunta['nombre']." ".$r_pregunta['apellido']."</small>
						</h2></a>
					</div>
				</article></div>";
		}
	}

	function dbPublicar_preguntar_simple(){
		$Q_pregunta_simple=mysql_query("select * from tema_simple,persona where persona.id=tema_simple.id_pers order by (tema_simple.id) DESC ");
		while ($r_pregunta_simple=mysql_fetch_array($Q_pregunta_simple)) {
			echo "
				<div class='row'>
				<article>
					<a href='post_simple.php?w=".$r_pregunta_simple['0']."'><div class='cont'>
						<h2>".$r_pregunta_simple['titulo']." - <small>
						".$r_pregunta_simple['nombre']." ".$r_pregunta_simple['apellido']."</small>
						</h2></a>
					</div>
				</article></div>";
		}
	}	


	/******************
	** MUESTRA LA PREGUNTAS
	***********/
	function dbPost($DBpost){
		$Q_POST=mysql_query("select * from tema,persona where tema.id='".$DBpost."' and persona.id=tema.id_persona ");
		while ($roPOST=mysql_fetch_array($Q_POST)) {
			$this->POST_TODO=array('titulo' => $roPOST['titulo'],
							   'pregunta'=> $roPOST['pregunta'],
							   'nombreuser' => $roPOST['nombre']." ".$roPOST['apellido']);
		}
	}

	/******************
	** MUESTRA LA PREGUNTAS
	***********/
	function dbPost_simple($DBpost){
		$Q_POST=mysql_query("select * from tema_simple,persona where tema_simple.id='".$DBpost."' and persona.id=tema_simple.id_pers ");
		while ($roPOST_simple=mysql_fetch_array($Q_POST)) {
			$this->POST_TODO=array('titulo' => $roPOST_simple['titulo'],
							   'op_uno'=> $roPOST_simple['option_uno'],
							   'id'=> $DBpost, ## del pos que estamos utilizando
							   'op_dos'=> $roPOST_simple['option_dos'],
							   'nombreuser' => $roPOST_simple['nombre']." ".$roPOST_simple['apellido']);
		}
	}	

	/******************
	** ME DA LOS ME GUSTA Y LOS NO ME GUSTA
	***********/
	function dbmasYmenoTema($temaMN){
		$MalTema=mysql_query("select * from persona_mal_tema where id_tema='".$temaMN."' ");
		$BuenTema=mysql_query("select * from persona_buen_tema where id_tema='".$temaMN."' ");

		echo "
		<div class='row text-center pa_menu'>
			<h3>Da tu Comentario</h3>
			<div class='col-md-6'> <b class='signo'>-</b><br> ".mysql_num_rows($MalTema)."</div>
			<div class='col-md-6'><b class='signo'>+</b><br> ".mysql_num_rows($BuenTema)."</div>
		</div>";
	}
	/******************
	** PARA QUE DE COMENTARIO
	***********/
	function dbcomentar_user($comentar,$id_p){
		mysql_query("insert into comentarios(comentario,id_persona) values('".$comentario."','".$id_p."') ");
	}


/*****************************
*	MUESTRE LOS COMENTARIOS
*	DE LOS USUARIO
*****************************/
	function dbcomentarios($tema){
		$QueToCOmentario=mysql_query("select * from comentarios,persona where id_tema='".$tema."' and persona.id=comentarios.id_persona");
		while ($roCo = mysql_fetch_array($QueToCOmentario)) {
			echo "<div class='row pa_menu'>
					<h3>".$roCo['nombre']." ".$roCo['apellido']."</h3>
					<p>". $roCo['comentario']."</p>
				 </div>";
		}
	}

	/******************
	** los temas populares
	***********/
	function dbPopular($tema){
		$QueTemaPop=mysql_query("select * from persona_buen_tema,tema where tema.id=persona_buen_tema.id_tema ");
		echo '<div class="containe"> <div class="col-md-8">';
		while ($popul = mysql_fetch_array($QueTemaPop)) {
			echo "
				<article>
					<div class='col-md-12'>
						<a href='post.php?w=".$popul['0']."'><div class='cont'>
						<h2>".$popul['titulo']." - <small>
						".$popul['nombre']." ".$popul['apellido']."</small>
						</h2><p>".$popul['titulo']."</p>
						</div></a>
					</div>
				</article>";
		}
		echo "</div>";	
	}


	/******
	*
	**********/
	function db_po_ma($tema_sim){
		
		$MalTema_simple_po_ne=mysql_query("select * from tema_simple_ma where idTema='".$tema_sim."' ");
		$BuenTema_simple_po_ne=mysql_query("select * from tema_simple_po where idTema='".$tema_sim."' ");

		$this->po_ne = array(	
				"po"=>mysql_num_rows($BuenTema_simple_po_ne),
				"ma"=>mysql_num_rows($MalTema_simple_po_ne) );
	}

}
?>