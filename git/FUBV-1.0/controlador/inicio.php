<?php 
/**
* 
*/
require("modelo/dbInicio.php");
session_start();
error_reporting('0');
class inicio extends dbInicio{
	
	function user($statud,$id,$correo){
		echo file_get_contents("vista/emcabezado.html");
		if (isset($statud) && isset($id) && isset($correo)) {
			if (empty($statud) && empty($id) && empty($correo)) {
				
			}else{
				if ($statud == "true") {

					inicio::form_pregunta();
					inicio::publicar_preguntar();
					
					echo file_get_contents("vista/segundo_menu.html");
					inicio::mostrar_user($_SESSION['NomApell']);
					echo file_get_contents("vista/pie_s_menu.html");
				
				}else{
					inicio::publicar_preguntar();
					
					echo file_get_contents("vista/segundo_menu.html");
					inicio::form_login();
					inicio::form_registro();
					echo file_get_contents("vista/pie_s_menu.html");
			
				}
			}
		}else{
			inicio::publicar_preguntar();

			echo file_get_contents("vista/segundo_menu.html");
			inicio::form_login();
			inicio::form_registro();
			echo file_get_contents("vista/pie_s_menu.html");

		}
		echo file_get_contents("vista/pie_pagina.html");
	}


	function form_pregunta(){
		echo file_get_contents("vista/campo-pregunta.html");
	}

	function form_login(){
		echo file_get_contents("vista/campo-login.html");
	}

	function form_registro(){
		echo file_get_contents("vista/registro.html");
	}

	function publicar_preguntar(){
		dbInicio::dbPublicar_preguntar();
	}

	function mostrar_user($user){
		$User_info_menu=file_get_contents("vista/mos_user.html");
		$info = array('user' =>$user);

		foreach($info as $Cla => $Val) {
			$User_info_menu=str_replace('{'.$Cla.'}',$Val, $User_info_menu);
		}
		echo $User_info_menu;
	}

	function post($post,$statud){

		echo file_get_contents("vista/emcabezado.html");
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
		
			inicio::masYmenoTema($post);
			inicio::form_user_comentar($post);
			inicio::comentarios($post);
			
		}else{
			
		}

		echo "</div>";
		

		if ($statud == "true") {
								
			echo file_get_contents("vista/segundo_menu.html");
			inicio::mostrar_user($_SESSION['NomApell']);
			echo file_get_contents("vista/pie_s_menu.html");
				
		}else{
			
			echo file_get_contents("vista/segundo_menu.html");
			inicio::form_login();
			inicio::form_registro();
			echo file_get_contents("vista/pie_s_menu.html");
		}
		echo "</div>";
	}

	function masYmenoTema($temaMN){
		dbInicio::dbmasYmenoTema($temaMN);
	}

	function form_user_comentar($url){
		$infoUrl = array('url' => $url);
		$Pla=file_get_contents("vista/campo_preg_post.html");
		foreach($infoUrl as $Cla => $va) {
			$Pla=str_replace('{'.$Cla.'}',$va, $Pla);
		}
		echo $Pla;	
	}

	function comentar_user($comentar,$id_p){
		dbInicio::dbcomentar_user($comentar,$id_p);
	}

	function comentarios($tema){
		dbInicio::dbcomentarios($tema);
	}
	
}
?>