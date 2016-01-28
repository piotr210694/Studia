<?php
session_start(); //start sesji
require_once "connection.php";
$id=$_SESSION['id'];
$newlogin = $_POST['elogin'];
$newphone = $_POST['ephone'];
$newemail = $_POST['eemail'];
$newname  = $_POST['ename'];
$newsurname = $_POST['esurname'];
if($newlogin)
{	
	unset($_SESSION['komunikat']);
	/* sprawdzanie loginu */
		$ins = @mysql_query("SELECT login FROM `uzytkownik` WHERE login='$newlogin'") or die(mysql_error());
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$loginspr = $wiersz['login'];
		}
	if($newlogin!=$loginspr)
	{
	$query="UPDATE uzytkownik SET login='$newlogin' WHERE id='$id'";
	mysql_query($query);
	$_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana loginu.';
	header('Location: ../manage.php');
	}
	else
	{
		$_SESSION['komunikat'] = '<span style="color:red">Błąd!</span> Taki login jest już w bazie!';
		header('Location: ../manage.php');
	}
}

elseif($newpassword AND $newpassword2)
{
	unset($_SESSION['komunikat']);
	if($newpassword==$newpassword2)
	{
	$query="UPDATE uzytkownik SET password='$newpassword' WHERE id='$id'";
	mysql_query($query);
	$_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana hasła.';
	header('Location: ../manage.php');
	}
	elseif($newpassword!=$newpassword2)
	{
		$_SESSION['komunikat'] = '<span style="color:red">Błąd!</span> Hasła nie pokrywają się!';
		header('Location: ../manage.php');
	}
}

elseif($newemail)
{
	unset($_SESSION['komunikat']);
	$ins = @mysql_query("SELECT email FROM `uzytkownik` WHERE email='$newemail'") or die(mysql_error());
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$emailspr = $wiersz['email'];
		}
	
	if($newemail!=$emailspr)
	{
	$query="UPDATE uzytkownik SET email='$newemail' WHERE id='$id'";
	mysql_query($query);
	$_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana e-maila.';
	header('Location: ../manage.php');
	}
	else
	{
		$_SESSION['komunikat'] = '<span style="color:red">Błąd!</span> Taki email jest już w bazie!';
		header('Location: ../manage.php');
	}
}

elseif($newphone)
{
	unset($_SESSION['komunikat']);
	$query="UPDATE uzytkownik SET telefon='$newphone' WHERE id='$id'";
	mysql_query($query);
	$_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nastąpiła zmiana telefonu.';
	header('Location: ../manage.php');
}

elseif($newname)
{
	unset($_SESSION['komunikat']);
	$query="UPDATE uzytkownik SET imie='$newname' WHERE id='$id'";
	mysql_query($query);
		$_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Imię zostało zmienione.';
	header('Location: ../manage.php');
}
elseif($newsurname)
{
	unset($_SESSION['komunikat']);
	$query="UPDATE uzytkownik SET nazwisko='$newsurname' WHERE id='$id'";
	mysql_query($query);
		$_SESSION['komunikat'] = '<span style="color:green">Operacja przebiegła pomyślnie!</span> Nazwisko zostało zmienione.';
	header('Location: ../manage.php');
}
?>
