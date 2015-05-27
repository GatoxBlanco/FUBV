<?php 
session_start();
require("../../controlador/tema.php");
$obj=new tema;
$obj->tema_simple($_POST['titulo'],$_POST['por'],$_POST['neg'],$_SESSION['id']);
?>