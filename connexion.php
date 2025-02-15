<?php
	$hote='localhost';
	$base='testmysql' ; 
	$user='root';
	$pass='';
	$cnx= mysqli_connect($hote,$user,$pass) or die(mysql_error());
	$ret = mysqli_select_db($cnx,$base) or die(mysql_error());
?>