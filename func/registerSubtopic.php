 <?php 
 	session_start();

 	require("class.php");

	$db = new database();
	$db->conectToDb();
	$topic = new topic();
	$topic->setDb($db->returnDb());
	echo $_GET['topic'];
	$topic->createSubTopic(ucfirst(strtolower($_POST['topic'])),$_POST['topicDescription'],$_GET['disc'],$_GET['topic']);
	$db->closeDb();
	header("Location: /?pages=onDiscipline&disc=".$_GET['disc']."&topic=".$_GET['topic']."");
 ?> 