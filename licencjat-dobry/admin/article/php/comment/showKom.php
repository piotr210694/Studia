 <?php
		 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');

	 // $connection = @mysql_connect('localhost', 'root', 'root')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('sysinf2', $connection)
		// or die('Nie mogę połączyć się z bazą danych');
		
		 $connection = @mysql_connect('mysql.cba.pl', 'piotr210694', '!?BazaIO!')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf_cba_pl', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
		
		
		
		$url = $_SESSION['url'];
		//$link = str_replace("/licencjat-dobry/", '', $url);
		$link = str_replace("%20",' ', $link);
	
		//Znalezienie artykulu w jakim sie znajdujemy
		$ins = @mysql_query("SELECT * FROM artykuly WHERE link='$link'") or die(mysql_error());
		while($wiersz=mysql_fetch_array($ins))
		{
			$idA = $wiersz['id_artykulu'];
		}
		
		//szukamy ile jest komentarzy w bazie i zapisujemy wynik do zmiennej
		$zapytanie = mysql_query("SELECT * FROM `komentarz` WHERE ID_artykulu = '$idA'") or die(mysql_error());
		$ileK = mysql_num_rows($zapytanie);
		$_SESSION['ileKom']=$ileK;

		//Szukanie komentarzy dla artykulu
		$zapytanie = @mysql_query("SELECT * FROM komentarz WHERE ID_artykulu='$idA' ORDER BY data DESC") or die(mysql_error());
//Zapisujemy do tablicy 
for($i=0; $i<$ileK; $i++)
{
$wiersz = @mysql_fetch_assoc($zapytanie);

    $tresc[$i] = $wiersz['tresc']; //stworzenie tablicy tytuly[]
	$idU[$i] = $wiersz['ID_uzytkownika'];
	$data[$i] = $wiersz['data'];

	
}
error_reporting(E_ALL ^ E_NOTICE); //nie pokazuje bledow TUTAJ MOZNA ZROBIC ZE JESLI NIE MA ICH TO WYSWIETLI KOMUNIKAT - brak komenatrzy!
$_SESSION['tresc'] = $tresc; 
$_SESSION['data'] = $data;


//Szukanie loginu
		$zapytanie = @mysql_query("SELECT uzytkownik.login, komentarz.data AS data FROM uzytkownik JOIN komentarz ON id=ID_uzytkownika WHERE ID_artykulu = '$idA' ORDER BY data DESC ") or die(mysql_error());
//Zapisujemy do tablicy 
for($i=0; $i<$ileK; $i++)
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
	$login[$i] = $wiersz['login'];
}
$_SESSION['loginKom'] = $login;
	
	

	

?>