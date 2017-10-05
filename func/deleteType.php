<?php
 session_start();
 require("class.php");
 
$db = new dataBase();

$db->conectToDb();

$type = new type();
$type->setDb($db->returnDb());

$type->deleteType($_POST['selectApagar']);
$db->closeDb();

	
header("Location: /?pages=manageType") 

?>