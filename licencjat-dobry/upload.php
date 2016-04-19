 <?php
		//Nawiązujemy połączenie z bazą
			require_once "php/connect.php"; //wymaga pliku w kodzie
			$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
			$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
		//*****************************
		
		// $fhandle = fopen($_FILES['zdjecie']['tmp_name'], "r");
        // $content = base64_encode(fread($fhandle, $_FILES['zdjecie']['size']));
        // fclose($fhandle);
		
		// $zapytanie = mysql_query("INSERT INTO images (id,image) VALUES (1,'$content')");
		
		// $adres = "ADRES_STRONY/showimage.php?id=".mysql_insert_id();
        // echo "Twoje zdjęcie otrzymało adres: <br/>".$adres;
		
		// $result = mysql_query("SELECT image FROM images WHERE id=1");
		// if (mysql_num_rows($result) != 0)
        // {
                // $row = mysql_fetch_assoc($result);
                // echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
        // }
		/*	
			$image = addslashes(file_get_contents($_FILES['zdjecie']['tmp_name']));
//you keep your column name setting for insertion. I keep image type Blob.
$ins = @mysql_query("SELECT MAX(id) AS max FROM `zdjecia`") or die(mysql_error());
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$max_id = $wiersz['max'] + 1;
	}
$query = "INSERT INTO zdjecia (id,nazwa,zdjecie) VALUES('$max_id','cos3','$image')";  
$qry = mysql_query($query);
	*/	
		
		
$result = mysql_query("SELECT zdjecie FROM zdjecia");
                while($row = mysql_fetch_array($result))
                {
                    echo '<img height="300" width="300" src="data:image/jpeg;base64,'.base64_encode( $row['zdjecie'] ).'"/>';
					//echo '<img height="300" width="300" src="data:image;base64,'.base64_encode($row['image']).' "> ';
                }

 ?>