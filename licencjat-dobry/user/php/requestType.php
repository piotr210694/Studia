<?php
	//Nawiązujemy połączenie z bazą
	require_once "../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	
	session_start();
	
	if($_POST['typeA'])
	{
		$rola = $_POST['typeA']; // rola
		
		if($rola != $_SESSION['rola'])
		{
			$idUser = $_SESSION['id'];
			
			$ins = @mysql_query("SELECT * FROM `powiadomienia` WHERE id_uzytkownika = '$idUser'") or die(mysql_error()); //ustalenie id dla artykulu
			$howRow = mysql_num_rows($ins);
			if($howRow > 0)
			{
				while ($wiersz=mysql_fetch_array($ins)) 
				{
					$stan = $wiersz['stan'];
				}	
				if($stan == 1)
				{
					unset($_SESSION['komunikatRoli']);
					$_SESSION['komunikatRoli'] = '<div class="alert alert-warning"><strong>Uwaga! </strong>Już złożyłeś prośbę. Czekaj na reakcję administratora!</div>';
					header('Location: ../accountRole.php');
				}
				else
				{
					$data = date( 'Y-m-d H:i:s' );
				
					$ins = @mysql_query("SELECT MAX(id) AS max FROM `powiadomienia`") or die(mysql_error()); //ustalenie id dla artykulu
					while ($wiersz=mysql_fetch_array($ins)) 
					{
						$max_id = $wiersz['max']+1;
					}	
					
					$ins = @mysql_query("INSERT INTO `powiadomienia` (`id`, `id_uzytkownika`, `rola`, `data`, `stan`) VALUES ('$max_id', '$idUser', '$rola', '$data', 1)") or die(mysql_error());
					
					unset($_SESSION['komunikatRoli']);
					$_SESSION['komunikatRoli'] = '<div class="alert alert-success"><strong>Sukces! </strong>Prośba została wysłana. Czekaj na decyzję administratora!</div>';
					header('Location: ../accountRole.php');
				}
			}
			else
			{
				$data = date( 'Y-m-d H:i:s' );
				
				$ins = @mysql_query("SELECT MAX(id) AS max FROM `powiadomienia`") or die(mysql_error()); //ustalenie id dla artykulu
				while ($wiersz=mysql_fetch_array($ins)) 
				{
					$max_id = $wiersz['max']+1;
				}	
				
				$ins = @mysql_query("INSERT INTO `powiadomienia` (`id`, `id_uzytkownika`, `rola`, `data`, `stan`) VALUES ('$max_id', '$idUser', '$rola', '$data', 1)") or die(mysql_error());
				
				unset($_SESSION['komunikatRoli']);
				$_SESSION['komunikatRoli'] = '<div class="alert alert-success"><strong>Sukces! </strong>Prośba została wysłana. Czekaj na decyzję administratora!</div>';
				header('Location: ../accountRole.php');
			}
			
			
			
			
		}
		else
		{
			unset($_SESSION['komunikatRoli']);
			$_SESSION['komunikatRoli'] = '<div class="alert alert-warning"><strong>Uwaga! </strong>Wybrałeś typ konta taki, jaki posiadasz obecnie!</div>';
			header('Location: ../accountRole.php');
		}
	}
	else
	{
		unset($_SESSION['komunikatRoli']);
		$_SESSION['komunikatRoli'] = "Wystąpił nieoczekiwany błąd";
		header('Location: ../accountRole.php');
	}
	
			
?>