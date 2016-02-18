  <?php
	 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf2', $connection)
		or die('Nie mogę połączyć się z bazą danych');
  session_start();

  
   // $connection = @mysql_connect('mysql.cba.pl', 'piotr210694', '!?BazaIO!')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('sysinf_cba_pl', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


$idK = $_POST['idK']; //id wybranej kategorii
$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$idK'") or die(mysql_error());
$ileA = mysql_num_rows($zapytanie);
$_SESSION['ileArt'] = $ileA;
for($i=0;$i<$ileA;$i++) //zapisujemy do tablicy kolejne tytuly artykulow
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
    $tytuly[$i]=$wiersz['tytul']; //stworzenie tablicy tytuly[] 
	$id[$i]=$wiersz['id_artykulu'];
}
 $_SESSION['tytulArt']=$tytuly; //stworzenie zmiennej sesyjnej tablicowej
 $_SESSION['idArt']=$id;
 header('Location: ../articleManageArt.php');
		
//szukamy ile jest kategorii

// $zapytanie = mysql_query("SELECT * FROM `kategoria`") or die(mysql_error());
// $ileK = mysql_num_rows($zapytanie);
// $_SESSION['ileK']=$ileK;

//Zapisujemy do tablicy kolejne tytuly kategorii
// for($i=0;$i<$ileK;$i++)
// {
	// $wiersz = @mysql_fetch_assoc($zapytanie);
    // $tytuly[$i]=$wiersz['nazwa']; //stworzenie tablicy tytuly[] 
	// $id[$i]=$wiersz['id_kategorii'];
// }
// $_SESSION['tytulK']=$tytuly; //stworzenie zmiennej sesyjnej tablicowej
	

?>