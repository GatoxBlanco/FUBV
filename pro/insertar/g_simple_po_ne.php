<?php 
session_start();
require("../../controlador/tema.php");
$obj=new tema;
$obj->g_tema_Simple_P_M($_GET['t'],$_POST['resul'],$_SESSION['id']);
?>