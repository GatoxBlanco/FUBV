<?php 
	require("controlador/inicio.php");
	$obj=new inicio;
	$obj->user($_SESSION['statud'],$_SESSION['id'],$_SESSION['user']);
?>