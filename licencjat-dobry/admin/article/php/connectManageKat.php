  <?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

$idK = $_POST['idK']; //id wybranej kategorii
$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$idK'") or die(mysql_error());
$ileArt = mysql_num_rows($zapytanie);
//$_SESSION['ileArt'] = $ileA;
for($i=0; $i < $ileArt; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
    $tytulArt[$i] = $wiersz['tytul']; //stworzenie tablicy tytuly[] 
	$idArt[$i] = $wiersz['id_artykulu'];
}
 // $_SESSION['tytulArt']=$tytuly; //stworzenie zmiennej sesyjnej tablicowej
 // $_SESSION['idArt']=$id;
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