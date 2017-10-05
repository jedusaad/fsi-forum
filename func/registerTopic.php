 <?php 
 	session_start();

 	require("class.php");

	$db = new database();
	$db->conectToDb();
	$topic = new topic();
	$topic->setDb($db->returnDb());
	
	$topic->createTopic(ucfirst(strtolower($_POST['topic'])),$_POST['topicDescription'],$_GET['disc'] );
	header("Location: /?pages=onDiscipline&disc=".$_GET['disc']."");

	$db->closeDb();
 ?> 