<?php
	//Nawiązujemy połączenie z bazą
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$ins = @mysql_query("SELECT * FROM `powiadomienia` WHERE stan = 1") or die(mysql_error()); //ustalenie ilosci powiadomien
	if($ins)
	{
		$iloscPowiadomien = mysql_num_rows($ins);
	}
	else
	{
		$iloscPowiadomien = 0;
	}
?>
