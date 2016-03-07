
$(document).ready(function() {
 
 //Walidacja nazwy
 $('#elogin').on('blur', function() {
 var input = $(this);
 var name_length = input.val().length;
 if(name_length >= 5 && name_length <= 15){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Nazwa musi mieć więcej niż 4 i mniej niż 16 znaków!").removeClass("blad").addClass("ok");
 }
 else{
 input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Za krotki login!").removeClass("ok").addClass("blad");
 
 }
 });
 
 //Walidacja email
 $('#eemail').on('blur', function() {
 var input = $(this);
 var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
 var is_email = pattern.test(input.val());
 if(is_email){
 input.removeClass("invalid").addClass("valid");
 input.next('.znak').removeClass("blad glyphicon glyphicon-remove form-control-feedback").addClass("ok glyphicon glyphicon-ok form-control-feedback").next('.komunikat').text("Ok!").removeClass("blad").addClass("ok");
 }
 else{
  input.removeClass("valid").addClass("invalid");
 input.next('.znak').removeClass("ok glyphicon glyphicon-ok form-control-feedback").addClass("blad glyphicon glyphicon-remove form-control-feedback").next('.komunikat').text("Błąd!").removeClass("ok").addClass("blad");
 }
 }); 
 
 //Walidacja wiadomości
 // $('#message').on('blur', function() {
 // var input = $(this);
 // var message = $(this).val();
 // if(message){
 // input.removeClass("invalid").addClass("valid");
 // input.next('.komunikat').text("Wprowadzono poprawną wiadomość.").removeClass("blad").addClass("ok");
 // }
 // else{
 // input.removeClass("valid").addClass("invalid");
 // input.next('.komunikat').text("Wiadomość nie może być pusta!").removeClass("ok").addClass("blad");
 // }   
 // });
 
 //Po próbie wysłania formularza
 $('#submit button').click(function(event){
 var login = $('#elogin');
 var email = $('#eemail');
 // var message = $('#message');
 
 if(login.hasClass('valid') && email.hasClass('valid') ){
 alert("Pomyślnie wysłano formularz."); 
 }
 else {
 event.preventDefault();
 alert("Uzupełnij wszystkie pola!"); 
 }
 });
});
