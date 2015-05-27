<?php 
/**************************************************
VAMOS A MOSTRAR TODOS LOS POS Y LOS ARTICULOS AQUI
**************************************************/
require("controlador/inicio.php");
$obj=new inicio;
$obj->post($_GET['w'],$_SESSION['statud']);
?>