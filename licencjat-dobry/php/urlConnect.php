<?php

	//DO LOKALNEGO
		$url = $_SESSION['urlTutorial'];
		$link = str_replace("/licencjat-dobry/", '', $url); // /licencjat-dobry/
		$link = str_replace("%20",' ', $link);
		
		$url2 = $_SESSION['url'];
		$link2 = str_replace("/licencjat-dobry/", '', $url2);
		$link2 = str_replace("%20",' ', $link2);
		
	//DO STRONY
		// $url = $_SESSION['urlTutorial'];
		// $link = substr($url, 1); 
		// $link = str_replace("%20",' ', $link);
		//*****************************

?>