Jobbi is a simple web app that I used in order to test my abilities to create a REST/AJAX stack. 
The functionality is simple, fill out the form at the bottom of the page and that information will be sent to the SQL DB, 
then return to the page in an update. This used to be hosted on my school's (UNC) servers, but since graduating my accesses to the
database and webspace have been removed. 

Jobbi.html was the original mockup I had for the website, with Jobbi.php being the finalized version.

Jobbi.js utilized JQuery to listen to buttons, and organize the post data going back and forth between the client and server

a3.cs is the style sheet for the site, it's very minimal, as the assignment's point was only to accomplish a REST/AJAX functionality

callback.php handles the AJAX requests from the js file, and calls upon the appropriate methods from the other php file, jobbiset.php

jobbiset.php is a php file containing all of my functions