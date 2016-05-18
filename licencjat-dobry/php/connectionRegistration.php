<?php
session_start();

	//Nawiązujemy połączenie z bazą
	require_once "connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$date = date( 'Y-m-d' );
	
	error_reporting(E_ALL ^ E_NOTICE);	
	$newLogin = $_POST['newLogin'];
	$newPass = $_POST['newPass'];
	$newEmail = $_POST['newEmail'];
	
	//zakodowanie md5
	$newPass = md5($newPass);
	
	/* wyszukiwanie id */
	$ins = @mysql_query("SELECT MAX(id) AS max FROM `uzytkownik`") or die(mysql_error());
	
	
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$max_id = $wiersz['max']+1;
	}

	if($ins AND $newLogin AND $newPass AND $newEmail)
	{
		$ins = @mysql_query("INSERT INTO `uzytkownik` (`id`, `login`, `password`, `email`, `telefon`, `imie`, `nazwisko`, `data`, `rola`) VALUES ('$max_id', '$newLogin', '$newPass', '$newEmail', NULL, NULL, NULL, '$date', 'user');") or die(mysql_error());
		echo '<br><div class="alert alert-success">';
		echo '<strong>Witaj '.$newLogin.'!</strong> Operacja zakładania konta przebiegła pomyślnie! <a href="" data-toggle="modal" data-target="#myModal">Zaloguj się</a></div>';
	}
	else
	{
		echo "błąd";
	}

// elseif($_POST['login']==$loginspr)
// {
	// unset($_SESSION['komunikatA']);
	// $_SESSION['komunikatB']='<span style="color:red">Podany login jest już w bazie!</span>'.'<br>'.'Popraw to!';
	// header('Location: ../registration.php');
// }


// elseif($_POST['pass']!=$_POST['pass2'])
// {
	// unset($_SESSION['komunikatA']);
	// $_SESSION['komunikatB']='<span style="color:red">Hasła nie są identyczne!</span>'.'<br>'.'Popraw to!';
	// header('Location: ../registration.php');
	
// }
// elseif($_POST['email']==$emailspr)
// {
	// unset($_SESSION['komunikatA']);
	// $_SESSION['komunikatB']='<span style="color:red">Podany e-mail jest już w bazie!</span>'.'<br>'.'Popraw to!';
	// header('Location: ../registration.php');
// }


// if(!isset($_POST['login']))
// {
	
	// header('Location: ../registration.php');
// }



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