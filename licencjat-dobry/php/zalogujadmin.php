<?php
	session_start(); //start sesji

	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: ../index.php');
		exit();
	}

	
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$login = htmlentities($login, ENT_QUOTES, "UTF-8"); //zapobieganie wstrzykiwaniu sql
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query( //jesli poprawnie wykonane zapytanie
		sprintf("SELECT * FROM user WHERE login='%s' AND password='%s'", //zapobiegniecie wstrzykiwaniu sql
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$password))))
			{
				$ile_userow = $rezultat->num_rows;
				if($ile_userow>0){	
					$_SESSION['zalogowanyad'] = true; //uzytkownik jest zalogowany
					
					$wiersz = $rezultat->fetch_assoc(); //tablica asocjacyjna by moc wyciagnac z sql
					//utworzenie globalnych zmiennych sesyjnych
					$_SESSION['login'] = $wiersz['login'];
					$_SESSION['id']= $wiersz['id'];
					
					$user=$wiersz['login']; //wyciagniecie danego rekordu z tabeli
					$pass=$wiersz['password']; //wyciagniecie danego rekordu z tabeli
					
					if($user=="admin" and $pass=="!?admin15?16")
					{
					$rezultat->close();
					header('Location: ../admin/indexad.php');
					unset($_SESSION['bladad']); //usuwa zmienna po poprawnym wykonaniu
					}
					else
					{
						unset($_SESSION['zalogowanyad'] );
						$_SESSION['bladad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
						header('Location: ../admin/logowanie.php');
					}
					
				}
				else{
					$_SESSION['bladad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../admin/logowanie.php');
				}
			}
		$polaczenie->close();
	}
	


			

				
					
?>
