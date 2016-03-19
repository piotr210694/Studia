<?php

	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

	if($_POST['x'] AND $_POST['y'] AND $_POST['z'])
	{
		$tytul = $_POST['x'];
		$tresc = $_POST['y'];
		$id = $_POST['z'];
		$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_artykulu = '$id'") or die(mysql_error());
			while($wiersz = @mysql_fetch_assoc($zapytanie))
			{
				$tytulOld = $wiersz['tytul']; //stworzenie tablicy tytuly[] 
			}		
		$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE tytul = '$tytul'") or die(mysql_error());
		$ile = mysql_num_rows($zapytanie);
		if($ile > 0 AND $tytulOld!=$tytul)
		{
			echo '<div class="alert alert-danger">';
			echo '<strong>Błąd!</strong> Ten tytuł jest już w bazie! Zmień nazwę!</div>';
		}
		else
		{
			$title = $tytul;
			unlink("../artykuly/$tytulOld.php");
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
			fwrite($plik, $tresc); //zapisanie tresci
			$plik2 = fopen('../artykuly/startend.php','r');
				$zawartosc = '';
				while(!feof($plik2)) // przypisanie zawartości do zmiennej
				{
				   $linia = fgets($plik2);
				   $zawartosc .= $linia;
				}
				fwrite($plik, $zawartosc); //zapisanie tresci KONCA
				
			$link = "admin/article/artykuly/$title.php";
			$ins = @mysql_query("UPDATE `artykuly` SET `tytul`='$title', `tresc`='$tresc', `link`='$link' WHERE `id_artykulu` = $id") or die(mysql_error());
			if($ins)
			{
				echo '<div class="alert alert-success">';
				echo '<strong>Sukces!</strong> Aktualizacja artykułu '.'<a target="_blank" href="artykuly/'.$title.'.php">'.$title.'</a> przebiegła pomyślnie!</div>';
				echo '		<script> $(document).ready(function(){	$("#myModal2").on("hidden.bs.modal", function () {window.setInterval(location.reload(true), 1); //odswiezenie strony
							});	});	</script>';
			}
			else
			{
				echo '<div class="alert alert-danger">';
				echo '<strong>Błąd!</strong> Wystąpiły błędy przy aktualizacji danych!</div>';
			}
		}
	}
	else
	{
		echo '<div class="alert alert-danger">';
		echo '<strong>Błąd!</strong> Uzupełnij wymagane pola!</div>';
	}

?>