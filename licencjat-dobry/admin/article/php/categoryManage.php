<?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	if(isset($_POST['valUsun']))
	{
		$id = $_POST['valUsun'];
		$ins = @mysql_query("SELECT * FROM `kategoria-artykul` WHERE id_kategorii='$id'") or die(mysql_error());
		$ile = mysql_num_rows($ins);
		if($ile > 0)
		{
			echo '<div class="alert alert-warning">';
			echo '<strong>Uwaga!</strong> W tej kategorii znajdują się artykuły! Nie można jej usunąć póki nie będzie pusta!</div>';
		}
		else
		{
			$ins = @mysql_query("DELETE FROM `kategoria` WHERE id_kategorii='$id'") or die(mysql_error());
			if($ins)
			{
				echo '<div class="alert alert-success">';
				echo '<strong>Sukces!</strong> Kategoria została usunięta!</div>';
				echo '		<script> $(document).ready(function(){	$("#myModal3").on("hidden.bs.modal", function () {window.setInterval(location.reload(true), 1); //odswiezenie strony
							});	});	</script>';
			}
			else
			{
				echo '<div class="alert alert-danger">';
				echo '<strong>Błąd!</strong> Wystąpił nieoczekiwany błąd!</div>';
			}
		}	
	}
	elseif(isset($_POST['valEdytuj']))
	{
		$id = $_POST['valEdytuj'];
		$nazwa = $_POST['nazwa'];
		$ins = @mysql_query("SELECT * FROM `kategoria` WHERE nazwa = '$nazwa'") or die(mysql_error());
		$wiersz = mysql_fetch_array($ins);
		if($wiersz > 0)
		{
			echo '<div class="alert alert-danger">';
			echo '<strong>Błąd!</strong> Zmień nazwę! Taka kategoria jest już w bazie!</div>';
		}
		else
		{
			$ins = @mysql_query("UPDATE `kategoria` SET `nazwa` = '$nazwa' WHERE `id_kategorii` = $id") or die(mysql_error());
			echo '<div class="alert alert-success">';
			echo '<strong>Sukces!</strong> Nazwa kategorii została zmieniona!</div>';
			echo '		<script> $(document).ready(function(){	$("#myModal2").on("hidden.bs.modal", function () {window.setInterval(location.reload(true), 1); //odswiezenie strony
							});	});	</script>';
		}
	}


?>