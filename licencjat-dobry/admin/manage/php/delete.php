<?php
	session_start();
	$id=$_SESSION['id'];
	require_once "connection.php"; //wymaga pliku w kodzie
	
	$ins="DELETE FROM `user` WHERE id=$id";
	if(mysql_query($ins)){
		unset($_SESSION['zalogowany']);
		header('Location: ../../index.php');
	}
	else{
		echo 'Blad: '.mysql_error();
	}


?>