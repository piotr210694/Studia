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
 
 if(isset($_POST['stan'])){
 if($_POST["stan"]==0)
 {
	$stan=0; //aktywny
 }
 elseif($_POST["stan"]==1)
 {
	$stan=1; //nieaktywny
 }
 }

 $name = $_POST['name'];
 $price = $_POST['price'];

 
  //szukamy ile jest kursów bazie i zapisujemy wynik do zmiennej
$ins = @mysql_query("SELECT MAX(id_kursu) AS max FROM `kurs`") or die(mysql_error());
while ($wiersz=mysql_fetch_array($ins)) 
{
	$max_id = $wiersz['max']+1;
}

/* sprawdzanie nazwy */
		$ins = @mysql_query("SELECT nazwa FROM `kurs` WHERE nazwa='$name'") or die(mysql_error());
while ($wiersz=mysql_fetch_array($ins)) 
{
	$namespr = $wiersz['nazwa'];
}

 if($_POST['name']!=$namespr AND ($price>0))
 {
	unset($_SESSION['komAdd']);
	$ins = @mysql_query("INSERT INTO `kurs` (`id_kursu`, `nazwa`, `cena`, `stan`) VALUES ('$max_id', '$name', '$price', '$stan')");
	$_SESSION['komAdd'] = '<span style="color:green">Operacja dodawanie kursu przebiegła pomyślnie!</span>';
	header("Location: ../kursAdd.php");
 }
  elseif($price<=0)
 {
	unset($_SESSION['komAdd']);
	$_SESSION['komAdd'] = '<span style="color:red">Podaj właściwą cenę!</span>';
	header("Location: ../kursAdd.php");
 }
  
  elseif($_POST['name']==$namespr)
 {
	unset($_SESSION['komAdd']);
	$_SESSION['komAdd'] = '<span style="color:red">Ta nazwa kursu jest już zajęta!</span>';
	header("Location: ../kursAdd.php");
 }
 
 
 else
 {
	unset($_SESSION['komAdd']);
	$_SESSION['komAdd'] = '<span style="color:red">Wystąpił błąd!</span>';
	header("Location: ../kursAdd.php");
 }
 
 ?>