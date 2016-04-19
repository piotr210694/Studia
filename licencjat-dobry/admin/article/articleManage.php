<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../logowanie.php');
		exit();
	}
?>

<?php 
	$_SESSION['url'] = $_SERVER['REQUEST_URI'];//wyciaganie adresu
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
		<script src="../js/script.js"></script>
		<link rel="stylesheet" href="../css/styles.css">
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
		<!-- Do wybrania kategorii -->
		<script>
		//Szukamy jakie value ma zaznaczony select
		var regName = "";

		$(document).ready(function()
		{
			$(".reg-select").click(function(){
				regName = $(this).val();
			});
			
		});
		

		var y = "";
		$(document).ready(function() 
		{
			$('#akcja').click(function() {

				y = $('#tresc').val();
				post4();
			});
		});
		
			//po nacisnieciu przycisku wysylamy te dane do pliku php
			function post()
			{
				var val = regName;
				$.post('php/test.php', {val:val},
				function(data)
				{
					$('#result').html(data);
				});
			}
			
			//po nacisnieciu przycisku wysylamy te dane do pliku php
			function post4()
			{
				var x = document.getElementsByName("title")[0].value;
				// var y = document.getElementsByName("tresc")[0].innerHTML;
				var z = document.getElementsByName("idOld")[0].value;
				$.post('php/test3.php', {x:x, y:y, z:z},
				function(data)
				{
					$('#result4').html(data);
				});
				// alert(y);
			}
			
		</script>
		
		<?php if(isset($_SESSION['ONphoto']))
		{ 

		}
		?>
	
	
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
				
				
<!-- Usuniecie artykulu - MODAL -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie artykułu</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć artykuł?</p>
		<div id="result2"></div>
      </div>
      <div class="modal-footer">
		<button  name="akcja" value="Usuń" onclick="post2()" class="btn btn-danger" >Usuń</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>

<!-- Edycja artykulu - MODAL -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edycja artykułu</h4>
      </div>
		  <div class="modal-body">
					<div id="result3"></div>
					<div id="result4"></div>
		  </div>
      <div class="modal-footer">
		<!--<input type="submit" value="Zapisz zmiany" class="btn btn-primary">-->
		 <button onclick="post4()" id="akcja" name="akcja" value="Edytuj"  class="btn btn-primary" >Zapisz zmiany</button> 
       <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
      </div>
    </div>

  </div>
</div>

<!-- Galeria zdjec - MODAL -->
<div id="myModal22" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Galeria zdjęć</h4>
      </div>
		  <div class="modal-body">
					<div id="result44"></div>
		  </div>
      <div class="modal-footer">
				<FORM ACTION="php/uploadPhotoExist.php"  METHOD="POST" ENCTYPE="multipart/form-data">
					<INPUT type="file"  name="zdjecie"  required>
					<input type="submit" class="btn btn-primary" name="ok" value="Wyślij zdjęcie do bazy"/>
				</FORM>
				<?php
					if(isset($_SESSION['bladDodania2']))
					{
						echo $_SESSION['bladDodania2'];
					}
				?>
      </div>
    </div>

  </div>
</div>

				<div class="col-sm-9 col-md-9">
					<div class="well">	
							<div class="form-group">
							<label for="sel1">Wybierz kategorię:</label>
							<p><select class="form-control" id="sel1" name="idK">
								<?php 
								
								for($i=0; $i<$ileK; $i++)
								{
									echo '<option class = "reg-select" value="';
									echo $idActive=$idK[$i];
									echo '">';
									echo $tytulK[$i];
									echo '</option>';			
								}
								?>  
							</select></p>
							<button onclick="post();" class="btn btn-success pull-left btn-block">OK</button>
							
							<br>
							</div>
							<div id="result">

							</div>

							
					</div>
				</div>
				
			</div>
		</div> 
 
	</body>

</html> 