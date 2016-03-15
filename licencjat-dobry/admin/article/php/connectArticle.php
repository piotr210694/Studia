  <?php
	 //Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
				
session_start();
	//szukamy ile jest kategorii
	$title = $_POST['title'];
	$ins = @mysql_query("SELECT * FROM `artykuly` where `tytul` = '$title'") or die(mysql_error());
	$wiersz=mysql_fetch_array($ins);

	if($wiersz > 0)
	{
		unset($_SESSION['komunikatAC']);
		$_SESSION['komunikatAC']='<br><span style="color:red">Błąd!</span>'.'<span style="color:black"> Artykuł o takiej nazwie jest już w bazie!'.'</span>';
		header('Location: ../articleCreate.php');
	}
	else
	{
		$plik=fopen("../artykuly/$title.php", "w"); //utworzenie pliku
		$plik=fopen("../artykuly/$title.php", "a+"); //otworzenie do zapisu
			// dodanie początku pliku
			$plik2 = fopen('../artykuly/startbegin.php','r');
			$zawartosc = '';
			while(!feof($plik2)) // przypisanie zawartości do zmiennej
			{
			   $linia = fgets($plik2);
			   $zawartosc .= $linia;
			}
			fwrite($plik, $zawartosc); //zapisanie tresci POCZĄTKU
		$tresc = $_POST['tresc']; 
		fwrite($plik, $tresc); //zapisanie tresci
		$plik2 = fopen('../artykuly/startend.php','r');
			$zawartosc = '';
			while(!feof($plik2)) // przypisanie zawartości do zmiennej
			{
			   $linia = fgets($plik2);
			   $zawartosc .= $linia;
			}
			fwrite($plik, $zawartosc); //zapisanie tresci KONCA

		$ins = @mysql_query("SELECT MAX(id_artykulu) AS max FROM `artykuly`") or die(mysql_error()); //ustalenie id dla artykulu
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$max_id = $wiersz['max']+1;
	}
		$idK = $_POST['idK']; // id KATEGORII
		$link = "admin/article/artykuly/$title.php";
		
		$date = date( 'Y-m-d' );
		if($_POST['title'] AND $_POST['tresc'])
		{
			$ins = @mysql_query("INSERT INTO `artykuly` (`id_artykulu`, `id_kategorii`, `tytul`, `tresc`, `link`, `data`) VALUES ('$max_id', '$idK', '$title', '$tresc', '$link', '$date')") or die(mysql_error());
			
			$ins = @mysql_query("SELECT MAX(id) AS max FROM `kategoria-artykul`") or die(mysql_error()); //ustalenie id dla artykulu
			while ($wiersz=mysql_fetch_array($ins)) 
			{
				$mid = $wiersz['max']+1;
			}
			$ins = @mysql_query("INSERT INTO `kategoria-artykul` (`id`, `id_artykulu`, `id_kategorii`) VALUES ('$mid', '$max_id', '$idK');") or die(mysql_error());
			unset($_SESSION['komunikatAC']);
			$_SESSION['komunikatAC']='<br><span style="color:green">Artykuł </span>'.'<a target="_blank" href="../../'.$link.'">'.$title.'</a>'.'<span style="color:green"> został poprawnie dodany!'.'</span>';
			header('Location: ../articleCreate.php');
		}
		else
		{
			unset($_SESSION['kom']);
			$_SESSION['komunikatAC']='<br><span style="color:red">Wystąpił błąd!'.'</span>';
			header('Location: ../articleCreate.php');
		}
	}


?>