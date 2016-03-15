<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../logowanie.php');
		exit();
	}
?>

<?php 
	include('php/connectKategoria.php');
?>

<!doctype html>

<html LANG="pl">
  
  <head>
		<title>PSI - Projektuj z pomysłem</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="icon" href="../../01.png" type="image/png" sizes="16x16">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>

 	
		<!-- MENU INNE -->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<link rel="stylesheet" href="../css/styles.css">
		
		
		<script>
			//funkcja edycji danych
			function post()
			{
				var kategoria = $('#kategoria').val();				
				$.post('php/checkCategory.php', {kategoria:kategoria},
				function(data)
				{
					$('#result').html(data);
				});	
			}
			// $(document).ready(function(){
				// $('#select').click(function(){
					// var href = "php/connectKategoria2.php";
					// $('#select').load(href);
				// });
			// });

		</script>
		
		<!-- wydarzenia okienka -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<script>
			$(document).ready(function(){			
					$("#myModal2").on('hidden.bs.modal', function () 
					{
						window.setInterval(location.reload(true), 1); //odswiezenie strony
					});
			});
		</script>
		
	</head>
  
	<body>
		<!-- Panel boczny STRONA GLOWNA-->
		<div class="okno">
			<a href="../../index.php">
				<div class=text>
					<span class="ikona glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
					Strona główna
				</div>
			</a>
		</div>

		
		
		<!-- PANEL dodanie kategorii -->
		<div id="myModal2" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content ">
			  <div class="modal-header modal-header-danger ">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Dodawanie kategorii</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-horizontal" >
						<div class="form-group has-feedback">
							<div class="col-sm-12">
							  <input type="text" class="form-control" id="kategoria" name="kategoria" placeholder="Podaj nazwę nowej kategorii..." onkeydown = "if (event.keyCode == 13)	post();">
							</div>
						</div>
						<div id="result"></div> <!-- Rezultat ECHO  -->
					</div>
			  </div>
			  <div class="modal-footer">
				<form action="user/php/delete.php" >
				<div  onclick="post();" class="btn btn-primary" >Dodaj</div>
				<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
			  </div>
			</div>

		  </div>
		</div>
		
		
		<!-- MENU GLOWNE -->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="panel-group" id="accordion">
					   <div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										<span class="glyphicon glyphicon-folder-close">
										</span>Artykuły
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<span class="glyphicon glyphicon-pencil text-primary"></span><a href="articleCreate.php">Stwórz</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-file text-info"></span><a href="articleManage.php">Przeglądaj</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
								<a  href="../../php/logoutadmin.php"><span class="glyphicon glyphicon-off text-danger">
								</span>Wyloguj</a>
								</h4>
							</div>
						</div>
					</div>
				</div>
        

				<div class="col-sm-9 col-md-9">
					<div class="well">	

						<form action="php/connectArticle.php" method="post" role="form">
						<div class="form-group">
							<label for="sel1">Wybierz kategorię:</label>
								<select class="form-control" id="sel1" name="idK">
								<?php 
									for($i=0; $i<$ileK; $i++)
									{
										echo '<option value="';
										echo $idActive=$idK[$i];
										echo '">';
										echo $tytulK[$i];
										echo '</option>';			
									}
								?>  
								</select>
							<p class="text-right">Chcesz dodać kategorię? <a href='#'  data-toggle="modal" data-target="#myModal2" >Kliknij tutaj</a></p>
							<div class="form-group"  >
								<label >Tytuł</label>
								<input  type="text" class="form-control" name="title" value="" placeholder="Podaj tytuł artykułu" required>
							</div>
							<div class="form-group"  >
								<label for="tresc">Treść</label>
								<textarea type="text" class="form-control" rows="7" name="tresc" placeholder="Podaj tekst dokumentu php" required></textarea>
							</div>
							<button type="submit" class="btn btn-success pull-left btn-block">Stwórz</button>
							<br>
						</form>	
						<?php 
							if(isset($_SESSION['komunikatAC']))
							{
								echo $_SESSION['komunikatAC'];
							}
						?>
						</div>
					</div>
				</div>
				
			</div>
		</div> 
 
	</body>

</html> 