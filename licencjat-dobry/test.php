 <html>
 
	 <head>
	 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<script>
			$(document).ready(function()
			{			
				$('#myForm input').on('change', function() 
				{
					alert($('input[name=optradio]:checked', '#myForm').val()); 
				});
			});
		</script>
	 </head>
	 
	 <body>

<form id="myForm">
<div id="elements">
		<div class="element">
		<form id="myForm">
			<label>Pytanie<input type="text" name="ask[]"></label><br />
				<label class="radio-inline">
					<input type="radio" name="optradio" value="1"><label>A: <input type="text" name="cena[]"></label>
				</label><br>
				<label class="radio-inline">
					<input type="radio" name="optradio" value="2"><label>B: <input type="text" name="cena[]"></label>
				</label><br>
				<label class="radio-inline">
					<input type="radio" name="optradio" value="3"><label>C: <input type="text" name="cena[]"></label>
				</label><br>
				<label class="radio-inline">
					<input type="radio" name="optradio" value="4"><label>D: <input type="text" name="cena[]"></label>
				</label><br>
			  <a style="cursor: pointer;">usuń</a>
		</form>
       </div>
    </div>
</form>



  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

 
<ul class="nav">
  <li>List 1, item 1</li>
  <li>List 1, item 2</li>
  <li>List 1, item 3</li>
</ul>
<ul class="nav">
  <li>List 2, item 1</li>
  <li>List 2, item 2</li>
  <li>List 2, item 3</li>
</ul>
 
<script>
// Applies yellow background color to a single <li>
$( "ul.nav li:eq(0)" ).css( "backgroundColor", "#ff0" );
 
// Applies italics to text of the second <li> within each <ul class="nav">
$( "ul.nav" ).each(function(  ) {
  $( this ).find( "li:eq(0)" ).css( "fontStyle", "italic" );
});
 
// Applies red text color to descendants of <ul class="nav">
// for each <li> that is the second child of its parent
$( "ul.nav li:nth-child(1)" ).css( "color", "red" );
</script>
 




	 </body>
	 
 </html>