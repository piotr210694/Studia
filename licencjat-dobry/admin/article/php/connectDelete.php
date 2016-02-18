<?php	
	 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');

session_start();
	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf2', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
		 // $connection = @mysql_connect('mysql.cba.pl', 'piotr210694', '!?BazaIO!')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('sysinf_cba_pl', $connection)
		// or die('Nie mogę połączyć się z bazą danych');
		

	
if ($_POST['akcja'] == 'Edytuj') 
{
	$id=$_POST['help'];
	$_SESSION['idART']=$id;
	
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

if ($_POST['akcja'] == 'Usuń') 
{
    $id=$_POST['help'];
	$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_artykulu='$id'") or die(mysql_error());
	while($wiersz = @mysql_fetch_assoc($zapytanie))
{
	$idK = $wiersz['id_kategorii'];
	$title = $wiersz['tytul'];

}
		$ins1="DELETE FROM `komentarz` WHERE id_artykulu=$id";
		$ins="DELETE FROM `artykuly` WHERE id_artykulu=$id";
		if(mysql_query($ins1)){
		if(mysql_query($ins)){
			$ins2 = mysql_query("DELETE FROM `kategoria-artykul` WHERE id_artykulu='$id' AND id_kategorii='$idK'");
			$ins3 = mysql_query("DELETE FROM `komentarz-artykul` WHERE id_artykulu='$id'");
			unlink("../artykuly/$title.php");
			header('Location: ../../indexad.php');
		}
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