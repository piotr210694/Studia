 <?php	
 
	//Nawiązujemy połączenie z bazą
	require_once "../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	
	//szukamy ile jest kategorii w bazie i zapisujemy wynik do zmiennej
	$zapytanie = mysql_query("SELECT * FROM `kategoria` ") or die(mysql_error());
	$ileK = mysql_num_rows($zapytanie);
	for($i=0; $i < $ileK; $i++)
	{
		$wiersz = @mysql_fetch_assoc($zapytanie);
		$kategoria[$i] = $wiersz['nazwa']; //stworzenie tablicy kategorie[]
		$idKat[$i] = $wiersz['id_kategorii'];

		$zapytanie2 = mysql_query("SELECT * FROM `kategoria-artykul` WHERE id_kategorii=$idKat[$i]") or die(mysql_error());
		$ileA[$i] = mysql_num_rows($zapytanie2); 
	}
	
	$zapytanie = mysql_query("SELECT MAX(id_kategorii) AS max FROM `kategoria` ORDER BY id_kategorii") or die(mysql_error());
	/* wyszukiwanie id */
	while ($wiersz=mysql_fetch_array($zapytanie)) 
	{
		$max_id = $wiersz['max'];
	}
	$zapytanie = mysql_query("SELECT * FROM `kategoria` ") or die(mysql_error());
	for($i=0; $i < $max_id; $i++)
	{
		$wiersz = @mysql_fetch_assoc($zapytanie);
		$kategoria2[$i] = $wiersz['nazwa']; //stworzenie tablicy kategorie[]
	}
	
?>