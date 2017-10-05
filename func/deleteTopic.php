<?php 
 	session_start();
 	require("class.php");

	$db = new database();
	$db->conectToDb();
	$topic = new topic();
	$topic->setDb($db->returnDb());
	
	$topic->updateStateTopic($_POST['topic'],2,$_SESSION['ID']);
	

	$db->closeDb();
	header("Location: /?pages=onDiscipline&disc=".$_GET['disc']."");
 ?>