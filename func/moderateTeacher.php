<?php
	 session_start();
	 require("class.php");
	 
	$db = new dataBase();

	$db->conectToDb();

	$person = new person();
	$person->setConnectionDb($db->returnDb());

	echo $_GET['user'];
	echo $_POST['type'];

	$person->getUserById($_GET['user']);
	$person->updateType($_POST['type']);
	$person->updateState(1);
	$db->closeDb();

		
	header("Location: /?pages=moderateTeacher") ;

	 

?>