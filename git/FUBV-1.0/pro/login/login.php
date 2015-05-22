<?php 
/**
* Verifcacion el login
*/
require("../../controlador/fun-login.php");
$obj=new verficacion_login;
$obj->met_verficacion_login($_POST['user'],$_POST['pass']);
?>