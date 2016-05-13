<?php
	//Nawiązujemy połączenie z bazą
		require_once "connect.php"; //wymaga pliku w kodzie
		$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
		$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

	include('urlConnect.php');
	
	$link = $link2;
	$ins = @mysql_query("SELECT * FROM artykuly WHERE link = '$link'") or die(mysql_error());
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$idA = $wiersz['id_artykulu'];
	}
	
	$ins = @mysql_query("SELECT * FROM `pliki` WHERE id_artykulu = '$idA' ") or die(mysql_error());
	$ilePlikoww = mysql_num_rows($ins);
	for($i = 0; $i < $ilePlikoww; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
	{
		$wiersz = @mysql_fetch_assoc($ins);
		$nazwaPl[$i] = $wiersz['nazwa']; //stworzenie tablicy tytuly[] 
	}
?>