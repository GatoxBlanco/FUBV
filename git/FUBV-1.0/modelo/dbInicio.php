<?php 
/**
* 
*/
require("dbConex.php");
class dbInicio extends conex{
	
	public $POST_TODO;

	function dbPublicar_preguntar(){
		$Q_pregunta=mysql_query("select * from tema,persona where persona.id=tema.id_persona order by (tema.id) DESC ");
		echo '<div class="col-md-8">';
		while ($r_pregunta=mysql_fetch_array($Q_pregunta)) {
			echo "
				<article>
					<div class='col-md-12'>
						<a href='post.php?w=".$r_pregunta['0']."'><div class='cont'>
						<h2>".$r_pregunta['titulo']." - <small>
						".$r_pregunta['nombre']." ".$r_pregunta['apellido']."</small>
						</h2><p>".$r_pregunta['titulo']."</p>
						</div></a>
					</div>
				</article>";
		}
		echo "</div>";
	}

	function dbPost($DBpost){
		$Q_POST=mysql_query("select * from tema,persona where tema.id='".$DBpost."' and persona.id=tema.id_persona ");
		while ($roPOST=mysql_fetch_array($Q_POST)) {
			$this->POST_TODO=array('titulo' => $roPOST['titulo'],
							   'pregunta'=> $roPOST['pregunta'],
							   'nombreuser' => $roPOST['nombre']." ".$roPOST['apellido']);
		}
	}

	function dbmasYmenoTema($temaMN){
		$MalTema=mysql_query("select * from persona_mal_tema where id_tema='".$temaMN."' ");
		$BuenTema=mysql_query("select * from persona_buen_tema where id_tema='".$temaMN."' ");

		echo "<div class='col-md-12'>
				<div class='col-md-6' style='background-color: #E51111;'> <b class='signo'>-</b><br> ".mysql_num_rows($MalTema)."</div>
				<div class='col-md-6' style='background-color: #00DC3A;'><b class='signo'>+</b><br> ".mysql_num_rows($BuenTema)."</div>
			  </div>";
	}

	function dbcomentar_user($comentar,$id_p){
		mysql_query("insert into comentarios(comentario,id_persona) values('".$comentario."','".$id_p."') ");
	}


/*****************************
*	MUESTRE LOS COMENTARIOS
*	DE LOS USUARIO
*****************************/
	function dbcomentarios($tema){
		$QueToCOmentario=mysql_query("select * from comentarios,persona where id_tema='".$tema."' and persona.id=comentarios.id_persona ");
		while ($roCo = mysql_fetch_array($QueToCOmentario)) {
			echo "<div class='comentarios'>
				<h3>".$roCo['nombre']." ".$roCo['apellido']."</h3>
				<p>". $roCo['comentario']."</p>
				</div>";
		}
	}

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

	function dbM_Popular($tema){
		
	}

}
?>