<?php
session_start();
		 
	//Nawiązujemy połączenie z bazą
	require_once "../../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
		
		//DO LOKALNEGO
		$url = $_SESSION['url'];
		$link = str_replace("/licencjat-dobry/", '', $url); // /licencjat-dobry/
		$link = str_replace("%20",' ', $link);
		
		//DO STRONY
		// $url = $_SESSION['url'];
		// $link = substr($url, 1); 
		// $link = str_replace("%20",' ', $link);
		//*****************************
	
	if($_POST['komentarz'])
	{		
		$ins = @mysql_query("SELECT * FROM artykuly WHERE link = '$link'") or die(mysql_error());
		while($wiersz = mysql_fetch_array($ins))
		{
			$idA = $wiersz['id_artykulu'];
			$title = $wiersz['tytul'];
		}
		
		$ins = @mysql_query("SELECT MAX(id_komentarza) AS max FROM `komentarz`") or die(mysql_error());
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$max_id = $wiersz['max']+1;
		}
		$idK = $max_id;
		$tresc = $_POST['komentarz'];
		$date = date( 'Y-m-d H:i:s' );
		$idU = $_SESSION['id'];
				
		// echo $idK;
		// echo $idA;
		// echo $tresc;
		// echo $date;
		// echo $idU;
		
		$zapytanie = @mysql_query("INSERT INTO `komentarz` (`ID_komentarza`, `ID_artykulu`, `tresc`, `data`, `ID_uzytkownika`) VALUES ('$idK', '$idA', '$tresc', '$date', '$idU')") or die(mysql_error());
		
		$ins = @mysql_query("SELECT MAX(id) AS max FROM `komentarz-artykul`") or die(mysql_error());
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$mid = $wiersz['max']+1;
		}
		$zapytanie = @mysql_query("INSERT INTO `komentarz-artykul` (`id`, `id_komentarza`, `id_artykulu`, `id_uzytkownika`) VALUES ('$mid', '$idK', '$idA', '$idU')") or die(mysql_error());
		header("Location: ../../artykuly/$title.php");
	}
	else
	{
		echo "Błąd";
	}
	

?>