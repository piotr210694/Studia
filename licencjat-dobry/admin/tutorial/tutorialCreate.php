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
		
		<!-- wydarzenia okienka i rozwijanie menu -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		
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
							$('#elements .element:first').clone().appendTo($('#elements')).find('textarea').val('');  
						}
						$('#opening').show(1000);
						$('#elements').show(2000);
						$('#create').remove();
					}
				});
		  
			  $('#add').click(function()
			  {
					$('#elements .element:first').clone().appendTo($('#elements')).find('textarea').val('');
			  });
			  
			  $('#save').click(function()
			  {
					var task = new Array();
					$("textarea[name=task]").each(function() 
					{
						task.push($(this).val()); //dodanie do tablicy
					});
					var myArrString = JSON.stringify(task);
					task = myArrString;
					// alert(myArrString);
					// var myArr = JSON.parse(myArrString);
					// alert(myArr[0]);
					var titleTutorial = $('#titleTutorial').val();
					var describeTutorial = $('#describeTutorial').val();
					
					$.post('php/postTutorial.php', {task:new Array(task), titleTutorial:titleTutorial, describeTutorial:describeTutorial},
					function(data)
					{
						$('#result2').html(data);
					});	
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
				
				function post()
				{
					
				}
				
				
       });
	   
	    $(document).ready(function()
		{
			//dzialania na oknie moodalnym
				var i = 0;
					var tablica = new Array('elo', 'dwa', 'trzy');
					var dl_tab = tablica.length;
					$('#back').hide();
					$('#next').click(function()
					{
						alert("elo");
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
						$('.modal-body-edit').text(tablica[i]);
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
		});
    </script>



	
	</head>
  


<div id="myModal5" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Usuwanie konta</h4>
      </div>
      <div class="modal-body modal-body-edit">
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
					<a href='#'  data-toggle="modal" data-target="#myModal4"><span>Link to open modal</span></a>
						<input type="numb" id="ile" placeholder="podaj ilosc">
<!---						<button>OK</button>
						<div id="zawartosc" >
							huehue
						</div>
						<div id="zawartoscPHP" ></div> -->
	<div id="opening">
		<input type="text" id="titleTutorial" placeholder="Podaj tytuł samouczka..."  ><br>
		<textarea  id="describeTutorial" placeholder="Podaj opis samouczka..." ></textarea>
	</div>
	<button id="create">utwórz</button>	
	<button id="add">dodaj</button>
    <div id="elements">
		<div class="element">
			<label>Pytanie nr:<span id="countTask">1</span><br />
			<textarea name="task"></textarea>
			<a style="cursor: pointer;">usuń</a>
		</div>
    </div>
	<button id = "save">Zapisz</button>
	
	<div id="result2"></div>
					</div>
				</div>
				
			</div>
		</div> 
 
	</body>

</html> 