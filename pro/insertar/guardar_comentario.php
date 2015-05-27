<?php 
session_start();
require("../../controlador/tema.php");
$obj=new tema;
$obj->Guardar_comentario($_POST['comentario'],$_SESSION['id'],$_GET['comt']);
?>