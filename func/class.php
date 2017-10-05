<?php 

	class dataBase{ 

		private $conect_db;

		private $host = "mysql.hostinger.com.br";

		private $user = "u264509104_adm";

		private $password = "ftpfacul1";

		

		public function conectToDb(){

			$this->conect_db =  mysqli_connect($this->host,$this->user, $this->password,"u264509104_facul") or print (mysqli_error($this->host));

			}

		public function returnDb(){

			return $this->conect_db;

		}

		public function closeDb(){

			mysqli_close($this->conect_db);

		}		

	} 

	class type{ #perfil

		private $id;
		private $typeName;
		private $description;
		private $db;
		private $lastUpdate; 
		private $userIdOwner; 
		


		public function setDb($dbConnection){

		$this->db = $dbConnection;
		}
		
		//crud Insert (type)
		public function createNewType($typeName,$description){
		$lastUpdate = date("Y-m-d H:i:s"); 
		
		$userIdOwner = $_SESSION['ID'];
		
		$status = 1; /*ativo*/	
		
		$sql = mysqli_query($this->db, "INSERT INTO `type` (typeName, description,lastUpdate,userIdOwner,status) VALUES 				        ('$typeName','$description','$lastUpdate',$userIdOwner,$status)")
			or die (mysqli_error($this->db));
		
		}
		public function deleteType($id){
			$state = 0;
			$lastUpdate = date("Y-m-d H:i:s");
			$userIdOwner = $_SESSION['ID']; 

			$teste = mysqli_query($this->db,"UPDATE `type` SET `status` = '$state', `lastUpdate` = '$lastUpdate', `userIdOwner` = '$userIdOwner' WHERE `ID` = '$id' ")or die(mysqli_error($this->db));
			}
		public function selectActive(){
			$sql = mysqli_query($this->db,"SELECT * FROM `type` WHERE `status` = 1")or die(mysqli_error($this->db));
			return $sql;
			
			
			}
			

		public function getTypeByName($name){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `type` WHERE `typeName` = '".$name."'")or die( mysqli_error($this->db));

			$sqlDone = mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);

			$this->id = $sqlDone['ID'];
			$this->description = $sqlDone['description'];
			$this->lastUpdate = $sqlDone['lastUpdate']; 
			$this->userIdOwner = $sqlDone['userIdOwner']; 
		}

		public function getTypeById($id){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `type` WHERE `ID` = '".$id."'")or die( mysqli_error($this->db));

			$sqlDone = mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);

			$this->typeName = $sqlDone['typeName'];
			$this->description = $sqlDone['description'];
			$this->lastUpdate = $sqlDone['lastUpdate']; 
			$this->userIdOwner = $sqlDone['userIdOwner']; 
		}
		public function getTypeName(){
			return $this->typeName;
		}
		public function getDescription(){
			return $this->description;
		}

	}

	

	class discipline{

		private $id;
		private $title;
		private $initials;
		private $status ;  //diciplineStatusId
		private $lastUpdate;
		private $userOwner; //User Id
		private $db;



		public function setDb($dbConnection){

			$this->db = $dbConnection;

		}

		

		public function getDiciplineAmount(){

			$sqlQuery = mysqli_query($this->db,

				"SELECT * FROM `discipline`") or die(mysqli_error($this->db));

			$sqlNumRows = mysqli_num_rows($sqlQuery);

			return $sqlNumRows;



		}

		public function createDicipline($sTitle,$title){

			$lastUpdate = date("Y-m-d H:i:s"); 

			$userIdOwner = $_SESSION['ID'];

			$state = 1;



			$sqlQuery = mysqli_query($this->db,"INSERT INTO `discipline` (title, state, lastUpdate, userIdOwner,initials) 

				VALUES ('$title','$state','$lastUpdate','$userIdOwner','$sTitle')") or die (mysqli_error($this->db));

			 

		}

		public function returnMySqlQuery(){

			$sqlQuery = mysqli_query($this->db,

				"SELECT * FROM `discipline`") or die(mysqli_error($this->db));

			return $sqlQuery;

		}

		public function updateStateDicipline($id,$state,$userIdOwner){

			$lastUpdate = date("Y-m-d H:i:s"); 

			$sqlQuery = mysqli_query($this->db,"UPDATE `discipline` SET `state` = '$state', `lastUpdate` = '$lastUpdate', `userIdOwner` = '$userIdOwner' WHERE `ID` = '$id' ") or die (mysqli_error($this->db));

		}

		public function updateTitleDicipline($id,$title,$userIdOwner){

			$lastUpdate = date("Y-m-d H:i:s"); 

			$sqlQuery = mysqli_query($this->db,"UPDATE `discipline` SET `title` = '$title', `lastUpdate` = '$lastUpdate', `userIdOwner` = '$userIdOwner' WHERE `ID` = '$id' ") or die (mysqli_error($this->db));

		}

		public function getDiciplineById($id){

			$sqlQuery = mysqli_query($this->db , "SELECT * FROM `discipline` WHERE `ID` = $id") or die (mysqli_error($this->db));



			$sqlDone = mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);



			$this->id = $sqlDone['ID'];

			$this->title = $sqlDone['title'];

			$this->status = $sqlDone['state'];  //diciplineStatusId

			$this->lastUpdate = $sqlDone['lastUpdate'];

			$this->userOwner = $sqlDone['userIdOwner']; //User Id

			$this->initials = $sqlDone['initials'] ;

			 

		}

		public function returnDiciplineName(){

			return $this->title;

		}

		public function GETinitials(){

			return $this->initials;

		}

	}

	

	

	class disciplineStatus{

		private $id;
		private $status;
		private $lastUpdate;
		private $userIdOwner;
		private $db;





		public function setDb($dbConnection){

			$this->db = $dbConnection;

		}



		public function getStatusById($id){

			$sqlQuery = mysqli_query($this->db , "SELECT * FROM `diciplineStatus` WHERE `ID` = `$id`");

			$sqlDone = mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);

			$status = $sqlDone['status'];

			return $status;

		}

	}



	class person{   #pessoa

		private $id;
		private $username;
		private $name;
		private $lastname;
		private $birthdate;
		private $email;
		private $password;
		private $study;
		private $img;
		private $type ; #Id do Perfil
		private $status;
		private $db;



		//This function gets the db connection and sets to intern var 

		public function setConnectionDb($connectionDb){

			$this->db = $connectionDb;

		}

		

		//this function checks into the database if one user exsits or not by his username

		public function checkExistanceByNickname($username){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `username` =  '".$username."'")or die( mysqli_error($this->db));

				if(mysqli_num_rows($sqlQuery)>0)

					return 0; //cant proceed

				else

					return 1; //should proceed

		}



		//this function creates a new user no the database

		public function createNewUser($username,$name,$lastname,$birthdate,$email,$password,$study,$img,$type){

			$state = 2;


			$sql = mysqli_query($this->db,

				"INSERT INTO `person` (username, name, lastname, birthdate, email, password, study, img, type, state) 

				VALUES ('$username','$name', '$lastname', '$birthdate', '$email', '$password', '$study','$img', '$type',$state)") or die (mysqli_error($this->db));

			

		}
		public function updatePasswd($myId,$newpassword){
			$sql = mysqli_query($this->db, "UPDATE `person` SET `password` = '$newpassword' WHERE `ID` = $myId");
			}
		public function updateUser($myId,$username,$name,$lastname,$birthdate,$email,$study){
			
			$sql = mysqli_query($this->db, "UPDATE `person` SET `username` = '$username', `name` = '$name', `lastname` = '$lastname', `birthdate` = '$birthdate', `email` = '$email', `study` = '$study' WHERE `ID` = $myId ");
			
			}





		public function getUserByNickname($username){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `username` = '".$username."'")or die( mysqli_error($this->db));

			if(mysqli_num_rows($sqlQuery)!=1){

				echo "error";

			}else{

				$sqlFetch =  mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);

				$this->id = $sqlFetch['ID'];

				$this->username = $sqlFetch['username'];

				$this->name = $sqlFetch['name'];

				$this->lastname = $sqlFetch['lastname'];

				$this->birthdate = $sqlFetch['birthdate'];

				$this->email = $sqlFetch['email'];

				$this->password = $sqlFetch['password'];

				$this->study = $sqlFetch['study'];

				$this->img = $sqlFetch['img'];

				$this->type = $sqlFetch['type'];

				$this->status = $sqlFetch['state'];

			}
			

		}

		

		public function login($username,$password){



			if ($this->password!=$password ) {

				return 1;

			}else{

				if ($this->status == 2) {
					return 2;
				}

				if($this->type == 'teacher' && $this->status == 1){
					$_SESSION['ID'] = $this->id;

					$_SESSION['username'] = $this->username;

					$_SESSION['password'] = $this->password;

					$_SESSION['email'] = $this->email;

					$_SESSION['img'] = $this->img;

					$_SESSION['type'] = $this->type;

					$_SESSION['name'] = $this->name;
				
				}elseif($this->type == 'teacher' && $this->status == 2){
					return 2;
				
				}elseif($this->type == 'teacher' && $this->status == 3){
					return 3;
				}elseif($this->status == 1){


					$_SESSION['ID'] = $this->id;

					$_SESSION['username'] = $this->username;

					$_SESSION['password'] = $this->password;

					$_SESSION['email'] = $this->email;

					$_SESSION['img'] = $this->img;

					$_SESSION['type'] = $this->type;

					$_SESSION['name'] = $this->name;

					return 0;
				}else{
					return 1;
				}
			}



		}



		public function getUserById($id){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `ID` = '".$id."'")or die( mysqli_error($this->db));

			if(mysqli_num_rows($sqlQuery)!=1){

				echo "error";

			}else{

				$sqlFetch =  mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);

				$this->id = $sqlFetch['ID'];

				$this->username = $sqlFetch['username'];

				$this->name = $sqlFetch['name'];

				$this->lastname = $sqlFetch['lastname'];

				$this->birthdate = $sqlFetch['birthdate'];

				$this->email = $sqlFetch['email'];

				$this->password = $sqlFetch['password'];

				$this->study = $sqlFetch['study'];

				$this->img = $sqlFetch['img'];

				$this->type  = $sqlFetch['type']; #Id do Perfil

			}

		}
		public function GETimage(){
			return $this->img;
		}
		public function GETnickname(){
			return $this->username;
		}
		public function GETtype(){
			return $this->type;
		}
		public function GETname(){
			return $this->name;
		}
		public function GETlastname(){
			return $this->lastname;
		}
		public function GETemail(){
			return $this->email;
		}
		public function GETbirthdate(){
			return $this->birthdate;
		}
		public function GETstudy(){
			return $this->study;
		}
		

		public function updateState($state){
			$myId = $this->id;
			$sqlDone = mysqli_query($this->db,"UPDATE `person` SET `state` = '$state' WHERE `ID` = '$myId' ");
		}			

		public function selectTeacher(){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `type` = 'teacher' AND `state`= 1")or die( mysqli_error($this->db));

			return $sqlQuery;
		}
		
			public function selectAllUser(){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` ORDER BY id DESC " )or die( mysqli_error($this->db));

			return $sqlQuery;
		}

		public function selectActiveTeacher(){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `type` = 'teacher' AND `state`= 1")or die( mysqli_error($this->db));

			return $sqlQuery;
		}
		public function selectmoderateTeacher(){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `type` = 'teacher' AND `state`= 3")or die( mysqli_error($this->db));
			
			

			return $sqlQuery;
		}
		
		public function selectmoderateUser(){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE  `state`= 2")or die( mysqli_error($this->db));
			
			

			return $sqlQuery;
		}
		
		public function updateType($type){
			$myId = $this->id;
			$sqlDone = mysqli_query($this->db,"UPDATE `person` SET `type` = '$type' WHERE `ID` = '$myId' ")or die( mysqli_error($this->db));
		}
		public function selectActiveUser(){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `state`= 1")or die( mysqli_error($this->db));

			return $sqlQuery;
		}
		public function selectUserNotTeacher(){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `type`!= 'teacher'")or die( mysqli_error($this->db));

			return $sqlQuery;
		}
	}
	 



	

	

	class topic{

		private $id;

		private $title;

		private $description;

		private $status ; //topicStatusId

		private $lastUpdate;

		private $userOwner ; //userId

		private $discipline; //diciplineId

		private $father; //if is subtopic , father ID

		private $db;



		public function setDb($dbConnection){

			$this->db = $dbConnection;

		}



		public function getAllTopicByDiscipline($discipline){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `topic` WHERE `discipline` = $discipline")or die( mysqli_error($this->db));

			return $sqlQuery;

		}

		public function getActiveNewerTen(){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `topic` WHERE `status` = 1 AND `father` <> 0 ORDER BY `lastUpdate` DESC LIMIT 10")or die( mysqli_error($this->db));

			return $sqlQuery;

		}

		public function getActiveTopicByDiscipline($discipline){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `topic` WHERE `discipline` = $discipline AND `status` = 1 AND `father` = 0 ")or die( mysqli_error($this->db));

			return $sqlQuery;

		}

		public function getActiveTopicById($id){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `topic` WHERE `ID` = $id AND `status` = 1 ")or die( mysqli_error($this->db));

			$sqlDone = mysqli_fetch_array($sqlQuery,MYSQLI_ASSOC);

			

			$this->title = $sqlDone['title'];

			$this->description = $sqlDone['description'];

			$this->status  = $sqlDone['status']; //topicStatusId

			$this->lastUpdate = $sqlDone['lastUpdate'];

			$this->userOwner  = $sqlDone['userOwner']; //userId

			$this->discipline = $sqlDone['discipline']; //diciplineId

			$this->father = $sqlDone['father']; //if is subtopic , father ID



		}

		public function GETtopicTitle(){

			return $this->title;

		}

		public function getActiveTopicAmount($discipline){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `topic` WHERE `discipline` = $discipline AND `status` = 1 AND `father` = 0")or die( mysqli_error($this->db));

			$sqlNumRows = mysqli_num_rows($sqlQuery);

			return $sqlNumRows;

		}

		public function getActiveSubtopicAmount($father,$dicipline){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `topic` WHERE `discipline` = $discipline AND `father` = $father AND `status` = 1 ")or die( mysqli_error($this->db));

		}

		public function createTopic($title,$description,$discipline){

			$lastUpdate = date("Y-m-d H:i:s");

			$userIdOwner = $_SESSION['ID'];

			

			if ($_SESSION['type'] == 'root' || $_SESSION['type'] == 'teacher') {

				$status = 1;

				$sql = mysqli_query($this->db,

				"INSERT INTO `topic` (title, description, status, lastUpdate, userIdOwner, discipline,father) 

				VALUES ('$title','$description', '$status', '$lastUpdate', '$userIdOwner', '$discipline',0)") or die (mysqli_error($this->db));



			}elseif ($_SESSION['type'] == 'monitor') {

				$status = 3;

				$sql = mysqli_query($this->db,

				"INSERT INTO `topic` (title, description, status, lastUpdate, userIdOwner, discipline, father) 

				VALUES ('$title','$description', '$status', '$lastUpdate', '$userIdOwner', '$discipline', 0)") or die (mysqli_error($this->db));

			

			}else{

				echo "YOU DONT HAVE PERMISSION TO DO THIS ACTION";

			}

		}
		public function createSubTopic($title,$subtopicDescription,$disc,$father){
			$lastUpdate = date("Y-m-d H:i:s");

			$userIdOwner = $_SESSION['ID'];

			$status = 1;

			$sql = mysqli_query($this->db,

				"INSERT INTO `topic` (title, description, status, lastUpdate, userIdOwner, discipline,father) 

				VALUES ('$title','$subtopicDescription', '$status', '$lastUpdate', '$userIdOwner', '$disc','$father')") or die (mysqli_error($this->db));

		}

		public function updateStateTopic($id,$state,$userIdOwner){

			$lastUpdate = date("Y-m-d H:i:s"); 

			$sqlQuery = mysqli_query($this->db,"UPDATE `topic` SET `status` = '$state', `lastUpdate` = '$lastUpdate', `userIdOwner` = '$userIdOwner' WHERE `ID` = '$id' ") or die (mysqli_error($this->db));

		}
		public function getActiveSubTopicByTopic($topic){

			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `topic` WHERE `father` = $topic AND `status` = 1 ")or die( mysqli_error($this->db));

			return $sqlQuery;

		}

	}	



	// class student extends person { #aluno

	// 	private $personID;

	// 	private $registration; #matricula

	// 	private $period; #periodo

	// }



	class teacher extends person {

		private $course; #curso orientado
		
		/*
		public function setMonitor($typeName) { //moderar o perfil para professor adicionar monitor
			$sqlQuery = mysqli_query($this->db,"UPDATE `person` SET `type` = '$typeName' WHERE `type` = 4 ") or die (mysqli_error($this->db)); //alterar o tipo do estudante (4) para monitor (3).
		
			}
			
		public function selectType($typeName){
			$sqlQuery = mysqli_query($this->db,"SELECT * FROM `person` WHERE `type` = 4 ")or die( mysqli_error($this->db));

			return $sqlQuery;
			}
		
		*/


	}





	

	class topicStatus{

		private $id;

		private $status;

		private $lastUpdate;

		private $userLastUpdate; //lasUserId

	}

	

	

	class answer{

		private $id;

		private $title;

		private $description;

		private $timeInsert;

		private $userOwner ;//userId

		private $topicFather ; //topicId

		private $status ; //topicStatusId

		private $db;


		public function setDb($dbConnection){

			$this->db = $dbConnection;

		}

		public function selectActive(){
			$sql = mysqli_query($this->db,"SELECT * FROM `answer` WHERE `status` = 1");

			return $sql;
		}
		public function selectActiveByFather($father){
			$sql = mysqli_query($this->db,"SELECT * FROM `answer` WHERE `status` = 1 AND `topicFather` = $father");

			return $sql;
		}
		public function insertAnswer($description,$father){
			$lastUpdate = date("Y-m-d H:i:s");

			$userIdOwner = $_SESSION['ID'];

			$status = 1;
			$sql = mysqli_query($this->db,"INSERT INTO `answer` (description,lastUpdate,userOwner,topicFather,status) VALUES ('$description','$lastUpdate',$userIdOwner,$father,1)")or die(mysqli_error($this->db));
		}





	}

	/**
	* 	Mail Class
	*/
	class mail
	{
		private $subject;
		private $name;
		private $lastname;
		private $phone;
		private $from;
		private $db;




		function __construct()
		{
			# code...
		}

		public function setDb($dbConnection){
			$this->db = $dbConnection;
		}

		public function mailRegister($to,$user){

			$subject = 'Registro no Fórum Sistemas de Informação';

			$fineshedMessage = '
			<html>
				<body>
					<table width="100%" style="padding:10px">
						<tr>
							<td width="20%"></td>
							<td width="60%">
								<div width="100%" style="background-color:#EFEDE6;color:#757575;text-align:center;">
									<a href="http://forum.jedusaad.com/"><img src="http://forum.jedusaad.com/assets/img/logovertical.png" style="width:60%;"></a>
									<div style="padding:15px;background-color:#e1ded0;">
										<h1>Bem vindo ao Fórum Sistemas de Informação!</h1>
										<div style="font-size:30px; text-align:left; padding-left:30px;">
											<p>	Você recentemente se cadastrou no nosso site nesse email!<br>
												Para confirmar seu cadastro, clique no link<br>
												<a href="forum.jedusaad.com/?pages=confirmRegister&user='.$user.'&confirm=true">Clique Aqui</a>

												
											</p>
										</div>
									</div>
									<div style="padding:7px;">
										Agradecemos o cadastro!
									</div>
								</div>
							</td>
							<td width="20%"></td>
						</tr>
					</table>
				</body>
			</html>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From: <no-reply@forum.jedusaad.com>' . "\r\n";


			mail($to, $subject, $fineshedMessage,$headers);
		}

		public function contactMail($subject,$name,$lastName,$phone,$message,$from){
			$to = 'contato@jedusaad.com';

			$fineshedMessage = '
			<html>
			<body>
				<p>Nome:'.$name.' .</p>
				<p>Sobrenome:'.$lastName.' .</p>
				<p>Telefone:'.$phone.' .</p>
				<p>Email:'.$from.' .</p>
				<p>Menssagem: '.$message.'</p>
			</body>
			</html>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From: <no-reply@forum.jedusaad.com>' . "\r\n";


			mail($to, $subject, $fineshedMessage,$headers);
		}
	}
		

	

 ?>