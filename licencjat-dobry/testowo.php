<?php
	$cleanPass = uniqid("pass");
	$haslo = md5($cleanPass);
	echo $haslo;
	
	echo '<br>';
	echo $_GET['imie'];
	echo $_GET['nazwisko'];
	
	
?>