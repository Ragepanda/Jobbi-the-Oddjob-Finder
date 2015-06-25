<!DOCTYPE html>

<html>
<head>
<title> Jobbi the Oddjob Marketplace</title>
<link rel="stylesheet" type="text/css" href="a3.css">


<script src="http://www.cs.unc.edu/Courses/comp426-f14/jquery-1.11.1.js"
          type="text/javascript">
	 </script>
		  
<script src="jobbi.js" type="text/javascript">
	</script>

		  
<h1>Jobbi</h1>
</head>

<body>
	<div id="introduction">
		<p>
		Welcome to Jobbi! The local, anonymous oddjob market. Type in a request at the bottom, and it will be listed on the page, front and center for all oddjobbers looking out there!
		</p>
		
		
		
	</div>
	
	<h2> Requests </h2>
	
	<div class="board" id="request">
	

		
	</div>
	
	<div class="form" id="request form">
	<h3>Make a Request Here</h3>
		<form id="request fields">
			
			<span>Email:</span> <br>
			<input type="text" id="emailRequest"> <br>
			
			<span>Payment:</span> <br>
			<input type="text" id="paymentRequest"> <br>
			
			<span>Location</span> <br>
			<input type="text" id="locationRequest"> <br>
			
			<span>Request</span> <br>
			<textarea id="actualRequest"></textarea><br>
			
			<input type="button" id="submitRequest" value="Submit">
		</form>
	</div>


</html>