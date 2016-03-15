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
			echo "kliknij na dana nazwe artykulu w celu zatwierdzenia".'<br>';
			// $ins = @mysql_query("SELECT * FROM `artykuly` ORDER BY tytul DESC") or die(mysql_error()); //ustalenie id dla artykulu
			// while ($wiersz=mysql_fetch_array($ins)) 
			// {
				// $id = $wiersz['id_artykulu'];
			// }
			// echo $id;
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
						echo "artykul zostal usuniety";
						echo '		<script> $(document).ready(function(){	$("#myModal3").on("hidden.bs.modal", function () {window.setInterval(location.reload(true), 1); //odswiezenie strony
						});	});	</script>';
					}
				}
				// else
				// {
					// echo 'Blad: '.mysql_error();
				// }
		
	}
	if(isset($_POST['val3']))
	{
		echo "edytujemy";
		echo $_POST['val3'];
	}
	
	
?>