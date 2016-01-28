<?php

	session_start();
	// unset($_SESSION['zalogowanyad']);
	// if(!isset($_SESSION['zalogowany']))
	// {
		session_unset();
	// }

	
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>