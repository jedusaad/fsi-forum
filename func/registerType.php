<?php
 session_start();
 require("class.php");
 
$db = new dataBase();

$db->conectToDb();

$type = new type();
$type->setDb($db->returnDb());

$type->createNewType($_POST['typeName'],$_POST['description']);
$db->closeDb();

	
header("Location: /?pages=manageType") 

 

?>

