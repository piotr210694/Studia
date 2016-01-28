 <?php
	include('connectCourseInf.php');

  // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf2', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
		
	for($i=0;$i<$maxid+1;$i++)
	{
		if ( isset( $_POST[$i] ) ) 
		{ 
			$zapytanie = mysql_query("SELECT * FROM `kurs` WHERE id_kursu='$i+1'") or die(mysql_error());
			$wiersz = @mysql_fetch_assoc($zapytanie);
			$stan = $wiersz['stan'];
			if($stan==1)
			{
				$stan=0;
			}
			elseif($stan==0)
			{
				$stan=1;
			}
			echo $stan;
			$ins = @mysql_query("UPDATE `kurs` SET `stan` = '$stan' WHERE `id_kursu` = '$i'") or die(mysql_error());
			header("Location: ../kursView.php");
		}
		
		elseif (isset($_POST["Del$i"]))
		{
			$ins=mysql_query("DELETE FROM `kurs` WHERE id_kursu=$i");
		}
		
		
	}


 
 
 
 ?>