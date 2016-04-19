<?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	include('../../../php/urlConnect.php'); //dolaczenie pobierania linku html
	
	$ins = @mysql_query("SELECT * FROM `samouczek` WHERE link = '$link'") or die(mysql_error()); //ustalenie id dla artykulu
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$tytul = $wiersz['tytul'];
			$opis = $wiersz['opis'];
			$tresc = $wiersz['tresc'];
		}
	$tab = unserialize($tresc);
	
?>