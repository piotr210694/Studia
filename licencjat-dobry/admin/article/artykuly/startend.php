</div> 
            </div>
			<hr>
			</div>
			
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
				echo $_SESSION['ileKom'];
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
				
				for($i=0; $i<$_SESSION['ileKom']; $i++)
				{
					echo '<div class="panel panel-primary">';
					echo '<div class="panel-heading">';
						echo '<div  class="text-right" >';
						if(isset($_SESSION['data'])){echo $_SESSION['data'][$i];}
						echo '</div>';
						echo '<div  class="text-left" ><strong><span style="text-transform: uppercase;">';
						echo $_SESSION['loginKom'][$i];
						echo '</span></strong> napisał:</div>';
					echo '</div>';
					echo '<div class="panel-body">';
					if(isset($_SESSION['tresc'])){echo $_SESSION['tresc'][$i];}
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