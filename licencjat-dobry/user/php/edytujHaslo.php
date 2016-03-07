<?php
session_start(); //start sesji

	//Nawiązujemy połączenie z bazą
	require_once "../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	$id = $_SESSION['id'];

	error_reporting(E_ALL ^ E_NOTICE);
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$newpass2 = $_POST['newpass2'];
	
	$elogin = $_POST['elogin'];
	$eemail = $_POST['eemail'];
	$ephone = $_POST['ephone'];
	$ename = $_POST['ename'];
	$esurname = $_POST['esurname'];

	
	if($oldpass AND ($newpass == $newpass2) AND ($newpass!="" OR $newpass2!=""))
	{
		$query="UPDATE uzytkownik SET password='$newpass' WHERE id='$id'";
		mysql_query($query);
		echo '<div class="alert alert-success">';
		echo '<strong>Sukces!</strong> Nastąpiła zmiana hasła!</div>';
	}
	else
	{
		echo '<div class="alert alert-danger">';
		echo '<strong>Niepowodzenie!</strong> Popraw błędy!</div>';
	}
		
		
		
		//$login = $_POST['elogin'];
		// $query="UPDATE uzytkownik SET login='$login' WHERE id='$id'";
		// mysql_query($query);
		// echo '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana loginu.';
		
		
		// $_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana loginu.';
		//header('Location: ../manage.php');
	
// error_reporting(E_ALL ^ E_NOTICE); 
// $id=$_SESSION['id'];
// $newlogin = $_POST['elogin'];
// $oldpass = $_POST['oldpass'];
// echo $oldpass;
// $newpassword = $_POST['epass'];
// $newpassword2 = $_POST['epassp'];
// $newphone = $_POST['ephone'];
// $newemail = $_POST['eemail'];
// $newname  = $_POST['ename'];
// $newsurname = $_POST['esurname'];
// if($newlogin)
// {	
	// unset($_SESSION['komunikat']);
	// /* sprawdzanie loginu */
		// $ins = @mysql_query("SELECT login FROM `uzytkownik` WHERE login='$newlogin'") or die(mysql_error());
		// while ($wiersz=mysql_fetch_array($ins)) 
		// {
			// $loginspr = $wiersz['login'];
		// }
	// if($newlogin!=$loginspr)
	// {
	// $query="UPDATE uzytkownik SET login='$newlogin' WHERE id='$id'";
	// mysql_query($query);
	// $_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana loginu.';
	// header('Location: ../manage.php');
	// }
	// else
	// {
		// $_SESSION['komunikat'] = '<span style="color:red">Błąd!</span> Taki login jest już w bazie!';
		// header('Location: ../manage.php');
	// }
// }

// elseif($newpassword AND $newpassword2)
// {
	//wyciagamy obecne hasło
	// $ins = @mysql_query("SELECT password FROM `uzytkownik` WHERE login='$_SESSION[login]'") or die(mysql_error());
		// while ($wiersz=mysql_fetch_array($ins)) 
		// {
			// $actPass = $wiersz['password'];
		// }
	// unset($_SESSION['komunikat']);
	// if($newpassword==$newpassword2 AND $oldpass==$actPass)
	// {
	// $query="UPDATE uzytkownik SET password='$newpassword' WHERE id='$id'";
	// mysql_query($query);
	// $_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana hasła.';
	// header('Location: ../manage.php');
	// }
	
	// elseif($oldpass!=$actPass)
	// {
		// $_SESSION['komunikat'] = '<span style="color:red">Błąd!</span> Obecne hasło jest inne!';
		// header('Location: ../manage.php');	
	// }
	
	// elseif($newpassword!=$newpassword2)
	// {
		// $_SESSION['komunikat'] = '<span style="color:red">Błąd!</span> Hasła nie pokrywają się!';
		// header('Location: ../manage.php');
	// }
// }

// elseif($newemail)
// {
	// unset($_SESSION['komunikat']);
	// $ins = @mysql_query("SELECT email FROM `uzytkownik` WHERE email='$newemail'") or die(mysql_error());
		// while ($wiersz=mysql_fetch_array($ins)) 
		// {
			// $emailspr = $wiersz['email'];
		// }
	
	// if($newemail!=$emailspr)
	// {
	// $query="UPDATE uzytkownik SET email='$newemail' WHERE id='$id'";
	// mysql_query($query);
	// $_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana e-maila.';
	// $_SESSION['email'] = $newemail;
	// header('Location: ../manage.php');
	// }
	// else
	// {
		// $_SESSION['komunikat'] = '<span style="color:red">Błąd!</span> Taki email jest już w bazie!';
		// header('Location: ../manage.php');
	// }
// }

// elseif($newphone)
// {
	// unset($_SESSION['komunikat']);
	// $query="UPDATE uzytkownik SET telefon='$newphone' WHERE id='$id'";
	// mysql_query($query);
	// $_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana telefonu.';
	// $_SESSION['phone'] = $newphone;
	// header('Location: ../manage.php');
// }

// elseif($newname)
// {
	// unset($_SESSION['komunikat']);
	// $query="UPDATE uzytkownik SET imie='$newname' WHERE id='$id'";
	// mysql_query($query);
		// $_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Imię zostało zmienione.';
		// $_SESSION['name'] = $newname;
	// header('Location: ../manage.php');
// }
// elseif($newsurname)
// {
	// unset($_SESSION['komunikat']);
	// $query="UPDATE uzytkownik SET nazwisko='$newsurname' WHERE id='$id'";
	// mysql_query($query);
		// $_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nazwisko zostało zmienione.';
		// $_SESSION['surname'] = $newsurname;
	// header('Location: ../manage.php');
// }
?>
