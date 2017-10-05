<?php 

	/*

	C = CREATE = MYSQL INSERT     "INSERT INTO ´nome_da_tabela´ ('nome_colunas')  VALUES(´$variaveis_de_inserção´)"  ex: 47

	R = RETRIEVE = MYSQL SELECT

	U = UPDATE = MYSQL UPDATE

	D = DELETE = MYSQL DELETE

	

	mysql_query("QUERY ENTRE ASPAS ");

	

	mysqli_query($variave_de_conexao_de_banco,"QUERY ENTRE ASPAS");



	

	$nome_da_variavel = new nomeDaClasse() ;







	$nam = new dataBase();

	$nam->conectToDb();







	$nam->closeDb();



	$

	*/


/*
updateUser.php
if(($_POST['newpassword']) == ($_POST['confirmnewpassword'])){
	if(($_POST['newpassword'] != "")){
		$password = $_POST['newpassword'];
		//$person->updatePasswd($_GET['id'], sha1($_POST['newpassword']));
	}
	else{
		$password = $_POST['password'];
		//$person->updatePasswd($_GET['id'], sha1($_POST['password']));
	}
	
	$person->updateUser($_GET['id'], $_POST['username'], $_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['email'],$_POST['study'], sha1($_POST[$password]));
}else
{
$person->updateUser($_GET['id'], $_POST['username'], $_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['email'],$_POST['study'], sha1($_POST[$password]));
}	

if(($_GET['newpassword']) == ($_GET['confirmnewpassword'])){
	//if(($_GET['newpassword'] != "")){
	
		$person->updatePasswd($_GET['id'], sha1($_POST['newpassword']));
	}
	else{
		$person->updatePasswd($_GET['id'], sha1($_POST['password']));
	}
	$person->updateUser($_GET['id'], $_POST['username'], $_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['email'],$_POST['study']);
//}

	
	
	$person->updateUser($_GET['id'], $_POST['username'], $_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['email'],$_POST['study']);
}
	

*/
 ?>