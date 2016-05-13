<?php
	//Nawiązujemy połączenie z bazą
		require_once "../../../php/connect.php"; //wymaga pliku w kodzie
		$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
		$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

	$id = $_POST['usun'];
	$ins = @mysql_query("DELETE FROM pliki WHERE id = '$id'") or die(mysql_error());
	if($ins)
	{
		header('Location: ../filesView.php');
	}
	else
	{
		echo "Wystąpił nieoczekiwany błąd!";
	}
?>