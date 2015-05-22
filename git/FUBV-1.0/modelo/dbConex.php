<?php 
/**
* 
*/
class conex{
	
	function __construct(){
		mysql_connect("localhost","root","root");
		mysql_select_db("fubv");
	}
}
?>