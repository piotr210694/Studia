<?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	session_start();
	
	if(isset($_POST['Akceptuj']))
	{
		//echo $_POST['Akceptuj'];
		$idUser = $_POST['Akceptuj'];
		$rola = $_POST['rola'];
		$ins = @mysql_query("UPDATE `uzytkownik` SET `rola` = '$rola' WHERE `id` = '$idUser'") or die(mysql_error()); //zmiana roli
		$_SESSION['rola'] = $rola;
		if($ins)
		{
			$ins = @mysql_query("UPDATE `powiadomienia` SET `stan` = '0' WHERE `id_uzytkownika` = '$idUser'") or die(mysql_error()); //zmiana stanu powiadomien
			unset($_SESSION['komunikatRequest']);
			$_SESSION['komunikatRequest'] = '<span style="color:green">Rola użytkownika została zmieniona poprawnie!</span>';
			header('Location: ../changeTypeAccount.php');
		}
		else
		{
			unset($_SESSION['komunikatRequest']);
			$_SESSION['komunikatRequest'] = '<span style="color:red">Wystąpił błąd!'.'</span>';
			header('Location: ../changeTypeAccount.php');
		}
	}
	else if(isset($_POST['Odrzuc']))
	{
		//echo $_POST['Odrzuc'];
		$idUser = $_POST['Odrzuc'];
		$ins = @mysql_query("UPDATE `powiadomienia` SET `stan` = '0' WHERE `id_uzytkownika` = '$idUser'") or die(mysql_error()); //zmiana stanu powiadomien
		if($ins)
		{
			unset($_SESSION['komunikatRequest']);
			$_SESSION['komunikatRequest'] = '<span style="color:green">Operacja odrzucenia prośby przebiegła pomyślnie!</span>';
			header('Location: ../changeTypeAccount.php');
		}
		else
		{
			unset($_SESSION['komunikatRequest']);
			$_SESSION['komunikatRequest'] = '<span style="color:red">Wystąpił błąd!'.'</span>';
			header('Location: ../changeTypeAccount.php');
		}
	}
	else
	{
		unset($_SESSION['komunikatRequest']);
		$_SESSION['komunikatRequest'] = '<span style="color:red">Wsytąpił nieoczekiwany błąd!</span>';
		header('Location: ../changeTypeAccount.php');
	}

?>