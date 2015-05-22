<?php 
session_start();
require("../../controlador/tema.php");
$obj=new tema;
$obj->Pregunta($_POST['titulo'],$_POST['pregunta'],$_SESSION['id']);
?>