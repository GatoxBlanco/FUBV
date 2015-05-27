<?php 
/**************************************************
VAMOS A MOSTRAR TODOS LOS POST Y LOS ARTICULOS AQUI 
Pregunta simple
**************************************************/
require("controlador/inicio.php");
$obj=new inicio;
$obj->post_simple($_GET['w'],$_SESSION['statud']);
?>