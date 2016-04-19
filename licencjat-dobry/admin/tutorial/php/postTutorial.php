<?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	session_start();
	$id = $_SESSION['id']; //id autora
	
	if($_POST['task'] AND $_POST['titleTutorial'] AND $_POST['describeTutorial'])
	{
		$tabTask = serialize($_POST['task']); //zamiana na string
		$title = $_POST['titleTutorial'];
		$describe = $_POST['describeTutorial'];
		$data = date( 'Y-m-d H:i:s' );
		$link = "admin/tutorial/samouczki/$title.php";
		
		$plik=fopen("../samouczki/$title.php", "w"); //utworzenie pliku
		$plik=fopen("../samouczki/$title.php", "a+"); //otworzenie do zapisu
			// dodanie początku pliku
			$plik2 = fopen('../samouczki/startTutorial.php','r');
			$zawartosc = '';
			while(!feof($plik2)) // przypisanie zawartości do zmiennej
			{
			   $linia = fgets($plik2);
			   $zawartosc .= $linia;
			}
			fwrite($plik, $zawartosc); //zapisanie tresci
		
		$ins = @mysql_query("SELECT MAX(id_samouczka) AS max FROM `samouczek`") or die(mysql_error()); //ustalenie id dla artykulu
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$max_id = $wiersz['max'] + 1;
		}
		$ins = @mysql_query("INSERT INTO `samouczek` (`id_samouczka`, `id_autora`, `tytul`, `opis`, `tresc`, `link`, `data`) VALUES ('$max_id', '$id', '$title', '$describe', '$tabTask', '$link', '$data');") or die(mysql_error());
		
		echo "dziala";
		
	}
	else
	{
		echo "nie dziala";
	}
	
	
	
	// echo '<br>';
	// echo $title;
	// echo '<br>';
	// echo $describe;
	// $tab = unserialize($tabTask);
	// echo $tab;
?>