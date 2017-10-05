<?php  
	session_start();
	 include("class.php");

	$db = new database();
	$db->conectToDb();

	$person = new person();
	$person->setConnectionDb($db->returnDb());

	if($person->checkExistanceByNickname($_POST['username']) == 0){
		echo 0;
	}else{
		echo 1;
	}


	$db->closeDb();
?>