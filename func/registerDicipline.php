 <?php 
 	session_start();

 	require("class.php");

	$db = new database();
	$db->conectToDb();
	$dicipline = new discipline();
	$dicipline->setDb($db->returnDb());
	
	$dicipline->createDicipline($_POST['Sdiscipline'],$_POST['discipline']);
	

	$db->closeDb();
	header("Location: /?pages=dicipline");
 ?>