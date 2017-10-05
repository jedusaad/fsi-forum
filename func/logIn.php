<?php 
	session_start();
	include("class.php");

	$db = new database();
	$db->conectToDb();

	$person = new person();
	$person->setConnectionDb($db->returnDb());

	$person->getUserByNickname($_POST['username']);
	$loginReturn = $person->login($_POST['username'],sha1($_POST['password']));
	
	if ($loginReturn == 0){
		$db->closeDb();
		header("Location:/");
	}else{
		$db->closeDb();
		$headerLocation = "Location: /?error=".$loginReturn."";

		header($headerLocation);
	}



 ?>