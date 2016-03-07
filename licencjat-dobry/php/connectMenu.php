 <?php

	//Nawiązujemy połączenie z bazą
	require_once "connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

$ile = 3; //ograniczenie - po ilu artykulach ma pojawic sie POKAZ WIECEJ

//szukamy ile jest kategorii w bazie i zapisujemy wynik do zmiennej
$zapytanie = mysql_query("SELECT * FROM `kategoria`") or die(mysql_error());
$ileK = mysql_num_rows($zapytanie);
for($i=0;$i<$ileK;$i++)
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
	$kategoria[$i]=$wiersz['nazwa']; //stworzenie tablicy kategorie[]
	$idKat[$i] = $wiersz['id_kategorii'];
}

for ($i=0; $i<$ileK; $i++)
{
	//szukamy ile jest artykulow w bazie i zapisujemy wynik do zmiennej
	$kat = $idKat[$i];
	$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE `id_kategorii`='$kat' ORDER BY data DESC") or die(mysql_error());
	$ileA[$i] = mysql_num_rows($zapytanie);

	//linki artykulow i tytuly
	for($j=0;$j<$ileA[$i];$j++)
	{
		$wiersz = @mysql_fetch_assoc($zapytanie);
		$tytuly[$i][$j]=$wiersz['tytul']; //stworzenie tablicy tytuly[]
		$linki[$i][$j]=$wiersz['link']; //stworzenie tablicy linki[]
	}
}


//szukamy ile jest artykulow w bazie i zapisujemy wynik do zmiennej
// $zapytanie = mysql_query("SELECT * FROM `artykuly`") or die(mysql_error());
// $ileA = mysql_num_rows($zapytanie);

//Zapisujemy do tablicy kolejne tytuly artykulow
// for($i=0;$i<$ileA;$i++)
// {
	// $wiersz = @mysql_fetch_assoc($zapytanie);
	// $tytuly[$i]=$wiersz['tytul']; //stworzenie tablicy tytuly[]
	// $linki[$i]=$wiersz['link']; //stworzenie tablicy linki[]
// }
?>
