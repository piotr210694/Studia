<?php
	//Nawiązujemy połączenie z bazą
	require_once "../../../php/connect.php"; //wymaga pliku w kodzie
	$connection = @mysql_connect($host, $db_user, $db_password) or die('Brak połączenia z serwerem MySQL');
	$db = @mysql_select_db($db_name, $connection) or die('Nie mogę połączyć się z bazą danych');
	//*****************************
	session_start();

	if(isset($_POST['val4']))
	{
		$idArt = $_POST['val4'];
		if($idArt == '')
		{
			echo '<div class="alert alert-warning">';
			echo '<strong>Uwaga!</strong> Kliknij na daną nazwę artykułu w celu zatwierdzenia!</div>';
		}
		else
		{
			$result = mysql_query("SELECT zdjecie,id FROM zdjecia WHERE id_artykulu='$idArt'");
			while($row = mysql_fetch_array($result))
			{
				$zmienna = 'data:image/jpeg;base64,'.base64_encode( $row['zdjecie'] );
				$idZ = $row['id'];
				echo '<a href="'.$zmienna.'" target="_blank"><img class="imageArticle " height="150" width="150" src="'.$zmienna.'"/><a/>';
				echo '<span id="'.$idZ.'" class="glyphicon glyphicon-trash trash-icon" style="margin-right: 30px; margin-bottom: 7px; vertical-align: bottom; "></span>';
				//echo '<img class="imageArticle" height="150" width="150" src="data:image/jpeg;base64,'.base64_encode( $row['zdjecie'] ).'"/>';
				//echo '<img height="300" width="300" src="data:image;base64,'.base64_encode($row['image']).' "> ';
			}
			$_SESSION['ONphoto'] = 1;
					echo '<!-- akcja po nacisnieciu na kosz przy zdjeciu -->
		<script>
			$(document).ready(function()
			{
				$(".trash-icon").click(function(){
					var tmp = $(this).attr("id");
					$.post("php/deleteImage.php", {tmp:tmp},
					function(data)
					{
						
						//window.setInterval(location.reload(true), 1); //odswiezenie strony	
						$("#result44").html(data);
						
					});					
				});
				
			});
		</script>';
		}
	}
	
?>