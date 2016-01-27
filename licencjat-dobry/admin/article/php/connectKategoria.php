 <?php
	 // $connection = @mysql_connect('userdb1', '1066219_MqQ', 'QZ6hBU24ArcvPC')
		// or die('Brak połączenia z serwerem MySQL');
	// $db = @mysql_select_db('1066219_MqQ', $connection)
		// or die('Nie mogę połączyć się z bazą danych');


	 $connection = @mysql_connect('localhost', 'root', 'root')
		or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db('sysinf2', $connection)
		or die('Nie mogę połączyć się z bazą danych');
		
//szukamy ile jest kategorii
$zapytanie = mysql_query("SELECT * FROM `kategoria`") or die(mysql_error());
$ileK = mysql_num_rows($zapytanie);
$_SESSION['ileK']=$ileK;

//Zapisujemy do tablicy kolejne tytuly kategorii
for($i=0;$i<$ileK;$i++)
{
	$wiersz = @mysql_fetch_assoc($zapytanie);
    $tytuly[$i]=$wiersz['nazwa']; //stworzenie tablicy tytuly[] 
	$id[$i]=$wiersz['id_kategorii'];
}
$_SESSION['tytulK']=$tytuly; //stworzenie zmiennej sesyjnej tablicowej
$_SESSION['idK']=$id;


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