<?php 
/**************************************************
DONDE PUEDE HACER LA PREGUNTA NORMAL 
revisar || $_GET['w'],$_SESSION['statud']
**************************************************/

require("controlador/inicio.php");
$obj=new inicio;
$obj->form_pregunt_simple();
?>