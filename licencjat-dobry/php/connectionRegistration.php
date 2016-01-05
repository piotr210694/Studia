<?php
session_start();

 $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('1066219_MqQ', $connection)
		or die('Nie mogę połączyć się z bazą danych');


	 // $connection = @mysql_connect('localhost', 'root', 'root')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('sysinf', $connection)
		// or die('Nie mogę połączyć się z bazą danych');

		
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		$email = $_POST['email'];
		$date = date( 'Y-m-d' );
$ins = @mysql_query("SELECT MAX(id) AS max FROM `user`") or die(mysql_error());
while ($wiersz=mysql_fetch_array($ins)) 
{
	$max_id = $wiersz['max']+1;
}
if(($_POST['login'] AND $_POST['pass'] AND $_POST['pass2'] AND $_POST['email']) AND ($_POST['pass']==$_POST['pass2']))
{
	$ins = @mysql_query("INSERT INTO `user` (`id`, `login`, `password`, `email`, `telefon`, `imie`, `nazwisko`, `data`) VALUES ('$max_id', '$login', '$pass', '$email', NULL, NULL, NULL, '$date');") or die(mysql_error());
	unset($_SESSION['komunikatB']);
	$_SESSION['komunikatA'] = 'Witaj '.$login.'! '.'<br>'.'<span style="color:green">Operacja zakładania konta przebiegła pomyślnie!</span>'.'<br>'.'Teraz możesz zalogować się do naszego serwisu.';
	header('Location: ../registration.php');
}
elseif($_POST['pass']!=$_POST['pass2'])
{
	unset($_SESSION['komunikatA']);
	$_SESSION['komunikatB']='<span style="color:red">Hasła nie są identyczne!</span>'.'<br>'.'Popraw to!';
	header('Location: ../registration.php');
}
if(!isset($_POST['login']))
{
	header('Location: ../registration.php');
}



// $message = 'Twoje dane do zalogowania to:'.' LOGIN:'.$login.' HASLO:'.$pass;
// $message = wordwrap($message, 35); //funkcja dla wiadomości dłuższej niż 70 znakow
	// $header = 	"From: Serwis systemy informatyczne";
	// $header  .= "\r\n" . 'MIME-Version: 1.0' . "\r\n";
    // $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	// $subject = "Odzyskiwanie hasla";

	
		
// if($_POST['email'] AND $_POST['email']==$bazamail)
// {
	// mail($email, $subject, $message, $header);
		// unset($_SESSION['bladremind']);
	// $_SESSION['komunikatremind'] = '<span style="color:green">Operacja odzyskiwania hasła przebiegła pomyślnie!</span>'.'<br>'.'Na podany adres e-mail została wysłana wiadomość z danymi potrzebnymi do zalogowania.';
	// header('Location: ../remindpass.php');

// }
// else
// {
	// unset($_SESSION['komunikatremind']);
	// $_SESSION['bladremind'] = '<span style="color:red">Tego adresu e-mail nie ma w naszej bazie! </span>'.'<a href="">Załóż konto</a>';
	// header('Location: ../remindpass.php');
// }
	

?>