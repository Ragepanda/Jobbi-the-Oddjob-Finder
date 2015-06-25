$(document).ready(function () {

   
	var starter=1;
	
	$.get('callback.php', {getStart: starter},             // This snippet initializes the page and pulls the DB entries
		function(data){

			$("#request").append(data);
			
		});
	
	var addRequest = function(){                                                   // This method does a post to PHP with the info needed to add a new entry
	
		var email = document.getElementById('emailRequest').value;
		var payment = document.getElementById('paymentRequest').value;
		var location = document.getElementById('locationRequest').value;
		var request = document.getElementById('actualRequest').value;
	
		alert(request);
		$.post('callback.php', {postEmail:email, postPayment:payment, postLocation:location, postRequest:request},
		function(data){
			$( ".post" ).remove();                                                // Uses the returned data from the entry to append the document with the renewed entries
			$("#request").append(data);
			
		});
	}
	
	
	function contact(index){                                // handles contacting a poster about an ad
		var contactInfo = prompt("At which e-mail would you like to be contacted by the poster?");
		var identifier = index.currentTarget.id;
		identifier = identifier.slice(5);
		identifier = parseInt(identifier);                  // Extraction of the ID number from the post IDs
		
		$.post('callback.php', {postContact:identifier, postFriend: contactInfo},         // Posts to PHP with info needed to forward email, uses PHP tools to email
		function(data){
			alert("The poster has received an e-mail noting your interest!");
		});
		
		
	
	}
	
	function forward(index){                                     // handles forwarding an ad to a friend
	alert("Forwarded mail");									// Though normally this kind of method would require get, I need to use 
	var identifier = index.currentTarget.id;					// tools that are PHP specific for sending e-mail
		identifier = identifier.slice(5);
		identifier = parseInt(identifier);

		var address = prompt("ENTER YOUR FRIEND'S EMAIL ADDRESS");
		
		$.post('callback.php', {postForward:identifier, postFriend: address},
		function(data){
			alert("Email sent to: "+address+"");
		}); 
	
	}
	
	function submitReport(index){
	var identifier = index.currentTarget.id;
		identifier = identifier.slice(5);
		identifier = parseInt(identifier);
		alert("Report Submitted");
		
		$.get('callback.php', {postReport:identifier},
		function(data){
			$( ".post" ).remove();
			$("#request").append(data);
			
		}); 
	}
	
	$(".board").on('click','.report', submitReport);
	$("#submitRequest").on('click', addRequest);           // Event handlers -- I used the option extra selector field since there will be some dynamically loaded entries
	$(".board").on('click','.contact', contact);
	$(".board").on('click','.forward', forward);
	

});