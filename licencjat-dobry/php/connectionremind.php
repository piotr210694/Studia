<?php
session_start();

	//Nawiązujemy połączenie z bazą
	require_once "connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

	
		$email = $_POST['email'];
$ins = @mysql_query("SELECT * FROM `uzytkownik` where `email` = '$email'") or die(mysql_error());
while ($wiersz=mysql_fetch_array($ins)) 
{
	$pass=$wiersz['password'];
	$login=$wiersz['login'];
	$bazamail=$wiersz['email'];
}


//dodanie tokenu
$token = uniqid("pass");
//$token = md5($cleanPass);
$ins = @mysql_query("UPDATE `uzytkownik` SET `token` = '$token' WHERE `login` = '$login'") or die(mysql_error());

if($ins)
{
	$adresStrony = 'http://sysinf.cba.pl/resetPass.php'.'?login='.$login.'&token='.$token;
	//$message = 'Twoje dane do zalogowania to:<br>'.' <b>LOGIN:</b>'.$login.'<br> HASLO:'.$pass;
	$message = 'Wysłano prośbę o zmianę hasła! <br> Jeśli chcesz zresetować swoje obecne hasło, kliknij poniższy link: <br>'.'<a href="'.$adresStrony.'">'.'Zresetuj swoje hasło'.'</a>';
$message = wordwrap($message, 35); //funkcja dla wiadomości dłuższej niż 70 znakow
	$header = 	"From: Serwis systemy informatyczne";
	$header  .= "\r\n" . 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$subject = "Resetowanie hasla";

	
		
	if($_POST['email'] AND $_POST['email']==$bazamail)
	{
		mail($email, $subject, $message, $header);
			unset($_SESSION['bladremind']);
		$_SESSION['komunikatremind'] = '<span style="color:green">Operacja odzyskiwania hasła przebiegła pomyślnie!</span>'.'<br>'.'Na podany adres e-mail została wysłana wiadomość z danymi potrzebnymi do zalogowania. '.'<a id="opener" style="cursor:pointer;" id="opener" style="cursor:pointer;" data-toggle="modal" data-target="#myModal">Zaloguj się</a>';
		header('Location: ../remindpass.php');

	}
	else
	{
		unset($_SESSION['komunikatremind']);
		$_SESSION['bladremind'] = '<span style="color:red">Tego adresu e-mail nie ma w naszej bazie! </span>'.'<a href="registration.php">Załóż konto</a>';
		header('Location: ../remindpass.php');
	}
}
else
{
		unset($_SESSION['komunikatremind']);
		$_SESSION['bladremind'] = '<span style="color:red">Wystąpił nieoczekiwany błąd!</span>';
		header('Location: ../remindpass.php');
}

	

?>