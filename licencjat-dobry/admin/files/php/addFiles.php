<?php
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	session_start();

	$plik_tmp = $_FILES['plik']['tmp_name'];
	$plik_nazwa = $_FILES['plik']['name'];
	$str = iconv('utf-8','us-ascii//TRANSLIT//IGNORE', $plik_nazwa); 
	$str = str_replace("'",'', $str); 
	$plik_nazwa = $str;	
	
	$plik_rozmiar = $_FILES['plik']['size'];
	$plik_typ = $_FILES['plik']['type'];

	$plik_rozmiar = $plik_rozmiar / 1024;
	$plik_rozmiar = round($plik_rozmiar, 2);

	$idArt = $_POST['art'];

	// echo $plik_tmp;
	// echo '<br>';
	// echo $plik_nazwa;
	// echo '<br>';
	// echo $plik_rozmiar;
	// echo ' kb';
	// echo '<br>';
	// echo $plik_typ;
	// echo '<br>';

	if(is_uploaded_file($plik_tmp)) 
	{
		move_uploaded_file($plik_tmp, "../../../pliki/$plik_nazwa");
		
		$ins = @mysql_query("SELECT MAX(id) AS max FROM `pliki`") or die(mysql_error());
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$max_id = $wiersz['max'] + 1;
		}
		
		$ins = @mysql_query("INSERT INTO pliki (id,id_artykulu,nazwa,typ,rozmiar) VALUES('$max_id','$idArt','$plik_nazwa','$plik_typ','$plik_rozmiar')") or die(mysql_error());
		if($ins)
		{
			unset($_SESSION['commFiles']);
			$_SESSION['commFiles'] = '<span style="color:green;">Dodano plik!</span>';
			header('Location: ../filesView.php');
		}
		else
		{
			unset($_SESSION['commFiles']);
			$_SESSION['commFiles'] = '<span style="color:red;">Wystąpił nieoczekiwany błąd!</span>';
			header('Location: ../filesView.php');
		}
	}
	else
	{
		unset($_SESSION['commFiles']);
		$_SESSION['commFiles'] = '<span style="color:red;">Błąd podczas przesyłania pliku!</span>';
		header('Location: ../filesView.php');
	}
    // echo "Plik: <strong>$plik_nazwa</strong> o rozmiarze 
    // <strong>$plik_rozmiar bajtów</strong> został przesłany na serwer!";
	
	


	//header('Location: ../filesView.php');

?>