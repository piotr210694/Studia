<?php
session_start(); //start sesji
require_once "connection.php";
$id=$_SESSION['id'];
$newlogin = $_POST['elogin'];
$newphone = $_POST['ephone'];

if($newlogin)
{
	$query="UPDATE user SET login='$newlogin' WHERE id='$id'";
	mysql_query($query);
	header('Location: ../manage.php');
}
elseif($newphone)
{
	$query="UPDATE user SET phone='$newphone' WHERE id='$id'";
	mysql_query($query);
	header('Location: ../manage.php');
}
?>
