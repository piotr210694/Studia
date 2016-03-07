<?php	
	//Nawiązujemy połączenie z bazą
	require_once "../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
		
		
		$id=$_SESSION['id'];
$ins = @mysql_query("SELECT * FROM uzytkownik where id=$id") or die(mysql_error());

while ($wiersz=mysql_fetch_array($ins))
{
	$id = $wiersz['id'];
	$login = $wiersz['login'];
	$pass = $wiersz['password'];
	$email = $wiersz['email'];
	$phone = $wiersz['telefon'];
	$name = $wiersz['imie'];
	$surname = $wiersz['nazwisko'];
}

//szukamy ile jest userow w bazie i zapisujemy wynik do zmiennej
$zapytanie = mysql_query("SELECT * FROM `uzytkownik`") or die(mysql_error());
$ileU = mysql_num_rows($zapytanie);

//szukamy ile jest loginow
$ins = @mysql_query("SELECT MAX(id) AS max FROM `uzytkownik`") or die(mysql_error());
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$maxU = $wiersz['max'];
	}

$zapytanie = @mysql_query("SELECT * FROM `uzytkownik`") or die(mysql_error());
//Zapisujemy do tablicy kolejne loginy
for($i = 0; $i < $maxU; $i++)
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
	$loginZBazy[$i]=$wiersz['login']; //stworzenie tablicy tytuly[]
	$emailZBazy[$i]=$wiersz['email']; //stworzenie tablicy tytuly[]
}


?>