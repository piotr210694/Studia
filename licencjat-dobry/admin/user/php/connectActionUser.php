<?php	
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	session_start();
	
	if(isset($_POST['usunID']))
	{
		$id = $_POST['usunID'];
		$ins=
		$ins = @mysql_query("DELETE FROM `uzytkownik` WHERE id=$id") or die(mysql_error()); //usunięcie użytkownika
		if($ins)
		{
			$ins=@mysql_query("DELETE FROM `komentarz` WHERE ID_uzytkownika=$id") or die(mysql_error());
			$ins=@mysql_query("DELETE FROM `komentarz-artykul` WHERE ID_uzytkownika=$id") or die(mysql_error());
			unset($_SESSION['zalogowany']);
			header('Location: ../usersView.php');
		}
	}
	else if(isset($_POST['rolaID']) AND isset($_POST['typeA']))
	{
		$id = $_POST['rolaID'];
		$rola = $_POST['typeA'];
		
		$ins = @mysql_query("UPDATE `uzytkownik` SET `rola` = '$rola' WHERE `id` = '$id'") or die(mysql_error()); //zmiana roli
		if($ins)
		{
			header('Location: ../usersView.php');
		}
		else
		{
			echo "Nieoczekiwany błąd!";
		}
	}
	else
	{
		echo "Nieoczekiwany błąd!";
	}
	
	/*$ins="DELETE FROM `uzytkownik` WHERE id=$id";
	if(mysql_query($ins)){
		$ins=mysql_query("DELETE FROM `komentarz` WHERE ID_uzytkownika=$id");
		$ins=mysql_query("DELETE FROM `komentarz-artykul` WHERE ID_uzytkownika=$id");
		unset($_SESSION['zalogowany']);
		header('Location: ../../index.php');
	}
	else{
		echo 'Blad: '.mysql_error();
	}*/
?>