  <?php
            /*
            displayimage();
*/
			
			//Nawiązujemy połączenie z bazą
			require_once "connect.php"; //wymaga pliku w kodzie
			$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
			$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
			//*****************************
			
			
			

			
			
			
			
			
			
			
			
			
			
			
			
			
			/*
			if(isset($_POST['sumit']))
            {
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    $image = addslashes($_FILES['image']['tmp_name']);
                    $name = addslashes($_FILES['image']['name']);
                    $image = file_get_contents($image);
                    $image = base64_encode($image);
                    saveimage($name,$image);
                }
            }
			
			function saveimage($name,$image)
            {
                $qry = "insert into images (name,image) values ('$name','$image')";
                $result = mysql_query($qry);
                if($result)
                {
                    echo "<br/>Image uploaded.";
                }
                else
                {
                    echo "<br/>Image not uploaded.";
                }
            }
			
            function displayimage()
            {
                $result = mysql_query("SELECT * FROM images");
                while($row = mysql_fetch_array($result))
                {
                    echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';
                }
            }
			displayimage();
			*/
        ?>