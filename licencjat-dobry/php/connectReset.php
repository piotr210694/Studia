<?php
	//Nawiązujemy połączenie z bazą
	require_once "connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

	if(isset($_GET['login']) AND isset($_GET['token']))
	{
		$login = $_GET['login'];
		$token = $_GET['token'];
		
		$cleanPass = uniqid("pass");
		$newPass = md5($cleanPass);
		
		$ins2 = @mysql_query("SELECT * FROM `uzytkownik` WHERE `login` = '$login' AND `token` = '$token'") or die(mysql_error());
		$ile = mysql_num_rows($ins2);
		if($ile>0)
		{
			$ins = @mysql_query("UPDATE `uzytkownik` SET `password` = '$newPass' WHERE `login` = '$login' AND `token` = '$token'") or die(mysql_error());
			
			if($ins)
			{
				$ins = @mysql_query("SELECT * FROM `uzytkownik` WHERE `login` = '$login'") or die(mysql_error());
				while ($wiersz=mysql_fetch_array($ins)) 
				{
					$email = $wiersz['email'];
				}
				
				$message = '<b>'.$login.'</b>, twoje nowe hasło do logowania to: <br>'.'<b>Hasło: </b>'.$newPass.'<br> Pozdrawiamy, administratorzy serwisu PSI.';
				$message = wordwrap($message, 35); //funkcja dla wiadomości dłuższej niż 70 znakow
				$header = 	"From: Serwis systemy informatyczne";
				$header  .= "\r\n" . 'MIME-Version: 1.0' . "\r\n";
				$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$subject = "Nowe haslo";
				mail($email, $subject, $message, $header);

				$komunikat = '<h3>Resetowanie hasła</h3>'.'<span style="color:green">Na Twój adres e-mail została wysłana wiadomość z nowym, losowo wygenerowanym hasłem. Sprawdź swoją pocztę.</span>';
			}
			else
			{
				$komunikat = '<h3>Resetowanie hasła</h3>'.'<span style="color:red">Wystąpił nieoczekiwany błąd. Spróbuj ponownie.</span>';
			}
		}
		else
		{
			$komunikat = '<h3>Resetowanie hasła</h3>'.'<span style="color:red">Błąd - nie ma użytkownika z takim tokenem i loginem.</span>';
		}
		
	}
	else if($_GET['login'] == NULL OR $_GET['token'] == NULL)
	{
		$komunikat = '<h3>Resetowanie hasła</h3>'.'<span style="color:red">Wystąpił nieoczekiwany błąd. Spróbuj ponownie.</span>';
	}
	else
	{
		$komunikat = '<h3>Resetowanie hasła</h3>'.'<span style="color:red">Wystąpił nieoczekiwany błąd. Spróbuj ponownie.</span>';
	}
?>