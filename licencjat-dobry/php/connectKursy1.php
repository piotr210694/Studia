 <?php
 
	//Nawiązujemy połączenie z bazą
	require_once "connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
 
 
 //szukamy ile jest kursów bazie i zapisujemy wynik do zmiennej
$zapytanie = mysql_query("SELECT * FROM `kurs` WHERE stan=0") or die(mysql_error());
$ileKurs = mysql_num_rows($zapytanie);
$_SESSION['ileKurs'] = $ileKurs;

//Zapisujemy do tablicy kolejne tytuly artykulow
for($i=0;$i<$ileKurs;$i++)
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
    $tytuly[$i]=$wiersz['nazwa']; //stworzenie tablicy tytuly[]
	$cena[$i]=$wiersz['cena']; //stworzenie tablicy tytuly[]
}
error_reporting(E_ALL ^ E_NOTICE); 
$_SESSION['tytulKurs']=$tytuly; //stworzenie zmiennej sesyjnej tablicowej
$_SESSION['cenaKurs']=$cena;
 
 
 ?>