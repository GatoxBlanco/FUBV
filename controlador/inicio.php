<?php 
/**
* 
*/
require("modelo/dbInicio.php");
session_start();
error_reporting('0');
class inicio extends dbInicio{
	
	/**************************
	* VERIFICACIONES || INICIO
	**************************/
	function user($statud,$id,$correo){
		echo file_get_contents("vista/encabezado.html");
		if (isset($statud) && isset($id) && isset($correo)) {
			if (empty($statud) && empty($id) && empty($correo)) {
				#FALTLA
			}else{
				#TODO VA FINO
				if ($statud == "true") {
					#inicio::form_pregunta();
					inicio::publicar_preguntar();				
					inicio::mostrar_user($_SESSION['NomApell']);
					echo file_get_contents("vista/menu_uno.html"); # SEGUNDO MENU	
					echo file_get_contents("vista/pregunta.html");
					echo file_get_contents("vista/pie_s_menu.html");
				}else{
					inicio::publicar_preguntar();
					echo file_get_contents("vista/menu_uno.html"); # SEGUNDO MENU
					inicio::form_login();
					inicio::form_registro();
					echo file_get_contents("vista/pie_s_menu.html");
				}
			}
		}else{
			inicio::publicar_preguntar();
			echo file_get_contents("vista/menu_uno.html"); # SEGUNDO MENU
			inicio::form_login();
			inicio::form_registro();
			echo file_get_contents("vista/pie_s_menu.html");

		}
		echo file_get_contents("vista/pie.html");
	}


	/**************************
	* VERIFICACIONES || POST
	***************************/

	function post($post,$statud){

		echo file_get_contents("vista/encabezado.html");

		$plantillaVC=file_get_contents("vista/post.html");
		dbInicio::dbPost($post);
		if ($post == "popular") {
			dbInicio::dbPopular($post);
		}elseif($post == "m_popular"){
			dbInicio::dbM_Popular($post);
		}elseif(is_numeric($post)){
			foreach($this->POST_TODO as $claveVC => $valorVC) {
				$plantillaVC=str_replace('{'.$claveVC.'}',$valorVC, $plantillaVC);
			}
			echo $plantillaVC;
			
			#EXTRA
			inicio::masYmenoTema($post);
			inicio::form_user_comentar($post);
			inicio::form_mas_meno($post);
			inicio::comt_externo($post);
			inicio::comentarios($post);
			
			echo "</div><div class='col-md-3 mv3'>";
			
		}else{
			
		}


		if ($statud == "true") {
								
			inicio::mostrar_user($_SESSION['NomApell']);
			echo file_get_contents("vista/menu_uno.html");
			echo file_get_contents("vista/menu_preguntar.html");
			echo file_get_contents("vista/pregunta.html");
			echo file_get_contents("vista/pie.html");
				
		}else{
			
			echo file_get_contents("vista/menu_uno.html");
			inicio::form_login();
			inicio::form_registro();
			echo file_get_contents("vista/pie.html");
		}
	}


	/**************************
	* VERIFICACIONES || POST_SImple
	***************************/

	function post_simple($post,$statud){

		echo file_get_contents("vista/encabezado.html");

		$plantillaVC=file_get_contents("vista/post_simple.html");
		dbInicio::dbPost_simple($post);
		if ($post == "popular") {
			dbInicio::dbPopular($post);
		}elseif($post == "m_popular"){
			dbInicio::dbM_Popular($post);
		}elseif(is_numeric($post)){
			foreach($this->POST_TODO as $claveVC => $valorVC) {
				$plantillaVC=str_replace('{'.$claveVC.'}',$valorVC, $plantillaVC);
			}
			echo $plantillaVC;
			
			#EXTRA
			inicio::form_po_ma($post);
			inicio::masYmenoTema($post);
			inicio::form_user_comentar($post);
			inicio::form_mas_meno($post);
			inicio::comt_externo($post);
			inicio::comentarios($post);
			
			echo "</div><div class='col-md-3 mv3'>";
			
		}else{
			
		}


		if ($statud == "true") {
								
			inicio::mostrar_user($_SESSION['NomApell']);
			echo file_get_contents("vista/menu_uno.html");
			echo file_get_contents("vista/menu_preguntar.html");
			echo file_get_contents("vista/pregunta.html");
			echo file_get_contents("vista/pie.html");
				
		}else{
			
			echo file_get_contents("vista/menu_uno.html");
			inicio::form_login();
			inicio::form_registro();
			echo file_get_contents("vista/pie.html");
		}
	}


	#TODOS LOS COMENTARIOS
	function form_user_comentar($url){
		$infoUrl = array('url' => $url);
		$Pla=file_get_contents("vista/campo_preg_post.html");
		foreach($infoUrl as $Cla => $va) {
			$Pla=str_replace('{'.$Cla.'}',$va, $Pla);
		}
		echo $Pla;	
	}



	/***********************
	* FORMULARIOS Y VISTAS
	***********************/

	function form_po_ma($tema_sim){

		dbInicio::db_po_ma($tema_sim);

		$ni=file_get_contents("vista/po_ne.html");
		foreach($this->po_ne as $Cla => $va) {
			$ni=str_replace('{'.$Cla.'}',$va, $ni);
		}
		echo $ni;		
	}

	#FORMULARIO PARA LA PREGUNTAS
	function form_pregunta(){
		echo file_get_contents("vista/campo-pregunta.html");
	}

	#FORMULARIO PARA LA PREGUNTAS
	function form_mas_meno($url){
		$infoUrl = array('url' => $url);
		$Pla=file_get_contents("vista/dale_mas_meno.html");
		foreach($infoUrl as $Cla => $va) {
			$Pla=str_replace('{'.$Cla.'}',$va, $Pla);
		}
		echo $Pla;
	}

	#FORMULARIO PARA LA PREGUNTAS
	function comt_externo($url){
		$infoUrl = array('url' => $url);
		$Pla=file_get_contents("vista/comentario_externo.html");
		foreach($infoUrl as $Cla => $va) {
			$Pla=str_replace('{'.$Cla.'}',$va, $Pla);
		}
		echo $Pla;
	}	

	#FORMULARIO DEL LOGIN
	function form_login(){
		echo file_get_contents("vista/login.html");
	}


	#FORMULARIO REGISTRO
	function form_registro(){
		echo file_get_contents("vista/registro.html");
	}


	#MUESTRA TODAS LAS PUBLICACIONES
	function publicar_preguntar(){
		echo '<div class="containe"> <div class="col-md-8">';
		dbInicio::dbPublicar_preguntar();
		dbInicio::dbPublicar_preguntar_simple();
		echo "</div><div class='col-md-4'>";
	}

	#MUESTRA LOS + Y - QUE LLEVA EL ARTICULO
	function masYmenoTema($temaMN){
		dbInicio::dbmasYmenoTema($temaMN);
	}

	#MUESTRA EL MENU DE USUARIO 
	function mostrar_user($user){
		$User_info_menu=file_get_contents("vista/user.html");
		$info = array('user' =>$user);
		foreach($info as $Cla => $Val) {
			$User_info_menu=str_replace('{'.$Cla.'}',$Val, $User_info_menu);
		}
		echo $User_info_menu;
	}

	#MUESTRA TODO LOS COMENTARIOS DEL ARTICULO
	function comentarios($tema){
		dbInicio::dbcomentarios($tema);
	}

	/****
	* INSERCION
	****/

	/****
	* MODIFICACION
	****/





	function comentar_user($comentar,$id_p){
		dbInicio::dbcomentar_user($comentar,$id_p);
	}


	
	/******************
	** PREGUNTA NORMAL
	*******************/
	function form_pregunt_normal(){
		echo file_get_contents("vista/encabezado.html");
		echo file_get_contents("vista/pregunta-normal.html");
		echo file_get_contents("vista/menu_uno.html");
		echo file_get_contents("vista/pregunta.html");
		echo file_get_contents("vista/pie.html");
	}

	function form_pregunt_simple(){
		echo file_get_contents("vista/encabezado.html");
		echo file_get_contents("vista/pregunta-simple.html");
		echo file_get_contents("vista/menu_uno.html");
		echo file_get_contents("vista/pregunta.html");
		echo file_get_contents("vista/pie.html");		
	}
}
?>