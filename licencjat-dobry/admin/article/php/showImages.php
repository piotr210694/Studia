<?php
	//Nawiązujemy połączenie z bazą
		require_once "../../php/connect.php"; //wymaga pliku w kodzie
		$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
		$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
		$id = $_SESSION['idToPhotos'];
		$result = mysql_query("SELECT zdjecie,id FROM zdjecia WHERE id_artykulu='$id'");
		while($row = mysql_fetch_array($result))
		{
			$zmienna = 'data:image/jpeg;base64,'.base64_encode( $row['zdjecie'] );
			$idZ = $row['id'];
			echo '<a href="'.$zmienna.'" target="_blank"><img class="imageArticle " height="150" width="150" src="'.$zmienna.'"/><a/>';
			echo '<span id="'.$idZ.'" class="glyphicon glyphicon-trash trash-icon" style="margin-right: 30px; margin-bottom: 7px; vertical-align: bottom; "></span>';
			//echo '<img class="imageArticle" height="150" width="150" src="data:image/jpeg;base64,'.base64_encode( $row['zdjecie'] ).'"/>';
			//echo '<img height="300" width="300" src="data:image;base64,'.base64_encode($row['image']).' "> ';
		}
		
?>