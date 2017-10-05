<?php 
	session_start();
	require('class.php');

	$db = new database();

	$db->conectToDb();


	$rep = new answer();

	$rep->setDb($db->returnDb());


	$rep->insertAnswer($_POST['regAnswer'],$_GET['father'] );

	$db->closeDb();

	header("location: /?pages=answer&disc=".$_GET['disc']."&topic=".$_GET['topic']."&subtopic=".$_GET['father']."");



 ?>