<?php
	session_start();
	$id=$_SESSION['id'];
	require_once "connection.php"; //wymaga pliku w kodzie
	
	
	$ins="DELETE FROM `uzytkownik` WHERE id=$id";
	if(mysql_query($ins)){
		$ins=mysql_query("DELETE FROM `komentarz` WHERE ID_uzytkownika=$id");
		$ins=mysql_query("DELETE FROM `komentarz-artykul` WHERE ID_uzytkownika=$id");
		unset($_SESSION['zalogowany']);
		header('Location: ../../index.php');
	}
	else{
		echo 'Blad: '.mysql_error();
	}


?>