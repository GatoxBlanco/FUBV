<?php 
session_start();
require("../../controlador/tema.php");
$obj=new tema;
$obj->Guardar_lik($_SESSION['id'],$_GET['lik'],$_POST['like']);
?>