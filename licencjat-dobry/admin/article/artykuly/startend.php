</div> 
            </div>
			<hr>
			</div>
			

			
			<!-- Boczny panel admina -->
			<?php 
				if(isset($_SESSION['zalogowanyad']))
				{
					echo '<div class="okno">';
					echo	'<a href="../../indexad.php">';
					echo		'<div class=text>';
					echo			'<span class="ikona glyphicon glyphicon-chevron-down" aria-hidden="true"></span>';
					echo			'Panel administratora';
					echo		'</div>';
					echo	'</a>';
					echo '</div>';
				}
			?>
			
			<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) //jesli jest zmienna zalogowany to wtedy: 
			{
				$_SESSION['url'] = $_SERVER['REQUEST_URI'];//wyciaganie adresu
				include('../php/comment/showKom.php'); //sciagamy dane komentarzy
		
				//Form do komentarzy
									echo '<div class="container" >';
				echo '<div class="row">';

				echo '<div class="col-md-6" style="padding:20px; clear: left;">';
				echo '<h3 style="">Komentarze: (';
				echo $ileK;
				echo ')</h3>';
				echo '<form action="../php/comment/connectKom.php".php" method="post" role="form">';
				echo '<div class="form-group"  >';
				echo		'<p><textarea required type="text" class="form-control" name="komentarz" row="2" placeholder="Napisz komentarz" required></textarea>';
				echo		'</div>';
				echo		'<button type="submit" class="btn btn-success pull-left btn-block ">Wyślij</button></p>';
				echo '</form>';
				echo '</div>';
				echo '<div class="col-md-3">';
				echo '</div>';
				echo '</div>';
				echo '</div>';

				
				//Wyświetleni komentarzy
					echo '<div class="container" >';
				echo '<div class="row">';
				echo '<div class="col-md-3"></div>';
				echo '<div class="col-md-6" style="padding:20px; clear: left;">';
				//Panele z bootstrap
				echo '<div class="panel-group">';
				if($ileK <= $ogranicz)
				{
					for($i=0; $i<$ileK; $i++)
					{
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">';
							echo '<div class="col-md-5 align-div">';
							if($_SESSION['login'] == 'admin' AND $login[$i] != $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4" ></span>';
							}
							if($login[$i] == $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-pencil pencil-icon" aria-hidden="true" tmp="';
								echo $tresc[$i];
								echo '" data-toggle="modal" data-target="#myModal2"></span>&thinsp;
								<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4"></span>';
							}
							echo '</div>';
							echo '<div  class="col-md-7 text-right align-div" >';
							if(isset($data) AND $dataEdit[$i] != NULL){echo $data[$i].' <span class="commentEdit">(Edytowany)</span>';}
							else if(isset($data)){echo $data[$i];}
							echo '</div>';
							echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
							echo $login[$i];
							echo '</span></strong> napisał:</div>';
						echo '</div>';
						echo '<div class="panel-body">';
						if(isset($tresc)){echo $tresc[$i];}
						echo '</div>';
						echo '</div>';
					}
					
					echo '</div>';
				
				
				
				
				echo '</div>';
				echo '<div class="col-md-3">';
				echo '</div>';
				echo '</div>';
				echo '</div>';
	
				}
				else
				{
					for($i=0; $i<$ogranicz; $i++)
					{
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">';
							echo '<div class="col-md-5 align-div">';
							if($_SESSION['login'] == 'admin' AND $login[$i] != $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4" ></span>';
							}
							if($login[$i] == $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-pencil pencil-icon" aria-hidden="true" tmp="';
								echo $tresc[$i];
								echo '" data-toggle="modal" data-target="#myModal2"></span>&thinsp;
								<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4"></span>';
							}
							echo '</div>';
							echo '<div  class="col-md-7 text-right align-div" >';
							if(isset($data) AND $dataEdit[$i] != NULL){echo $data[$i].' <span class="commentEdit">(Edytowany)</span>';}
							else if(isset($data)){echo $data[$i];}
							echo '</div>';
							echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
							echo $login[$i];
							echo '</span></strong> napisał:</div>';
						echo '</div>';
						echo '<div class="panel-body">';
						if(isset($tresc)){echo $tresc[$i];}
						echo '</div>';
						echo '</div>';
					}
					
					
					
					
					
					/////////////UKRYTE
					echo '<div class="ukryte"  style="  margin-top: 5px;">';
					for($ogranicz; $i<$ileK; $i++)
					{
						echo '<div class="panel panel-primary">';
						echo '<div class="panel-heading">';
							echo '<div class="col-md-5 align-div">';
							if($_SESSION['login'] == 'admin' AND $login[$i] != $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4" ></span>';
							}
							if($login[$i] == $_SESSION['login'])
							{
								echo '<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-pencil pencil-icon" aria-hidden="true" tmp="';
								echo $tresc[$i];
								echo '" data-toggle="modal" data-target="#myModal2"></span>&thinsp;
								<span id="';
								echo $idKom[$i];
								echo '" class="glyphicon glyphicon-trash trash-icon" aria-hidden="true" data-toggle="modal" data-target="#myModal4"></span>';
							}
							echo '</div>';
							echo '<div  class="col-md-7 text-right align-div" >';
							if(isset($data) AND $dataEdit[$i] != NULL){echo $data[$i].' <span class="commentEdit">(Edytowany)</span>';}
							else if(isset($data)){echo $data[$i];}
							echo '</div>';
							echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
							echo $login[$i];
							echo '</span></strong> napisał:</div>';
						echo '</div>';
						echo '<div class="panel-body">';
						if(isset($tresc)){echo $tresc[$i];}
						echo '</div>';
						echo '</div>';
					}
					echo '</div>';
					/////////////////////////
					echo '</div>';
				
				
					echo '<div class="panel panel-primary kliknij " style="  margin-bottom: 10px;">';
					echo '<div class="panel-heading text-center " id="hoho" style="cursor: pointer;">';
					echo '***POKAŻ WSZYSTKIE KOMENTARZE***';
					echo '</div>';
					echo '</div>';
				
				echo '</div>';
				echo '<div class="col-md-3">';
				echo '</div>';
				echo '</div>';
				echo '</div>';
					
				}

				
				

			}
			else
			{
				echo '<div class="container-fluid" >';
				echo '<div class="row">';
				echo '<div class="col-md-12" style="padding:20px;">';
				echo '<span style="color: #5CB85C;">Aby móc oglądać i dodawać komentarze musisz się <a href="#" data-toggle="modal" data-target="#myModal">zalogować</a>!<span>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			?>

			

			
			
				
          
        </div>
      </div>
    </div>
	  </body>

</html>