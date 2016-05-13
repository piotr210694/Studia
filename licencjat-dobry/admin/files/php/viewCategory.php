<?php
	//Nawiązujemy połączenie z bazą

	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$ins = @mysql_query("SELECT * FROM `kategoria`") or die(mysql_error());
	$ileK = mysql_num_rows($ins);
	for($i = 0; $i < $ileK; $i++) 
	{
		$wiersz = @mysql_fetch_assoc($ins);
		$nazwaK[$i] = $wiersz['nazwa']; 
		$idK[$i] = $wiersz['id_kategorii']; 
	}
?>