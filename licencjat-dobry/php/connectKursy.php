 <?php
 session_start();
 
 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf2', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
		 // $connection = @mysql_connect('mysql.cba.pl', 'piotr210694', '!?BazaIO!')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('sysinf_cba_pl', $connection)
		// or die('Nie mogę połączyć się z bazą danych');
 
 
 
 if(isset($_POST['kurs']))
 {
	$data = date( 'Y-m-d H:i:s' );
	$id = $_SESSION['id'];
	$ins = @mysql_query("SELECT MAX(id) AS max FROM `datowanie`") or die(mysql_error());
	while ($wiersz=mysql_fetch_array($ins)) 
	{
		$max_id = $wiersz['max'];
	}
	// Loop to store and display values of individual checked checkbox. WYRZUCENIE zaznaczonych kursow
	foreach($_POST['kurs'] as $selected)
	{
		$max_id += 1;
		echo $selected."</br>";
		$ins = @mysql_query("SELECT * FROM kurs WHERE nazwa='$selected'") or die(mysql_error());
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$idK = $wiersz['id_kursu'];
		}
		$ins = @mysql_query("INSERT INTO `datowanie` (`id`, `id_uzytkownika`, `id_kursu`, `data`) VALUES ('$max_id', '$id', '$idK', '$data')") or die(mysql_error());
	}


	unset($_SESSION['komunikatKurs']);
	$_SESSION['komunikatKurs'] = '<span style="color:green">Operacja zamówienia kursu przebiegła pomyślnie!</span>'.'<br>'.'Niedługo administrator prześle na twój e-mail zamówione materiały.';
	// header('Location: ../kursy.php');
 }
 
 else
 {
	unset($_SESSION['komunikatKurs']);
	$_SESSION['komunikatKurs'] = '<span style="color:red">Nie zaznaczyłeś żadnego kursu!</span> Popraw to!';
	header('Location: ../kursy.php');
 }
 
 ?>
 
 
