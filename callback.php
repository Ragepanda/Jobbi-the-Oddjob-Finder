<?php
require_once('orm/jobbiset.php');

	$email = $_POST['postEmail'];
	$location = $_POST['postLocation'];
	$request = $_POST['postRequest'];
	$payment = $_POST['postPayment'];
	$idReport = $_GET['postReport'];
	$idForward = $_POST['postForward'];
	$friendAddress = $_POST['postFriend'];
	$idContact = $_POST['postContact'];
	$start = $_GET['getStart'];

	if (!empty($_POST['postEmail'])) {   
		$j = jobbiset::newPost($email, $payment, $location, $request);
		$h = jobbiset::initialize();
}

	if(!empty($_GET['postReport'])){
		$k = jobbiset::addReport($idReport);
		$i = jobbiset::initialize();
	}
	
	if(!empty($_POST['postForward'])){
		$l = jobbiset::forward($idForward,$friendAddress);
	}
	
	if(!empty($_POST['postContact'])){
		$m = jobbiset::contact($idContact,$friendAddress);
	}
	
	if(!empty($_GET['getStart'])){
		$n = jobbiset::initialize();
	}

?>