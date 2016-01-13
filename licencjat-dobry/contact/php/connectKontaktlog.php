 <?php
 session_start();
$email = $_POST['email'];
$message = $_POST['message'];
$message = wordwrap($message, 70); //funkcja dla wiadomości dłuższej niż 70 znakow
	$header = 	"From: <$email>";
	$header  .= "\r\n" . 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$subject = "MESSAGE - Systemy informatyczne";
	
// Wyślij
if($_POST['email'] AND $_POST['message'])
{
	mail('piotr210694@wp.pl', $subject, $message, $header);
	unset($_SESSION['komunikatKON']);
	$_SESSION['komunikatKONlog'] = '<span style="color:green">E-mail został wysłany poprawnie!</span>';
	header('Location: ../kontaktlog.php');
}
else
{
	unset($_SESSION['komunikatKON']);
	$_SESSION['komunikatKONlog'] = '<span style="color:red">Błąd podczas procesu wysyłania maila!</span>';
	header('Location: ../kontaktlog.php');
}

	

?>