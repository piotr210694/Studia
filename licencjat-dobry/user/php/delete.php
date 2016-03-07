<?php
	session_start();
	$id = $_SESSION['id'];
	require_once "../../php/connect.php"; //wymaga pliku w kodzie
	
	//Nawiązujemy połączenie z bazą
	require_once "../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
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