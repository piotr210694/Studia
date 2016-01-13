<?php	
	 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');

session_start();
	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		

	
if ($_POST['akcja'] == 'Edytuj') 
{
	$id=$_POST['help'];;
	$_SESSION['iDA']=$_POST['help'];
	$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_artykulu='$id'") or die(mysql_error());
	while($wiersz = @mysql_fetch_assoc($zapytanie))
	{
		$_SESSION['titleArty'] = $wiersz['tytul'];
		$_SESSION['trescA'] = $wiersz['tresc'];
	}
	echo $_SESSION['trescA'];
	header('Location: ../ArticleManageEdit.php');
} 

if ($_POST['akcja'] == 'Usun') 
{
    $id=$_POST['help'];
	$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_artykulu='$id'") or die(mysql_error());
	while($wiersz = @mysql_fetch_assoc($zapytanie))
{
	$title=$wiersz['tytul'];
}
		
		$ins="DELETE FROM `artykuly` WHERE id_artykulu=$id";
		if(mysql_query($ins)){
			unlink("../artykuly/$title.php");
			header('Location: ../../indexad.php');
		}
		else{
			echo 'Blad: '.mysql_error();
		}
} 
else 
{
    echo "Wystąpił niespodziewany błąd";
}
	

	
?>