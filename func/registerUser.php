<?php  
	session_start();
	 include("class.php");


	$db = new database();
	$db->conectToDb();

	$person = new person();
	$person->setConnectionDb($db->returnDb());

	if($person->checkExistanceByNickname($_POST['username']) == 0){
		header("Location: ../?pages=register&error=1");
	}else{
		$new_name = 'default.jpg';
		if(isset($_FILES['fileUpload']))
		   {
		      echo $_FILES['fileUpload']['tmp_name'];

		      echo $_POST['img'];
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
		

		$person->createNewUser($_POST['username'],$_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['email'],sha1($_POST['password']),$_POST['study'],$imgAddressFromRoot,$_POST['type']);

		$mail = new mail();
		$mail->mailRegister($_POST['email'],$_POST['username']);
		header("Location: /");
	}


	$db->closeDb();
?>