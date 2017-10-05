<div class="col-md-12" id="answer">
	<?php  			
		
		$db = new dataBase();
		$db->conectToDb();
		$answer = new answer();
		$answer->setDb($db->returnDb());

		
		$dicipline = new discipline();
		$dicipline->setDb($db->returnDb());
		$dicipline->getDiciplineById($_GET['disc']);
		$diciplineInitials = $dicipline->GETinitials();

		
		$topic = new topic();
		$topic->setDb($db->returnDb());
		$topic->getActiveTopicById($_GET['topic']);
		$topicTitle = $topic->GETtopicTitle();

		$subtopic = new topic();
		$subtopic->setDb($db->returnDb());
		$subtopic->getActiveTopicById($_GET['subtopic']);
		$subtopicTitle = $subtopic->GETtopicTitle();

	echo '
		<div class="title">
			<h2><a href="?pages=onDiscipline&disc='.$_GET['disc'].'" class="textColor">'.$diciplineInitials.'</a>  >  <a href="/?pages=onDiscipline&disc='.$_GET['disc'].'&topic='.$_GET['topic'].'" class="textColor">'.$topicTitle.'</a>  >  <a href="#" class="textColor">'.$subtopicTitle.'</a>';  

					if($_SESSION['type']=='teacher'|| $_SESSION['type'] == 'root'){
						echo ' 
							<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newAnswer" style="margin-right:10px; margin-top:10px; margin-bottom:10px;"> + Nova Resposta </button>';
					}
					if (isset($_GET['subtopic'])&&$_SESSION['type'] == "student") {
						echo ' 
							<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newAnswer" style="margin-right:10px; margin-top:10px; margin-bottom:10px;"> + Nova Resposta </button>';
					}

	echo'	</h2>
		</div>

		<div class="bgAnswer">
				
 		';
			$answerFetch = $answer->selectActiveByFather($_GET['subtopic']);

				
			for ($i=0; $i < mysqli_num_rows($answerFetch) ; $i++) { 
				$answerArray = mysqli_fetch_array($answerFetch,MYSQLI_ASSOC);
				$person = new person();
				$person->setConnectionDb($db->returnDb());
				$person->getUserById($answerArray['userOwner']);
				// echo 	'<div class="answerWrapper col-md-12">
				// 			<div class="answerPhotoPerson col-md-2 text-center">	
				// 				<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
				// 				<div class="answerNick">	
				// 					'.$person->GETnickname().'
				// 				</div>
				// 			</div>
				// 			<div class="answerAnswer col-md-10">	
				// 				'.$answerArray['description'].'
				// 			</div>
				// 		</div>	';

				switch ($person->GETtype()) {
					case 'teacher':
						echo 	'<div class="teacherBackground col-lg-12 hidden-md hidden-sm hidden-xs">
									<div class="answerPhotoPerson col-lg-2 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-lg-10">	
										'.$answerArray['description'].'
									</div>
								</div>	';
						
						echo 	'<div class="teacherBackground col-md-12 hidden-lg hidden-sm hidden-xs">
									<div class="answerPhotoPerson col-md-3 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-md-9">	
										'.$answerArray['description'].'
									</div>
								</div>	';		

						echo 	'<div class="teacherBackground col-sm-12 hidden-lg hidden-md hidden-xs">
									<div class="answerPhotoPerson col-sm-4 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-sm-8">	
										'.$answerArray['description'].'
									</div>
								</div>	';			


						break;
					case 'monitor':
						echo 	'<div class="monitorBackground col-lg-12 hidden-md hidden-sm hidden-xs">
									<div class="answerPhotoPerson col-lg-2 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-lg-10">	
										'.$answerArray['description'].'
									</div>
								</div>	';
						
						echo 	'<div class="monitorBackground col-md-12 hidden-lg hidden-sm hidden-xs">
									<div class="answerPhotoPerson col-md-3 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-md-9">	
										'.$answerArray['description'].'
									</div>
								</div>	';

						echo 	'<div class="monitorBackground col-sm-12 hidden-lg hidden-md hidden-xs">
									<div class="answerPhotoPerson col-sm-4 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-sm-8">	
										'.$answerArray['description'].'
									</div>
								</div>	';		


						break;
					
					default:
						echo 	'<div class="answerWrapper col-lg-12 hidden-xs hidden-sm hidden-md">
									<div class="answerPhotoPerson col-lg-2 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-lg-10">	
										'.$answerArray['description'].'
									</div>
								</div>	';
						
						echo 	'<div class="answerWrapper col-md-12 hidden-xs hidden-sm hidden-lg">
									<div class="answerPhotoPerson col-md-3 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-md-9">	
										'.$answerArray['description'].'
									</div>
								</div>	';

						echo 	'<div class="answerWrapper col-sm-12 hidden-xs hidden-md hidden-lg">
									<div class="answerPhotoPerson col-sm-4 text-center">	
										<img src="'.$person->GETimage().'" alt="" height="98px" width="98px">
										<div class="answerNick">	
											'.$person->GETnickname().'
										</div>
									</div>
									<div class="answerAnswer col-sm-8">	
										'.$answerArray['description'].'
									</div>
								</div>	';






						break;
				}

			}
 

	?>

			</div>

</div>


<?php 
	//if($_SESSION['type']=='teacher'|| $_SESSION['type'] == 'root'){
		echo ' 
			<div id="newAnswer" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-lg ">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Nova Resposta</h4>
					      </div>
					      <div class="modal-body">
					        <form method="post" action="func/registerAnswer.php?disc='.$_GET['disc'].'&topic='.$_GET['topic'].'&father='.$_GET['subtopic'].'">
					        	
					        	<div class="form-group full-width">
					  				<textarea type="text" id="Sdiscipline" placeholder="Entrada" name="regAnswer" rows="10"> </textarea>
					        	</div>
					        	<button role="submit" class="btn btn-success btn-block ">Cadastrar</button>
					        </form>
					      </div>
					    </div>

					  </div>
					</div>
			';
	//}
?>