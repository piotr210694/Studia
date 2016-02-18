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
		
		
//tworzenie zmiennych tablicowych
$zapytanie = mysql_query("SELECT * FROM `kurs`") or die(mysql_error());
$maxid1 = mysql_num_rows($zapytanie);
$ins = @mysql_query("SELECT MAX(id_kursu) AS max FROM `kurs`") or die(mysql_error());
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$maxid = $wiersz['max'];
	}


//Zapisujemy do tablicy kolejne tytuly artykulow
for($i=0;$i<$maxid;$i++)
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
    $name[$i]=$wiersz['nazwa']; //stworzenie tablicy tytuly[]
	$price[$i]=$wiersz['cena']; //stworzenie tablicy linki[]
	$stan[$i] = $wiersz['stan'];
	$id[$i] = $wiersz['id_kursu'];
}
		
?>