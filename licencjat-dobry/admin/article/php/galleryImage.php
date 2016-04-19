<?php
	//Nawiązujemy połączenie z bazą
		require_once "../../../php/connect.php"; //wymaga pliku w kodzie
		$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
		$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	error_reporting(E_ALL ^ E_NOTICE);
	include('../../../php/urlConnect.php'); //dolaczenie pobierania linku html
	//$link2
	
	$ins = @mysql_query("SELECT * FROM `artykuly` WHERE `link` = '$link2'") or die(mysql_error());
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$idArt = $wiersz['id_artykulu'];
	}
	
	$ins = @mysql_query("SELECT * FROM `zdjecia` WHERE `id_artykulu` = '$idArt'") or die(mysql_error());
	$ileZdjec = mysql_num_rows($ins);	
	for($i=0; $i < $ileZdjec; $i++)
	{
		$wiersz = @mysql_fetch_assoc($ins);
		$zdjecie[$i] = 'data:image/jpeg;base64,'.base64_encode( $wiersz['zdjecie'] );
	}
	
?>