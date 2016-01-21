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
	$query="UPDATE uzytkownik SET login='$newlogin' WHERE id='$id'";
	mysql_query($query);
	header('Location: ../manage.php');
}
elseif($newphone)
{
	$query="UPDATE uzytkownik SET telefon='$newphone' WHERE id='$id'";
	mysql_query($query);
	header('Location: ../manage.php');
}
elseif($newemail)
{
	$query="UPDATE uzytkownik SET email='$newemail' WHERE id='$id'";
	mysql_query($query);
	header('Location: ../manage.php');
}
elseif($newname)
{
	$query="UPDATE uzytkownik SET imie='$newname' WHERE id='$id'";
	mysql_query($query);
	header('Location: ../manage.php');
}
elseif($newsurname)
{
	$query="UPDATE uzytkownik SET nazwisko='$newsurname' WHERE id='$id'";
	mysql_query($query);
	header('Location: ../manage.php');
}
?>
