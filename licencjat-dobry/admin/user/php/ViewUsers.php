<?php
	//require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$ins = @mysql_query("SELECT * FROM `uzytkownik` ORDER BY login") or die(mysql_error());
	$ileUsers = mysql_num_rows($ins);
	for($i=0; $i < $ileUsers; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
	{
		$wiersz = @mysql_fetch_assoc($ins);
		$idUser[$i] = $wiersz['id']; //stworzenie tablicy tytuly[] 
		$login[$i] = $wiersz['login'];
		$email[$i] = $wiersz['email'];
		$telefon[$i] = $wiersz['telefon'];
		$imie[$i] = $wiersz['imie'];
		$nazwisko[$i] = $wiersz['nazwisko'];
		$rola[$i] = $wiersz['rola'];
		$data[$i] = $wiersz['data'];
	}
	
?>