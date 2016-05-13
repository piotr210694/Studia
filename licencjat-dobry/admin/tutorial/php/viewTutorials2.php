 <?php	
 
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	
	if(isset($_POST['x']) AND isset($_POST['y'])) 
	{
		$naszaKategoria = $_POST['x'];
		$sortowanie = $_POST['y'];
		
		if($naszaKategoria == '' AND $sortowanie != 0)
		{
				if($sortowanie == 1)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data DESC ") or die(mysql_error());
				}
				else if($sortowanie == 2)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data ASC ") or die(mysql_error());
				}
				else if($sortowanie == 3)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY tytul ASC ") or die(mysql_error());
				}
				else
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY tytul DESC ") or die(mysql_error());
				}
				$ileArt = mysql_num_rows($zapytanie);
				for($i=0; $i < $ileArt; $i++)
				{
					$wiersz = @mysql_fetch_assoc($zapytanie);
					$tytul[$i] = $wiersz['tytul']; //stworzenie tablicy kategorie[]
					$link[$i] = $wiersz['link'];
					$data[$i] = $wiersz['data'];
					$idK[$i] = $wiersz['id_kategorii'];
				}
		}	
		else if ($naszaKategoria != '' AND $sortowanie == 0)
		{
			if($naszaKategoria == 'Wszystkie kategorie')
			{
				$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data DESC ") or die(mysql_error());
			}
			else
			{
				$zapytanie2 = mysql_query("SELECT * FROM `kategoria` WHERE nazwa = '$naszaKategoria'") or die(mysql_error());
				while ($wiersz=mysql_fetch_array($zapytanie2)) 
				{
					$ididK = $wiersz['id_kategorii'];
				}
				$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY data DESC ") or die(mysql_error());
			}
			
				$ileArt = mysql_num_rows($zapytanie);
				for($i=0; $i < $ileArt; $i++)
				{
					$wiersz = @mysql_fetch_assoc($zapytanie);
					$tytul[$i] = $wiersz['tytul']; //stworzenie tablicy kategorie[]
					$link[$i] = $wiersz['link'];
					$data[$i] = $wiersz['data'];
					$idK[$i] = $wiersz['id_kategorii'];
				}
		}
		else if ($naszaKategoria != '' AND $sortowanie != 0)
		{
			if($naszaKategoria == 'Wszystkie kategorie')
			{
				if($sortowanie == 1)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data DESC ") or die(mysql_error());
				}
				else if($sortowanie == 2)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data ASC ") or die(mysql_error());
				}
				else if($sortowanie == 3)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY tytul ASC ") or die(mysql_error());
				}
				else
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY tytul DESC ") or die(mysql_error());
				}
			}
			else
			{
				$zapytanie2 = mysql_query("SELECT * FROM `kategoria` WHERE nazwa = '$naszaKategoria'") or die(mysql_error());
				while ($wiersz=mysql_fetch_array($zapytanie2)) 
				{
					$ididK = $wiersz['id_kategorii'];
				}
				
				if($sortowanie == 1)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY data DESC ") or die(mysql_error());
				}
				else if($sortowanie == 2)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY data ASC ") or die(mysql_error());
				}
				else if($sortowanie == 3)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY tytul ASC ") or die(mysql_error());
				}
				else if($sortowanie == 4)
				{
					$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY tytul DESC ") or die(mysql_error());
				}
			}
			$ileArt = mysql_num_rows($zapytanie);
				for($i=0; $i < $ileArt; $i++)
				{
					$wiersz = @mysql_fetch_assoc($zapytanie);
					$tytul[$i] = $wiersz['tytul']; //stworzenie tablicy kategorie[]
					$link[$i] = $wiersz['link'];
					$data[$i] = $wiersz['data'];
					$idK[$i] = $wiersz['id_kategorii'];
				}			
		}
		else
		{
			echo '<script>alert("Wystąpił błąd!");</script>';
		}
	
	$zapytanie = mysql_query("SELECT * FROM `kategoria` ") or die(mysql_error());
	$ileKat = mysql_num_rows($zapytanie);
	$zapytanie2 = mysql_query("SELECT MAX(id_kategorii) AS max FROM `kategoria` ORDER BY id_kategorii") or die(mysql_error());
	/* wyszukiwanie id */
	while ($wiersz=mysql_fetch_array($zapytanie2)) 
	{
		$max_id = $wiersz['max'];
	}
	for($i=0; $i < $max_id; $i++)
	{
		$wiersz = @mysql_fetch_assoc($zapytanie);
		$idKate[$i] = $wiersz['id_kategorii']; //stworzenie tablicy kategorie[]
		$nazwaKate[$idKate[$i]] = $wiersz['nazwa'];
		$nazwaKa[$i] = $wiersz['nazwa'];
	}
	
	
	echo 	'<table class="table table-hover">
				<thead>
					<tr>
						<th>Artykuł</th>
						<th>Kategoria</th>
						<th>Data utworzenia</th>
					</tr>
				</thead>
				<tbody>';
						for($i = 0; $i < $ileArt; $i++)
						{
							echo '<tr>';
							echo '	<td>';
							echo '		<a href="../../';
							echo 			$link[$i];
							echo '		">';
							echo 			$tytul[$i];
							echo 		'</a>';
							echo '	</td>';
							echo '	<td>';
							echo 		$nazwaKate[$idK[$i]];
							echo '	</td>';
							echo '	<td>';
							echo 		$data[$i];
							echo '	</td>';
							echo '</tr>';
						}
	echo 		'</tbody>
			</table>';
	}
	else
	{
		echo '<script>alert("Wystąpił błąd!");</script>';
	}
	/////////////////////////////////////
	// if(isset($_POST['x']) AND isset($_POST['y'])) 
	// {
		// $naszaKategoria = $_POST['x'];
		// $sortowanie = $_POST['y'];
		// if($_POST['x'] != 'Wszystkie kategorie' AND $_POST['x'] != '')
		// {
			// $zapytanie2 = mysql_query("SELECT * FROM `kategoria` WHERE nazwa = '$naszaKategoria'") or die(mysql_error());
			// while ($wiersz=mysql_fetch_array($zapytanie2)) 
			// {
				// $ididK = $wiersz['id_kategorii'];
			// }
				
			// if($sortowanie != 0)	
			// {
				// if($sortowanie == 1)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY data DESC ") or die(mysql_error());
				// }
				// else if($sortowanie == 2)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY data ASC ") or die(mysql_error());
				// }
				// else if($sortowanie == 3)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY tytul ASC ") or die(mysql_error());
				// }
				// else if($sortowanie == 4)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY tytul DESC ") or die(mysql_error());
				// }
			// }
			// else
			// {
				// $zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY data DESC ") or die(mysql_error());
			// }
			// $ileArt = mysql_num_rows($zapytanie);
			// for($i=0; $i < $ileArt; $i++)
			// {
				// $wiersz = @mysql_fetch_assoc($zapytanie);
				// $tytul[$i] = $wiersz['tytul']; //stworzenie tablicy kategorie[]
				// $link[$i] = $wiersz['link'];
				// $data[$i] = $wiersz['data'];
				// $idK[$i] = $wiersz['id_kategorii'];
			// }
		// }
		// else
		// {
			// if($sortowanie != 0)	
			// {
				// if($sortowanie == 1)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data DESC ") or die(mysql_error());
				// }
				// else if($sortowanie == 2)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly`  ORDER BY data ASC ") or die(mysql_error());
				// }
				// else if($sortowanie == 3)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly`  ORDER BY tytul ASC ") or die(mysql_error());
				// }
				// else if($sortowanie == 4)
				// {
					// $zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY tytul DESC ") or die(mysql_error());
				// }
			// }
			// else
			// {
				// $zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$ididK' ORDER BY data DESC ") or die(mysql_error());
			// }
			// $ileArt = mysql_num_rows($zapytanie);
			// for($i=0; $i < $ileArt; $i++)
			// {
				// $wiersz = @mysql_fetch_assoc($zapytanie);
				// $tytul[$i] = $wiersz['tytul']; //stworzenie tablicy kategorie[]
				// $link[$i] = $wiersz['link'];
				// $data[$i] = $wiersz['data'];
				// $idK[$i] = $wiersz['id_kategorii'];
			// }
		// }
	// }
	// else
	// {
		// szukamy ile jest kategorii w bazie i zapisujemy wynik do zmiennej
			// $zapytanie = mysql_query("SELECT * FROM `artykuly` ORDER BY data DESC ") or die(mysql_error());
			// $ileArt = mysql_num_rows($zapytanie);
			// for($i=0; $i < $ileArt; $i++)
			// {
				// $wiersz = @mysql_fetch_assoc($zapytanie);
				// $tytul[$i] = $wiersz['tytul']; //stworzenie tablicy kategorie[]
				// $link[$i] = $wiersz['link'];
				// $data[$i] = $wiersz['data'];
				// $idK[$i] = $wiersz['id_kategorii'];
			// }
	// }
	////////////////////////////////////////////
?>