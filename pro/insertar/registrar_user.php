<?php 
require("../../controlador/registro_user.php");
$obj=new registro;
$obj->RegistroUser($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['clave']);
?>