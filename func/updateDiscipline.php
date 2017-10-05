<?php 
	session_start();
	require("class.php");
	$db = new database();
	$db->conectToDb();

	$dicipline = new discipline();

	$dicipline->setDb($db->returnDb());

	$dicipline->updateTitleDicipline($_POST['ID'],$_POST['newName'],$_SESSION['ID']);

	header("Location: /?pages=dicipline")


?>