<?php	 
function connection(){
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
		
}
?>