<?php
	require_once "../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$ins = @mysql_query("SELECT * FROM `pliki` ORDER BY nazwa ") or die(mysql_error());
	$ileP = mysql_num_rows($ins);
	for($i = 0; $i < $ileP; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
	{
		$wiersz = @mysql_fetch_assoc($ins);
		$nazwa[$i] = $wiersz['nazwa']; //stworzenie tablicy tytuly[] 
		$idPliku[$i] = $wiersz['id']; //stworzenie tablicy tytuly[] 
		$rozmiar[$i] = $wiersz['rozmiar'];
		$typ[$i] = $wiersz['typ'];
		
		$idArt = $wiersz['id_artykulu'];
		$ins2 = @mysql_query("SELECT * FROM `artykuly` WHERE id_artykulu='$idArt'") or die(mysql_error());
		$wiersz2 = @mysql_fetch_assoc($ins2);
		$nazwaArt[$i] = $wiersz2['tytul'];
	}
	

?>