 <?php
 	 //Nawiązujemy połączenie z bazą
	//require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$ins = @mysql_query("SELECT * FROM `powiadomienia` ORDER BY data DESC") or die(mysql_error());
	$ileP = mysql_num_rows($ins);
	for($i=0; $i < $ileP; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
	{
		$wiersz = @mysql_fetch_assoc($ins);
		$idU[$i] = $wiersz['id_uzytkownika']; //stworzenie tablicy tytuly[] 
		$rola[$i] = $wiersz['rola'];
		$data[$i] = $wiersz['data'];
		$stan[$i] = $wiersz['stan'];
	}
	
	for($i=0; $i < $ileP; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
	{
		$ins = @mysql_query("SELECT login, rola FROM `uzytkownik` WHERE id = '$idU[$i]'") or die(mysql_error());	
		$wiersz = @mysql_fetch_assoc($ins);
		$login[$i] = $wiersz['login'];
		$obecnyTyp[$i] = $wiersz['rola'];
	}
 ?>