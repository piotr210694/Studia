<?php

	session_start();
	
	// unset($_SESSION['zalogowany']);
	// if(!isset($_SESSION['zalogowanyad']))
	// {
		session_unset();
	// }

	
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>