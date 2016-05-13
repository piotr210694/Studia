<?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	

	$idK = $_GET['idK'];

	
	$ins = @mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii = '$idK'") or die(mysql_error());
	$ileA = mysql_num_rows($ins);
	
	echo 	'<label  for="sel2">Artykuł:</label>
			<select class="form-control" name="art" id="art">
			<option value="" selected disabled>Wybierz artykuł</option>';		
	for($i = 0; $i < $ileA; $i++) 
	{
		$wiersz = @mysql_fetch_assoc($ins);
		$tytul[$i] = $wiersz['tytul']; 
		$idA[$i] = $wiersz['id_artykulu']; 
		
		echo '<option value="';
		echo $idA[$i];
		echo '">';
		echo $tytul[$i];
		echo '</option>';	
	}
	echo '</select>';

?>