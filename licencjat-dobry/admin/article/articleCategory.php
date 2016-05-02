 <?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../logowanie.php');
		exit();
	}
?>

<?php 
	include('php/viewRequest.php');
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
		<script src="../js/script.js"></script>
		<link rel="stylesheet" href="../css/styles.css">
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
		<!-- Do wybrania kategorii -->
		<script>
		var valUsun = "";
		var valEdytuj = "";
		$(document).ready(function()
		{
			$(".usun").click(function(){
				valUsun = $(this).val();
			});
			$(".edytuj").click(function(){
				valEdytuj = $(this).val();
				// var tab = new Array(
				// <?php 
				// echo "'";
				// for($i=0; $i < $max_id; $i++)
				// { 
					// echo $kategoria2[$i]; 
						// if($i == ($max_id - 1))
						// {
							// echo "'";
						// }
						// else
						// {
							// echo "','"; 
						// }
				// }
					
				// ?>);
				$("#categorySet").val( $(this).attr('nazwa') );
				
			});
		});
			
		function post()
		{			
			$.post('php/categoryManage.php', {valUsun:valUsun},
			function(data)
			{
				$('#result').html(data);
			});
		}		
		
		function post2()
		{			
			var nazwa = document.getElementsByName("kategoria")[0].value;
			$.post('php/categoryManage.php', {valEdytuj:valEdytuj, nazwa:nazwa},
			function(data)
			{
				$('#result2').html(data);
			});
		}
		
		
			
		</script>
	
			<!-- wydarzenia okienka -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<!--Trzeba bylo nizej przesunac -->
		<!-- <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script> -->
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
												<span class="glyphicon glyphicon-pencil text-primary"></span><a href="articleCreate.php">Stwórz</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-file text-info"></span><a href="articleManage.php">Przeglądaj</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-list-alt text-info"></span><a href="articleCategory.php">Kategorie</a>
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
				
				
<!-- Usuniecie kategorii - MODAL -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie kategorii</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć wybraną kategorię?</p>
		<div id="result"></div>
      </div>
      <div class="modal-footer">
		<button  name="akcja" value="Usuń" onclick="post()" class="btn btn-danger" >Usuń</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>

<!-- Zmiana nazwy kategorii - MODAL -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Zmiana nazwy kategorii</h4>
      </div>
		<div class="modal-body">
					<div class="form-horizontal" >
						<div class="form-group has-feedback">
							<div class="col-sm-12">
							  <input type="text" class="form-control " id="categorySet" name="kategoria"  onkeydown = "if (event.keyCode == 13)	post2();">
							</div>
						</div>
						<div id="result2"></div> <!-- Rezultat ECHO  -->
					</div>
      </div>
      <div class="modal-footer">
		<button  name="akcja" onclick="post2()" class="btn btn-primary" >Zmień nazwę</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>

				<div class="col-sm-9 col-md-9">
					<div class="well col-md-12">	
					
							<table class="table table-hover">
								<thead>
								  <tr>
									<th>Kategoria</th>
									<th>Ilość artykułów</th>
									<th>Akcja</th>
								  </tr>
								</thead>
						
								<tbody>
									<?php
										for($i = 0; $i < $ileK; $i++)
										{
											echo '<tr>';
											echo '	<td>';
											echo 		$kategoria[$i];
											echo '	</td>';
											echo '	<td>';
											echo 		$ileA[$i];
											echo '	</td>';
											echo '	<td>';
											echo 		'<button  class="btn btn-primary btn-sm edytuj" data-toggle="modal" data-target="#myModal2" value="';
											echo $idKat[$i];											
											echo '" nazwa = "';
											echo $kategoria[$i];
											echo '"';
											echo '>Zmień nazwę</button>&nbsp;<button type="button" data-toggle="modal" data-target="#myModal3" class="btn btn-danger btn-sm usun" value="';
											echo $idKat[$i];
											echo '">Usuń</button>';
											echo '	</td>';
											echo '</tr>';
										}
									?>
								</tbody>
					
							</table>
					</div>
				</div>
				
			</div>
		</div> 
 
	</body>

</html> 