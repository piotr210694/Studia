 <?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	
	if($_POST['kategoria'])
	{
		$kategoria = $_POST['kategoria'];
		$ins = @mysql_query("SELECT id_kategorii FROM `kategoria` WHERE nazwa = '$kategoria'") or die(mysql_error());
		$wiersz=mysql_fetch_array($ins);
		
		if($wiersz > 0)
		{
			echo '<div class="alert alert-danger">';
			echo '<strong>Błąd!</strong> Zmień nazwę! Taka kategoria jest już w bazie!</div>';
		}
		else
		{
			$ins = @mysql_query("SELECT MAX(id_kategorii) AS max FROM `kategoria`") or die(mysql_error()); //ustalenie id dla kategorii
			while ($wiersz=mysql_fetch_array($ins)) 
			{
				$max_id = $wiersz['max'] + 1;
			}
			$ins = @mysql_query("INSERT INTO `kategoria` (`id_kategorii`, `nazwa`) VALUES ('$max_id', '$kategoria')") or die(mysql_error());
			echo '<div class="alert alert-success">';
			echo '<strong>Sukces!</strong> Kategoria '.$kategoria.'  została poprawnie dodana!</div>';
		}
	}
	else
	{
		echo '<div class="alert alert-danger">';
		echo '<strong>Błąd!</strong> Pole nie może być puste! Podaj nazwę kategorii!</div>';
	}
 
 ?>