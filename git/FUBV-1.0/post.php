<?php 
require("controlador/inicio.php");
$obj=new inicio;
$obj->post($_GET['w'],$_SESSION['statud']);
?>