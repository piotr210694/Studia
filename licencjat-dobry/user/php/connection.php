<?php	
	 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf2', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
		
		$id=$_SESSION['id'];
$ins = @mysql_query("SELECT * FROM uzytkownik where id=$id") or die(mysql_error());

while ($wiersz=mysql_fetch_array($ins)) {

$_SESSION['id']=$wiersz['id'];
$_SESSION['login']=$wiersz['login'];
$_SESSION['email']=$wiersz['email'];
$_SESSION['phone']=$wiersz['telefon'];
$_SESSION['name']=$wiersz['imie'];
$_SESSION['surname']=$wiersz['nazwisko'];


}
?>