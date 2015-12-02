<?php	
	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		$id=$_SESSION['id'];
$ins = @mysql_query("SELECT * FROM user where id=$id") or die(mysql_error());

while ($wiersz=mysql_fetch_array($ins)) {

$_SESSION['login']=$wiersz['login'];
$_SESSION['email']=$wiersz['email'];
$_SESSION['phone']=$wiersz['phone'];
$_SESSION['name']=$wiersz['name'];
$_SESSION['surname']=$wiersz['surname'];


}
?>