<?php 


//	echo $_POST['fileUpload'];
	session_start();

	require("class.php");

	$db = new database();

	$db->conectToDb();



	$person = new person();

	$person->setConnectionDb($db->returnDb());
	
/*
	$new_name = 'default.jpg';
  
		if(isset($_FILES['fileUpload']))

		   {

		      echo $_FILES['fileUpload']['tmp_name'];


		      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

		 

		      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo

		      $new_name = $_POST['username'] . $ext; //Definindo um novo nome para o arquivo

		      $dir = '../files/userImg/'; //Diretório para uploads

		 

		      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo





		   }



		if(empty($_FILES['fileUpload']['tmp_name'])){

			$new_name = 'default.jpg';

		}



		$imgAddressFromRoot = "files/userImg/".$new_name;

	echo $imgAddressFromRoot;
*/

	//$myId,$username,$name,$lastname,$birthdate,$email,$password,$study,$img
/*
$password;
$newpasswd = $_GET['newpassword'];
$confirmpasswd = $_GET['confirmnewpassword'];
if(($newpasswd == $confirmpasswd) && ($newpassword != "" || $confirmpasswd != "")){
	$password = $newpasswd;
//	$person->updatePasswd($_SESSION['ID'],sha1($_GET[$password]));
	
}
else{
	$password = $_SESSION['password'];
//	$person->updatePasswd($_SESSION['ID'],sha1($_GET[$password]));
//,sha1($_POST[$password])
	}
	
	*/
$getsenha = sha1($_POST['password']);
$sessionpass = $_SESSION['password'];

if($getsenha == $sessionpass){	
$person->updateUser($_GET['id'],$_POST['username'],$_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['email'],$_POST['study']);
}
else{
	echo '	<div class="alert alert-danger">

					<strong>Não foi possível alterar dados.</strong>

				</div>';
	}
$db->closeDb();
	
	header("Location: /?pages=changeProfileSettings&id=".$_GET['id']."");

?>