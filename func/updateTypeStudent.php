<?php
session_start();
require("class.php");
$db = new dataBase();

$db->conectToDb();
$teacher = new teacher();
$teacher->setDb($db->returnDb());				
$teacher->setMonitor($_POST['typeName']);
$db->closeDb();

header("Location: /?pages=manageProfiles")
?>