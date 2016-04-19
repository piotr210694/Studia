<?php

	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	if($_POST['val'])
	{
		$idK = $_POST['val']; //id wybranej kategorii
		$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$idK' ORDER BY tytul ASC") or die(mysql_error());
		$ileArt = mysql_num_rows($zapytanie);
		//$_SESSION['ileArt'] = $ileA;
		
		for($i=0; $i < $ileArt; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
		{
			$wiersz = @mysql_fetch_assoc($zapytanie);
			$tytulArt[$i] = $wiersz['tytul']; //stworzenie tablicy tytuly[] 
			$idArt[$i] = $wiersz['id_artykulu'];
		}
		
		echo '<script>var regArt = ""; $(document).ready(function() { $(".regArt-select").click(function(){ 	regArt = $(this).val();  	});	});'; //skrypt
		echo 		'function post2() {	var val2 = regArt;	$.post("php/test2.php", {val2:val2},	function(data)	{ $("#result2").html(data);		});			}';
		echo 		'function post3() {	var val3 = regArt;	$.post("php/test2.php", {val3:val3},	function(data)	{ $("#result3").html(data);		});			}';
		echo 		'function post4() {	var val4 = regArt;	$.post("php/test4.php", {val4:val4},	function(data)	{ $("#result44").html(data);		});			}</script>';
		echo '	<br><div class="form-group">';
		echo ' <label for="sel1">Wybierz tytuł artykułu:</label>';
		echo '  <p><select class="form-control" id="sel1" name="help">';
				for($i = 0; $i < $ileArt; $i++)
				{
					echo '<option class = "regArt-select" value="';
					echo $idActive = $idArt[$i];
					echo '">';
					echo $tytulArt[$i];
					echo '</option>';			
				}		
		echo '  </select></p>';
		echo '		<p><button onclick="post3()"  name="akcja" value="Edytuj" class="btn btn-primary pull-left btn-block" data-toggle="modal" data-target="#myModal2">EDYTUJ</button>';	
		echo '		<button onclick="post4()" type="button" name="akcja" value="Galeria zdjęć" data-toggle="modal" data-target="#myModal22" class="btn btn-primary pull-left btn-block">GALERIA ZDJĘĆ</button>';
		echo '		<button type="button" name="akcja" value="Usun" data-toggle="modal" data-target="#myModal3" class="btn btn-danger pull-left btn-block">USUŃ</button><br><br><br><br><br>';
		echo '		</p>';
		echo '		</div>';
	}
	else
	{
		$ins = @mysql_query("SELECT * FROM `kategoria` ORDER BY nazwa DESC") or die(mysql_error()); //ustalenie id dla artykulu
		while ($wiersz=mysql_fetch_array($ins)) 
		{
			$idK = $wiersz['id_kategorii'];
		}
		$zapytanie = mysql_query("SELECT * FROM `artykuly` WHERE id_kategorii='$idK' ORDER BY tytul ASC") or die(mysql_error());
		$ileArt = mysql_num_rows($zapytanie);
		//$_SESSION['ileArt'] = $ileA;
		
		for($i=0; $i < $ileArt; $i++) //zapisujemy do tablicy kolejne tytuly artykulow
		{
			$wiersz = @mysql_fetch_assoc($zapytanie);
			$tytulArt[$i] = $wiersz['tytul']; //stworzenie tablicy tytuly[] 
			$idArt[$i] = $wiersz['id_artykulu'];
		}
		
		echo '<script>var regArt = ""; $(document).ready(function() { $(".regArt-select").click(function(){ 	regArt = $(this).val();  	});	});'; //skrypt
		echo 		'function post2() {	var val2 = regArt;	$.post("php/test2.php", {val2:val2},	function(data)	{ $("#result2").html(data);		});			}';
		echo 		'function post3() {	var val3 = regArt;	$.post("php/test2.php", {val3:val3},	function(data)	{ $("#result3").html(data);		});			}</script>';
		echo '	<br><div class="form-group">';
		echo ' <label for="sel1">Wybierz tytuł artykułu:</label>';
		echo '  <p><select class="form-control" id="sel1" name="help">';
				for($i = 0; $i < $ileArt; $i++)
				{
					echo '<option class="regArt-select" value="';
					echo $idActive = $idArt[$i];
					echo '">';
					echo $tytulArt[$i];
					echo '</option>';			
				}
		echo '  </select></p>';
		echo '		<p><button onclick="post3()"  name="akcja" value="Edytuj" class="btn btn-primary pull-left btn-block" data-toggle="modal" data-target="#myModal2">EDYTUJ</button>';
			
		echo '		<button type="button" name="akcja" value="Usun" data-toggle="modal" data-target="#myModal3" class="btn btn-danger pull-left btn-block"  >USUŃ</button><br><br><br>';
		echo '		</p>';
		echo '		</div>';
		
	}
	
	
?>