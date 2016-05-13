 <?php	
 
	//Nawiązujemy połączenie z bazą
	require_once "../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$viewArticle = true;
	//szukamy ile jest kategorii w bazie i zapisujemy wynik do zmiennej
	$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data DESC ") or die(mysql_error());
	$ileArt = mysql_num_rows($zapytanie);
	for($i=0; $i < $ileArt; $i++)
	{
		$wiersz = @mysql_fetch_assoc($zapytanie);
		$tytul[$i] = $wiersz['tytul']; //stworzenie tablicy kategorie[]
		$link[$i] = $wiersz['link'];
		$data[$i] = $wiersz['data'];
		$idK[$i] = $wiersz['id_kategorii'];
	}
	
	$zapytanie = mysql_query("SELECT * FROM `kategoria` ") or die(mysql_error());
	$ileKat = mysql_num_rows($zapytanie);
	$zapytanie2 = mysql_query("SELECT MAX(id_kategorii) AS max FROM `kategoria` ORDER BY id_kategorii") or die(mysql_error());
	/* wyszukiwanie id */
	while ($wiersz=mysql_fetch_array($zapytanie2)) 
	{
		$max_id = $wiersz['max'];
	}
	for($i=0; $i < $max_id; $i++)
	{
		$wiersz = @mysql_fetch_assoc($zapytanie);
		$idKate[$i] = $wiersz['id_kategorii']; //stworzenie tablicy kategorie[]
		$nazwaKate[$idKate[$i]] = $wiersz['nazwa'];
		$nazwaKa[$i] = $wiersz['nazwa'];
	}

	// echo '<input ';
	// echo 'class="zmienna" value = ';
	// echo $tytul;
	// echo '>';
	// $zapytanie = mysql_query("SELECT MAX(id_kategorii) AS max FROM `kategoria` ORDER BY id_kategorii") or die(mysql_error());
	// /* wyszukiwanie id */
	// while ($wiersz=mysql_fetch_array($zapytanie)) 
	// {
		// $max_id = $wiersz['max'];
	// }
	// $zapytanie = mysql_query("SELECT * FROM `kategoria` ") or die(mysql_error());
	// for($i=0; $i < $max_id; $i++)
	// {
		// $wiersz = @mysql_fetch_assoc($zapytanie);
		// $kategoria2[$i] = $wiersz['nazwa']; //stworzenie tablicy kategorie[]
	// }
	
?>