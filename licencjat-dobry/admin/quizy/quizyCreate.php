 <?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: ../logowanie.php');
		exit();
	}
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
		
		<script>
			$(document).ready(function(){
					var y = 0;
					// $( "#zawartosc" ).hide();
					$('button').click(function() 
					{
						y = $('#ile').val();
						//alert(y);
						// $( "#zawartosc" ).show();
						$.post('php/connectQuiz.php', {y:y},
						function(data)
						{
							$('#zawartoscPHP').html(data);
						});						
					});
					
					
			});
			
			function post()
			{			
				$.post('quizyCreate.php', {y:y},
				function(data)
				{
					$('#zawartosc').html(data);
				});
			}	
		</script>
		
		    <script type="text/javascript" charset="utf-8" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8">

       $(document).ready(function(){
          /*
             Tutaj wykorzystamy metode live która pozwala przypisywać eventy do wszystkich elementów nawet tych których nie ma a zostaną załadowane lub dodane później. Dzięki temu nie będzie trzeba za każdym razem dodawać eventu click do linka. Po kliknięciu pobieramy rodzica elementu <a> czyli div.element i sprawdzamy czy nie jest to pierwszy element w div#elements. Jeżeli nie jest pierwszy to go kasujemy. Może to nie jest potrzebne ale wydaje mi się, że przynajmniej jeden rodzaj i cena muszą byc.
          */

          /*
             W momencie gdy klikniemy na przycisk "dodaj". Skrypt pobiera pierwszy element z div#elements, klonuje go dodaje na koniec div#elements ( metoda appendTo(element) ) a następnie znajduje wszystkie elementy input i czyści ich wartości.
          */
				$('#elements').hide();
				$('#opening').hide();
				$('#add').hide();
				$('#save').hide();
				$('#create').click(function()
				{
					var x = $('#ile').val() - 1;
					if(x > 30)
					{
						alert("nie przesadzajmy!");
					}
					else
					{
						for(var i = 0; i < x; i++)
						{
							$('#elements .element:first').clone().appendTo($('#elements')).find('input').val('');  
						}						
						$('#opening').show(1000);
						$('#elements').show(2000);
						$('#create').remove();
						$('#ile').hide();
						$('#add').show();
						$('#save').show(2000);
					}
				});
		  
			  $('#add').click(function()
			  {
					$('#elements .element:first').clone().appendTo($('#elements')).find('input').val('');
			  });
			  
			  					var answerTab = [];
					var pytaniaTab = [];
					var optionTab = [];
					var correctTab = [];
			  $('#save').click(function()
			  {
					$("input[name=answer[]]").each(function() 
					{
						answerTab.push($(this).val()); //dodanie do tablicy
						//alert(answerTab);
					});
					$("input[name=ask[]]").each(function() 
					{
						pytaniaTab.push($(this).val()); //dodanie do tablicy
					});
					$("input[name=optradio[]]").each(function() 
					{
						var tmp = $('input:radio[name=optradio[]]:checked').val();
						//alert(tmp); //dodanie do tablicy
					});
					$("input[name=correct]").each(function() 
					{
						correctTab.push($(this).val()); //dodanie do tablicy
						//alert(correctTab); //dodanie do tablicy
					});

					// alert(cenaTab[0] + " " + cenaTab[1]);
					// alert(pytaniaTab[0] + " " + pytaniaTab[1]);
					// alert(optionTab[0] + " " + optionTab[1]);
			  });
			  
			  
			    $('#elements .element a').live('click', function()
				{
					var parent = $(this).parent();
					if($('#elements .element').index(parent) > 0)
					{
						parent.slideUp(2000, function() 
						{
							parent.remove();
						});
					}
					else
					{
						alert("Quiz musi zawierać przynajmniej jedno pytanie!");
					}

				});
				
				$('#square').click(function()
				{
					$('#elements .element:first #square').addClass("blad");
				});
				
				
				//dzialania na oknie moodalnym
				var i = 0;
					var tablica = new Array('elo', 'dwa', 'trzy');
					tablica = pytaniaTab;
					var dl_tab = tablica.length;
					$('#back').hide();
					$('#next').click(function()
					{
						if(i==0)
						{
							$('#back').hide();
						}
						if(i==(dl_tab-1))
						{
							$('#next').hide();
						}
						else
						{
							$('#back').show();
						}
						$('.modal-body').text(tablica[i]);
						i++;
					});
					$('#back').click(function()
					{
						if(i==1)
						{
							$('#back').hide();
						}
						else
						{
							$('#next').show();
						}
						i--;
						$('.modal-body').text(tablica[i-1]);
					});
					$('#info').click(function()
					{
					});
       });
    </script>



	
	</head>
  
  <div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header modal-header  ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie konta</h4>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć konto?</p>
      </div>
      <div class="modal-footer">
		<form action="user/php/delete.php" >
		<input type="submit" value="Usuń" class="btn btn-danger" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
		<a  href="#" id="back"><span>Back</span></a>
		<a href="#"  id="next"><span>Next</span></a>
      </div>
    </div>

  </div>
</div>

<div id="myModal5" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie konta</h4>
      </div>
      <div class="modal-body">
        <p>Drugie okno</p>
      </div>
      <div class="modal-footer">
		<form action="user/php/delete.php" >
		<input type="submit" value="Usuń" class="btn btn-danger" >
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button></form>
		<a href='#'  data-toggle="modal" data-target="#myModal4"  data-dismiss="modal"><span>Back</span></a>
		<a href='#'  data-toggle="modal"  data-dismiss="modal"><span>Zakończ</span></a>
      </div>
    </div>

  </div>
</div>
  
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
							<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<span class="glyphicon glyphicon-pencil text-primary"></span><a href="../article/articleCreate.php">Stwórz</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-file text-info"></span><a href="../article/articleManage.php">Przeglądaj</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-list-alt text-info"></span><a href="../article/articleCategory.php">Kategorie</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<!-- Quizy -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th-list">
									</span>Quizy</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse in">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<span class="glyphicon glyphicon-pencil text-primary"></span><a href="quizy/quizyCreate.php">Stwórz</a>
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
					
				<!--	<a href='#'  data-toggle="modal" data-target="#myModal4"><span>Link to open modal</span></a>
					<button id="info">Info</button> -->
						<p><input class="form-control" type="number"  min="1" id="ile" placeholder="Podaj ilość kroków..."><p>
<!---						<button>OK</button>
						<div id="zawartosc" >
							huehue
						</div>
						<div id="zawartoscPHP" ></div> -->
	<div id="opening">
		<p><input class="form-control" type="text" id="titleTutorial" placeholder="Podaj tytuł quizu..."  ></p>
		<p><textarea class="form-control" id="describeTutorial" placeholder="Podaj opis quizu..." ></textarea></p>
	</div>
	<p><button type="button" class="btn btn-success" id="create">Utwórz</button></p>
	<p><button type="button" class="btn btn-success" id="add">Dodaj</button></p>
	<br>
	
    <div id="elements">
		<div class="element">
		
			<!-- <input type="button" id="square" > -->
					<!-- <label>a:</label> <input class="form-control"  type="text" name="cena[]"><br> 
					<label>b: <input class="form-control"  type="text" name="cena[]"></label><br>
					<label>c: <input class="form-control"  type="text" name="cena[]"></label><br>
					<label>d: <input class="form-control"  type="text" name="cena[]"></label><br>
			-->
			<form class="form-horizontal" role="form">
		<!-- 		<label>Pytanie<input type="text" name="ask[]"></label><br /> -->
				<div class="form-group form-group-sm">
					<label class="col-sm-1 control-label" for="sm"></label>
					<div class="col-sm-11">
						<input class="form-control" type="text" id="sm" name="ask[]" placeholder="Podaj treść pytania...">
					</div>
				</div>	
				
				<div class="form-group form-group-sm">
					<label class="col-sm-1 control-label" for="sm">a:</label>
					<div class="col-sm-11">
						<input class="form-control" type="text" id="sm" name="answer[]" placeholder="Odpowiedź a...">
					</div>
				</div>		
				<div class="form-group form-group-sm">
					<label class="col-sm-1 control-label" for="sm">b:</label>
					<div class="col-sm-11">
						<input class="form-control" type="text" id="sm" name="answer[]" placeholder="Odpowiedź b...">
					</div>
				</div>		
				<div class="form-group form-group-sm">
					<label class="col-sm-1 control-label" for="sm">c:</label>
					<div class="col-sm-11">
						<input class="form-control" type="text" id="sm" name="answer[]" placeholder="Odpowiedź c...">
					</div>
				</div>		
				<div class="form-group form-group-sm">
					<label class="col-sm-1 control-label" for="sm">d:</label>
					<div class="col-sm-11">
						<input class="form-control" type="text" id="sm" name="answer[]" placeholder="Odpowiedź d...">
					</div>
				</div>
				
				<div class="form-group form-group-sm">
					<label class="col-sm-1 control-label" for="sm"></label>
					<div class="col-sm-3">
						<input class="form-control" type="text" id="sm" name="correct" placeholder="Poprawna odpowiedź...">
					</div>
					<label class="col-sm-8 control-label" for="sm"></label>
				</div>	
				
				
			</form>		
					
			<!-- <label>Poprawna odpowiedź<input type="text" name="correct"></label><br> -->
			<label class="col-sm-1 control-label" for="sm"></label>
			  <a style="cursor: pointer;">usuń</a>
			  <hr>
       </div>
    </div>
	<button type="button" class="btn btn-block btn-success" id="save">Zapisz</button>
	
	
							
<!---		 

	<br>
    <div id="elements">
		<div class="element">-->
			<!-- <b>Krok nr:<span id="countTask" >1</span></b><br><div class="line-break">&nbsp;</div> -->
			<!-- <textarea class="form-control" id="tx1" name="task" placeholder="Tutaj wpisz treść..."></textarea>
			<a style="cursor: pointer;">usuń</a>
			<hr>
		</div>
    </div>
	
	-->
	
	
	
	<!-- <form id="myForm">
<input type="radio" name="radioName" value="1" /> 1 <br />
<input type="radio" name="radioName" value="2" /> 2 <br />
<input type="radio" name="radioName" value="3" /> 3 <br />
</form> -->
					</div>
				</div>
				
			</div>
		</div> 
 
	</body>

</html> 