   <?php
	 //Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************

		

$title = $_POST['title'];
$id = $_SESSION['iDA'];
	unlink("../artykuly/$title.php");
	$plik=fopen("../artykuly/$title.php", "w"); //utworzenie pliku
	$plik=fopen("../artykuly/$title.php", "a+"); //otworzenie do zapisu
		// dodanie początku pliku
		$plik2 = fopen('../artykuly/startbegin.php','r');
		$zawartosc = '';
		while(!feof($plik2)) // przypisanie zawartości do zmiennej
		{
		   $linia = fgets($plik2);
		   $zawartosc .= $linia;
		}
		fwrite($plik, $zawartosc); //zapisanie tresci POCZĄTKU
	$tresc = $_POST['tresc']; 
	fwrite($plik, $tresc); //zapisanie tresci
	$plik2 = fopen('../artykuly/startend.php','r');
		$zawartosc = '';
		while(!feof($plik2)) // przypisanie zawartości do zmiennej
		{
		   $linia = fgets($plik2);
		   $zawartosc .= $linia;
		}
		fwrite($plik, $zawartosc); //zapisanie tresci KONCA


	
	$link = "admin/article/artykuly/$title.php";
	if($_POST['title'] AND $_POST['tresc'])
	{
		$ins = @mysql_query("UPDATE `artykuly` SET `tytul`='$title', `tresc`='$tresc', `link`='$link' WHERE `id_artykulu` = $id") or die(mysql_error());
		unset($_SESSION['komunikatAME']);
		$_SESSION['komunikatAME']='<span style="color:green">Artykuł </span>'.$title.'<span style="color:green"> został poprawnie edytowany!'.'</span>';
		header('Location: ../articleManageEdit.php');
	}
	else
	{
		unset($_SESSION['komunikatAME']);
		$_SESSION['komunikatAME']='<span style="color:red">Wystąpił błąd!'.'</span>';
		header('Location: ../articleManageEdit.php');
	}

	

?>