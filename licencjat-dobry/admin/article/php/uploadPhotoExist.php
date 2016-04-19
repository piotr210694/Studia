 <?php
		//Nawiązujemy połączenie z bazą
			require_once "../../../php/connect.php"; //wymaga pliku w kodzie
			$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
			$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
		//*****************************
		session_start();
		
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
		
			$image = addslashes(file_get_contents($_FILES['zdjecie']['tmp_name']));
			$name = addslashes($_FILES['zdjecie']['name']);
			//you keep your column name setting for insertion. I keep image type Blob.
			$ins = @mysql_query("SELECT MAX(id) AS max FROM `zdjecia`") or die(mysql_error());
				while ($wiersz=mysql_fetch_array($ins)) 
				{
					$max_id = $wiersz['max'] + 1;
				}
				$idArt = $_SESSION['idToPhotos'];
			$query = "INSERT INTO zdjecia (id,nazwa,zdjecie,id_artykulu) VALUES('$max_id','$name','$image','$idArt')";  
			$qry = mysql_query($query);
			$_SESSION['dzialanie'] = 1;
			if($qry)
			{
				unset($_SESSION['bladDodania2']);
				header('Location: ../articleManage.php');
			}
			else
			{
				unset($_SESSION['bladDodania2']);
				$_SESSION['bladDodania'] = '<p><div class="col-md-6"></div><div class="alert alert-danger col-md-6 text-left"><strong>Błąd!</strong> Niepoprawny format wybranego pliku lub zdjęcie jest zbyt duże!</div></p>';
				header('Location: ../articleCreate.php');
			}
			
			
	
		
		

 ?>