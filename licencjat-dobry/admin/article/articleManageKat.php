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
		<meta name="viewport" content="width=device-width">
		<link rel="icon" href="../../01.png" type="image/png" sizes="16x16">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
 	
		<!-- MENU INNE -->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="js/script.js"></script>
		<link rel="stylesheet" href="../css/styles.css">
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
												<span class="glyphicon glyphicon-pencil text-primary"></span><a href="licencjat-dobry/admin/article/articleCreate.php">Stwórz</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-flash text-success"></span><a href="article/articleManageKat.php">Przeglądaj</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-file text-info"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-comment text-success"></span><a href="http://www.jquery2dotnet.com">Comments</a>
												<span class="badge">42</span>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
        

				<div class="col-sm-9 col-md-9">
					<div class="well">	
						<form action="php/connectManageKat.php" method="post" role="form">
							<div class="form-group">
							<label for="sel1">Wybierz kategorię:</label>
							<p><select class="form-control" id="sel1" name="idK">
								<?php 
								$ileK=$_SESSION['ileK'];
								for($i=0; $i<$ileK; $i++)
								{
									echo '<option value="';
									echo $idActive=$_SESSION['idK'][$i];
									echo '">';
									echo $_SESSION['tytulK'][$i];
									echo '</option>';			

								}
								?>  
							</select></p>
							<button type="submit" class="btn btn-success pull-left btn-block">OK</button>
							<br>
						</form>	
							</div>
					</div>
				</div>
				
			</div>
		</div> 
 
	</body>

</html> 