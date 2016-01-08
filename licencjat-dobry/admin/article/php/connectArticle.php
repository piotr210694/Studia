  <?php

 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf', $connection)
		or die('Nie mogę połączyć się z bazą danych');

		

	//szukamy ile jest kategorii
$title = $_POST['title'];
$ins = @mysql_query("SELECT * FROM `artykuly` where `tytul` = '$title'") or die(mysql_error());
$wiersz=mysql_fetch_array($ins);

if($wiersz>0)
{
	echo "blad";
}
else
{
	$plik=fopen("../artykuly/$title.php", "w"); //utworzenie pliku
	$tresc = $_POST['tresc']; 
	fwrite($plik, $tresc); //zapisanie tresci
	$ins = @mysql_query("SELECT MAX(id_artykulu) AS max FROM `artykuly`") or die(mysql_error()); //ustalenie id dla artykulu
while ($wiersz=mysql_fetch_array($ins)) 
{
	$max_id = $wiersz['max']+1;
}
	$idK = $_POST['idK']; // id KATEGORII
	$link = "admin/article/artykuly/$title.php";
	
	$date = date( 'Y-m-d' );
	$ins = @mysql_query("INSERT INTO `artykuly` (`id_artykulu`, `id_kategorii`, `tytul`, `tresc`, `link`, `data`) VALUES ('$max_id', '$idK', '$title', '$tresc', '$link', '$date')") or die(mysql_error());
	header('Location: ../articleCreate.php');
}
// $_SESSION['idK']=$id;


// {
// $pass=$wiersz['password'];
// $login=$wiersz['login'];
// $bazamail=$wiersz['email'];

// }

// $message = 'Twoje dane do zalogowania to:'.' LOGIN:'.$login.' HASLO:'.$pass;
// $message = wordwrap($message, 35); //funkcja dla wiadomości dłuższej niż 70 znakow
	// $header = 	"From: Serwis systemy informatyczne";
	// $header  .= "\r\n" . 'MIME-Version: 1.0' . "\r\n";
    // $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	// $subject = "Odzyskiwanie hasla";

	
		
// if($_POST['email'] AND $_POST['email']==$bazamail)
// {
	// mail($email, $subject, $message, $header);
		// unset($_SESSION['bladremind']);
	// $_SESSION['komunikatremind'] = '<span style="color:green">Operacja odzyskiwania hasła przebiegła pomyślnie!</span>'.'<br>'.'Na podany adres e-mail została wysłana wiadomość z danymi potrzebnymi do zalogowania.';
	// header('Location: ../remindpass.php');

// }
// else
// {
	// unset($_SESSION['komunikatremind']);
	// $_SESSION['bladremind'] = '<span style="color:red">Tego adresu e-mail nie ma w naszej bazie! </span>'.'<a href="">Załóż konto</a>';
	// header('Location: ../remindpass.php');
// }
	

?>