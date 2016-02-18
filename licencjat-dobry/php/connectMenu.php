 <?php

 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf2', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
		 // $connection = @mysql_connect('mysql.cba.pl', 'piotr210694', '!?BazaIO!')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('sysinf_cba_pl', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


// $ins = @mysql_query("SELECT * FROM `artykuly`") or die(mysql_error());
// while ($wiersz=mysql_fetch_array($ins)) 
// {
// $_SESSION['ile']=mysql_num_rows($ins);
// }

//szukamy ile jest artykulow w bazie i zapisujemy wynik do zmiennej
$zapytanie = mysql_query("SELECT * FROM `artykuly`") or die(mysql_error());
$ileA = mysql_num_rows($zapytanie);
$_SESSION['ileA']=$ileA;

//Zapisujemy do tablicy kolejne tytuly artykulow
for($i=0;$i<$ileA;$i++)
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
    $tytuly[$i]=$wiersz['tytul']; //stworzenie tablicy tytuly[]
	$linki[$i]=$wiersz['link']; //stworzenie tablicy linki[]
}
error_reporting(E_ALL ^ E_NOTICE); 
$_SESSION['tytulA']=$tytuly; //stworzenie zmiennej sesyjnej tablicowej
$_SESSION['linkA']=$linki; 
?>
