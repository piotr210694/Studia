 <?php
 
	//Nawiązujemy połączenie z bazą
	require_once "../../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
 
	if(isset($_POST['del']))
	{
		$id = $_POST['del'];
		$ins = @mysql_query("DELETE FROM `komentarz` WHERE ID_komentarza='$id'") or die(mysql_error());
		$ins2 = @mysql_query("DELETE FROM `komentarz-artykul` WHERE id_komentarza='$id'") or die(mysql_error());
		if($ins AND $ins2)
		{
			echo '<div class="alert alert-success">';
			echo '<strong>Sukces!</strong> Komentarz został usunięty!</div>';
			echo '		<script> $(document).ready(function(){	$("#myModal4").on("hidden.bs.modal", function () {window.setInterval(location.reload(true), 1); //odswiezenie strony
			});	});	</script>';
		}
		else
		{
			echo "Wystąpił nieoczekiwany błąd";
		}
	}
	else if(isset($_POST['edit']) AND isset($_POST['trescE']))
	{
		$id = $_POST['edit'];
		$tresc = $_POST['trescE'];
		$data = date( 'Y-m-d H:i:s' );
		if($tresc != "")
		{
			$ins = @mysql_query("UPDATE `komentarz` SET `tresc`='$tresc', `data_edycji`='$data' WHERE `ID_komentarza` = $id") or die(mysql_error());
			if($ins)
			{
				echo '<div class="alert alert-success">';
				echo '<strong>Sukces!</strong> Edycja komentarza przebiegła pomyślnie!</div>';
				echo '		<script> $(document).ready(function(){	$("#myModal2").on("hidden.bs.modal", function () {window.setInterval(location.reload(true), 1); //odswiezenie strony
				});	});	</script>';
			}
			else
			{
				echo "Wystąpił nieoczekiwany błąd";
			}
		}
		else
		{
			echo '<div class="alert alert-danger">';
			echo '<strong>Błąd!</strong> Pole komentarza nie może być puste!</div>';
		}
	}
	else
	{
		echo '<div class="alert alert-danger">';
		echo '<strong>Błąd!</strong> Wystąpił nieoczekiwany błąd!</div>';
	}
 ?>