<?php 
 	session_start();
 	require("class.php");

	$db = new database();
	$db->conectToDb();
	$dicipline = new discipline();
	$dicipline->setDb($db->returnDb());
	
	$dicipline->updateStateDicipline($_POST['discipline'],2,$_SESSION['ID']);
	

	$db->closeDb();
	header("Location: /?pages=dicipline");
 ?>