<?php
session_start();

 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf', $connection)
		or die('Nie mogę połączyć się z bazą danych');


	
		$email = $_POST['email'];
$ins = @mysql_query("SELECT * FROM `uzytkownik` where `email` = '$email'") or die(mysql_error());
while ($wiersz=mysql_fetch_array($ins)) 
{
$pass=$wiersz['password'];
$login=$wiersz['login'];
$bazamail=$wiersz['email'];

}

$message = 'Twoje dane do zalogowania to:'.' LOGIN:'.$login.' HASLO:'.$pass;
$message = wordwrap($message, 35); //funkcja dla wiadomości dłuższej niż 70 znakow
	$header = 	"From: Serwis systemy informatyczne";
	$header  .= "\r\n" . 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$subject = "Odzyskiwanie hasla";

	
		
if($_POST['email'] AND $_POST['email']==$bazamail)
{
	mail($email, $subject, $message, $header);
		unset($_SESSION['bladremind']);
	$_SESSION['komunikatremind'] = '<span style="color:green">Operacja odzyskiwania hasła przebiegła pomyślnie!</span>'.'<br>'.'Na podany adres e-mail została wysłana wiadomość z danymi potrzebnymi do zalogowania.';
	header('Location: ../remindpass.php');

}
else
{
	unset($_SESSION['komunikatremind']);
	$_SESSION['bladremind'] = '<span style="color:red">Tego adresu e-mail nie ma w naszej bazie! </span>'.'<a href="">Załóż konto</a>';
	header('Location: ../remindpass.php');
}
	

?>