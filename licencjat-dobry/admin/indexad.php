<?php
	session_start(); //start sesji
	if (!isset($_SESSION['zalogowanyad'])) //jesli nie ma zmiennej zalogowany
	{
		header('Location: logowanie.php');
		exit();
	}
?>

<!doctype html>

<html LANG="pl">
  
	<head>
		<?php 
			include('head.php');
				
			require_once "../php/connect.php"; //wymaga pliku w kodzie
			include('checkNotifications.php');
		?> 
		

	</head>
  
	<body>


 <div class="okno">
	<a href="../index.php">
		<div class=text>
			<span class="ikona glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
			Strona główna
		</div>
	</a>
 </div>


 <div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Artykuły</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="article/articleCreate.php">Stwórz</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-info"></span><a href="article/articleManage.php">Przeglądaj</a>
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                        <span class="glyphicon glyphicon-list-alt text-info"></span><a href="article/articleCategory.php">Kategorie</a>
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
                    <div id="collapseTwo" class="panel-collapse collapse">
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
				<!-- Samouczki -->
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-book">
                            </span>Samouczki</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="tutorial/tutorialCreate.php">Stwórz</a>
                                    </td>
                                </tr>
                           </table>
                        </div>
                    </div>
                </div>
						<!-- Pliki do pobrania -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class=" glyphicon glyphicon-plus">
									</span>Pliki do pobrania</a>
								</h4>
							</div>
							<div id="collapseFive" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<span class="glyphicon glyphicon-file text-primary"></span><a href="files/filesView.php">Przeglądaj</a>
											</td>
										</tr>
								   </table>
								</div>
							</div>
						</div>				
				<!-- User -->
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-user">
                            </span>Użytkownicy&nbsp;											
											<?php 
												if(isset($iloscPowiadomien) AND $iloscPowiadomien > 0 ) 
												{
													echo '<span class="badge text-primary">';
													echo $iloscPowiadomien; 
													echo '</span>';
												}
											?>
											</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-bell text-primary"></span><a href="user/changeTypeAccount.php">Powiadomienia&nbsp;
											<?php 
												if(isset($iloscPowiadomien) AND $iloscPowiadomien > 0 ) 
												{
													echo '<span class="badge text-primary">';
													echo $iloscPowiadomien; 
													echo '</span>';
												}
											?>
										</a>
                                    </td>
                                </tr>                               
								<tr>
                                    <td>
                                        <span class=" glyphicon glyphicon-th-large text-primary"></span><a href="user/usersView.php">Przeglądaj</a>
                                    </td>
                                </tr>
                           </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a  href="../php/logoutadmin.php"><span class="glyphicon glyphicon-off text-danger">
                            </span>Wyloguj</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>


<div class="col-sm-9 col-md-9 panel-primary" >
            <div class="well">
					

					
                <h1><span style="color: green;"><?php if(isset($_SESSION['login'])){echo $_SESSION['login'];} ?></span>, witaj w panelu administratora!</h1> 
				<p>Po lewej stronie znajduje się rozwijane menu, dzięki któremu możesz zarządząć elementami na stronie.</p>
							<span class="glyphicon glyphicon-folder-close"></span> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b >Artykuły</b></a>
							<p style="text-align:justify;">Ta zakładka zawiera opcje do zarządzania artykułami. Możesz stworzyć nowy artykuł czy zedytować obecny. Dodać/usunąć zdjęcia z galerii. Możesz też dodać nowe pliki, które będą mogli pobrać studenci. Także masz możliwość dodania spisu literatury.</p>
						
					
							<span class="glyphicon glyphicon-th-list"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><b>Quizy</b></a>
							<p style="text-align:justify;">
								Quizy są formą sprawdzenia wiedzy użytkowników. Muszą być tworzone na podstawie materiałów wcześniej zamieszczonych w artykułach bądź też samouczkach. <br>Tutaj możesz dodać nowy quiz bądź też edytować już istniejący.
							</p>
												
						
							<span class="glyphicon glyphicon-book"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><b>Samouczki</b></a>
							<p style="text-align:justify;">
								Samouczki jest to utrwalenie wiedzy poprzez naukę <q>krok po kroku</q>. Należy tutaj przygotować podstawowe informację, który w szybki sposób będzie można sobie przyswoić. <br>Można tutaj dodać czy też edytować samouczek.
							</p>
							
							<span class="glyphicon glyphicon-user"></span><a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><b>Użytkownicy</b></a>
							<p style="text-align:justify;">
								Ta zakładka służy do zarządzania kontami użytkowników. Można przeglądać o nich dane czy też usunąć konto. System informuje także o prośbach dotyczących zmian typu konta, które administrator może zaakceptować bądź nie.
							</p>
						
					
				
            </div>
        </div>
    </div>
</div>
 

    
  </body>

</html>