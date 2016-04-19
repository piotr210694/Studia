<?php

	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	if(isset($_POST['val2']))
	{
		$id = $_POST['val2'];
		if($id == "")
		{
			echo '<div class="alert alert-warning">';
			echo '<strong>Uwaga!</strong> Kliknij na daną nazwę artykułu w celu zatwierdzenia!</div>';
		}
		$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_artykulu='$id'") or die(mysql_error());
		while($wiersz = @mysql_fetch_assoc($zapytanie))
		{
			$idK = $wiersz['id_kategorii'];
			$title = $wiersz['tytul'];
		}
				$ins1="DELETE FROM `komentarz` WHERE id_artykulu=$id";
				$ins="DELETE FROM `artykuly` WHERE id_artykulu=$id";
				if(mysql_query($ins1))
				{
					if(mysql_query($ins))
					{
						$ins2 = mysql_query("DELETE FROM `kategoria-artykul` WHERE id_artykulu='$id' AND id_kategorii='$idK'");
						$ins3 = mysql_query("DELETE FROM `komentarz-artykul` WHERE id_artykulu='$id'");
						unlink("../artykuly/$title.php");
						echo '<div class="alert alert-success">';
						echo '<strong>Sukces!</strong> Artykuł został usunięty!</div>';
						echo '		<script> $(document).ready(function(){	$("#myModal3").on("hidden.bs.modal", function () {window.setInterval(location.reload(true), 1); //odswiezenie strony
						});	});	</script>';
					}
				}
				else
				{
					//echo 'Blad: '.mysql_error();
				}
		
	}
	
	//wstawiamy dane 
	if(isset($_POST['val3']))
	{
		$id = $_POST['val3'];
		if($id == "")
		{
			echo '<div class="alert alert-warning">';
			echo '<strong>Uwaga!</strong> Kliknij na daną nazwę artykułu w celu zatwierdzenia!</div>';
		}
		else
		{
			$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_artykulu = '$id'") or die(mysql_error());
			while($wiersz = @mysql_fetch_assoc($zapytanie))
			{
				$tytul = $wiersz['tytul']; //stworzenie tablicy tytuly[] 
				$tresc = $wiersz['tresc']; //stworzenie tablicy tytuly[] 
			}
			
			echo '<input name="idOld" value="';
			echo $id;
			echo '" type="hidden">';
			echo '<div class="form-group"  >';
			echo '	<label >Tytuł</label>';
			echo '		<input  type="text" class="form-control" name="title" value="';
			echo $tytul;
			echo '" placeholder="Podaj tytuł artykułu" required>';
			echo '</div>';
		
			echo '<div class="form-group"  >';
			echo '	<label for="tresc">Treść</label>';
			echo '	<textarea id="tresc" type="text" class="form-control" rows="7" name="tresc" value="" placeholder="Podaj tekst dokumentu php" required>';
			echo $tresc;
			echo '</textarea>';
			echo '</div>';
		}
	}
	
	//weryfikacja i edycja w bazie
	if(isset($_POST['val4']))
	{
		if($_POST['title'])
		{
			echo "elo";
		}
	}
		
	
	
?>