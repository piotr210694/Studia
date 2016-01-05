<?php

	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
		$email = $_POST['email'];
$ins = @mysql_query("SELECT * FROM `user` where `email` = '$email'") or die(mysql_error());
while ($wiersz=mysql_fetch_array($ins)) 
{
$pass=$wiersz['password'];
$login=$wiersz['login'];
}


$message = 'Twoje dane do zalogowania to:'.'<br>'.$login.'<br>'.$pass;
$message = wordwrap($message, 70); //funkcja dla wiadomości dłuższej niż 70 znakow
	$header = 	"From: Serwis systemy informatyczne";
	$header  .= "\r\n" . 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$subject = "Odzyskiwanie hasła";
	
// Wyślij
	
		
if($_POST['email'])
{
	mail($mail, $subject, $message, $header);
	$_SESSION['komunikatremind'] = '<span style="color:green">Operacja odzyskiwania hasła przebiegła pomyślnie!</span>'.'<br>'.'Na podany adres e-mail została wysłana wiadomość z danymi potrzebnymi do zalogowania.';
	header('Location: ../remindpass.php');
	unset($_SESSION['bladremind']);
}
else
{
	$_SESSION['bladremind'] = '<span style="color:red">Tego adresu e-mail nie ma w naszej bazie! </span>'.'<a href="">Załóż konto</a>';
unset($_SESSION['komunikatremind']);
	header('Location: ../remindpass.php');
}
	

?>