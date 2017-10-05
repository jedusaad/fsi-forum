<div class="col-md-12" id="onDiscipline">

	<?php

		$db = new database();

		$db->conectToDb();

		$dicipline = new discipline();

		$dicipline->setDb($db->returnDb());

		$topic = new topic();

		$topic->setDb($db->returnDb());

		
		if (isset($_GET['topic'])) {

					$dicipline->getDiciplineById($_GET['disc']);
					$diciplineInitials = $dicipline->GETinitials();

					$topic->getActiveTopicById($_GET['topic']);
					$topicName = $topic->GETtopicTitle();

					$subtopic = new topic();
					$subtopic->setDb($db->returnDb());

					$subtopicQuery = $subtopic->getActiveSubTopicByTopic($_GET['topic']);


					if(mysqli_num_rows($subtopicQuery) > 0){
						echo '<h1 class="title hidden-xs hidden-sm"> <a href="/?pages=onDiscipline&disc='.$_GET['disc'].'" class="textColor">'.$diciplineInitials.'</a>  >  <a href="" class="textColor">'.$topicName.'</a>';
						if ($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'root') {
							
						
						echo'<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newSubTopic" style="margin-left:10px;"> + Novo Tópico</button>';
						echo '<button type="button" class="btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#deleteSubTopic"> - 
						 Apagar Tópico</button>';
						} 				
						echo '</h1>';


						echo '<div class="full-width titleSm hidden-xs hidden-md hidden-lg">';
						echo '<div class="row">';
						echo '<div class="full-width"><h1> <a href="/?pages=onDiscipline&disc='.$_GET['disc'].'" class="textColor">'.$diciplineInitials.'</a>  >  <a href="" class="textColor">'.$topicName.'</a>';
						echo '</h1>';
						echo '</div>';	
						echo '<div class="full-width">';
						if ($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'root') {
						echo'<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newSubTopic" style="margin-left:10px;"> + Novo Tópico</button>';
						echo '<button type="button" class="btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#deleteSubTopic"> - 
						 Apagar Tópico</button>';
						} 				
						echo '</div>';		
						echo '</div>';
						echo '</div>';



						for ($i=0; $i < mysqli_num_rows($subtopicQuery) ; $i++) {

							$subtopicFetch = mysqli_fetch_array($subtopicQuery,MYSQLI_ASSOC); 

							echo '	<a href="?pages=answer&disc='.$_GET['disc'].'&topic='.$_GET['topic'].'&subtopic='.$subtopicFetch['ID'].'">
											<div class="topicName">';
							echo "		<h4>".$subtopicFetch['title']."</h4> <br>";
							echo '		<div class="topicDescription">'.$subtopicFetch['description'].'</div>';
							echo'	</div>
									</a>';
							echo '<div class="straightLine"></div>';
						}
						

					}else{
						if ($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'root') {
							
						

						echo '<h1 class="title title hidden-xs hidden-sm"> <a href="/?pages=onDiscipline&disc='.$_GET['disc'].'" class="textColor">'.$diciplineInitials.'</a>  >  <a href="" class="textColor">'.$topicName.'</a>';
						 
						echo'<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newSubTopic" style="margin-left:10px;"> + Novo Tópico</button>';
						echo '<button type="button" class="btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#deleteSubTopic"> - 
						 Apagar Tópico</button>';
										
						echo '</h1>';



						echo '<div class="full-width titleSm hidden-xs hidden-md hidden-lg">';
						echo '<div class="row">';
						echo '<div class="full-width"><h1> <a href="/?pages=onDiscipline&disc='.$_GET['disc'].'" class="textColor">'.$diciplineInitials.'</a>  >  <a href="" class="textColor">'.$topicName.'</a> </h1>';
						echo '</div>';
						echo '<div class="full-width">';
						echo'<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newSubTopic" style="margin-left:10px;"> + Novo Tópico</button>';
						echo '<button type="button" class="btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#deleteSubTopic"> - 
						 Apagar Tópico</button>';
						echo '</div>';
						echo '</div>';
						echo '</div>';


						echo '
							<div class="alert alert-danger " style="margin-top:20px;">
					        	Não existem subtópicos cadastrados para essa diciplina
					        </div>';
						}else{
							header('Location: /?pages=answer&disc='.$_GET['disc'].'&topic='.$_GET['topic'].'&subtopic='.$_GET['topic'].'');
						}
					
					}

					// echo '<h1 class="title">'.$diciplineInitials.' > '.$topicName;
					 
					// if($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'root'){
					// echo'<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newSubTopic" style="margin-left:10px;"> + Novo Tópico</button>';
					// echo '<button type="button" class="btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#deleteSubTopic"> - 
					//  Apagar Tópico</button>';
					// }
									
					// echo '</h1>';

		
					echo '

						<div id="newSubTopic" class="modal fade" role="dialog">

						  <div class="modal-dialog">



						    <!-- Modal content-->

						    <div class="modal-content">

						      <div class="modal-header">

						        <button type="button" class="close" data-dismiss="modal">&times;</button>

						        <h4 class="modal-title">Cadastrar Novo Sub Tópico</h4>

						      </div>

						      <div class="modal-body">

						        <form method="post" action="func/registerSubtopic.php/?disc='.$_GET['disc'].'&topic='.$_GET['topic'].'">

						        	<div class="form-group">
						        		<label for="topic"> Nome do Sub Tópico </label>
						  				<input type="text" class="form-control" id="topic" placeholder="Nome do Sub Tópico" name="topic">

						        	</div>
						        	<div class="form-group">
						        		<label for="topicDescription"> Descrição do Sub Tópico </label>
						  				<textarea type="text" class="form-control" id="topicDescription" placeholder="Descrição do Sub Tópico" name="topicDescription" rows="5">
						  				</textarea>

						        	</div>

						        	<button role="submit" class="btn btn-success btn-block">Cadastrar</button>

						        </form>

						      </div>

						    </div>



						  </div>

						</div>';



					// 	<div id="deleteTopic" class="modal fade" role="dialog">
					// 	  <div class="modal-dialog">

					// 	    <!-- Modal content-->
					// 	    <div class="modal-content">
					// 	      <div class="modal-header">
					// 	        <button type="button" class="close" data-dismiss="modal">&times;</button>
					// 	        <h4 class="modal-title">Apagar Tópico</h4>
					// 	      </div>
					// 	      <div class="modal-body">
					// 	        <form method="post" action="func/deleteTopic.php/?f='.$_GET['disc'].'">
					// 	        	<div class="form-group">
					// 	  				  <label for="sel1">Select list:</label>
					// 					  <select class="form-control" id="discipline" name="topic">';
					// 						if ($topicAmount == 0 ) {
					// 							echo '
					// 								<option> Não Existem diciplinas cadastradas !</option>';
					// 						}else{
					// 							$sqlQuery = $topic->getActiveTopicByDiscipline($_GET['disc']);
					// 							for ($i=0; $i <$topicAmount ; $i++) {

					// 								$sqlDone =  mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);
					// 								if($sqlDone['status'] == 1){				
					// 									echo '<option value="'.$sqlDone['ID'].'">'.$sqlDone['title'].' </option>';
					// 								}
					// 							}
					// 						}
					// 						echo'
					// 					   </select>
					// 	        	</div>
					// 	        	<button role="submit" class="btn btn-danger btn-block">Apagar</button>
					// 	        </form>
					// 	      </div>
					// 	    </div>

					// 	  </div>
					// 	</div>

					// 	';


		}else{
			if (isset($_GET['disc'])) {

				$dicipline->getDiciplineById($_GET['disc']);
				

				$topicAmount = $topic->getActiveTopicAmount($_GET['disc']);
				$diciplineAmount = $dicipline->getDiciplineById($_GET['disc']);
				$diciplineName = $dicipline->returnDiciplineName($_GET['disc']);
				echo '<h1 class="title hidden-sm hidden-xs">'.$diciplineName;
				 
				if($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'root'){
				echo'<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newTopic" style="margin-left:10px;"> + NovoTópico</button>';
				echo '<button type="button" class="btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#deleteTopic"> - 
				 Apagar Tópico</button>';
				}
				echo '</h1>';
				




				echo '<div class="full-width titleSm hidden-xs hidden-md hidden-lg">';
				echo '<div class="row">';
				echo '<div class="full-width"><h1>'.$diciplineName;
				echo '</h1>';
				echo '</div>';	
				echo '<div class="full-width">';				 
				if($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'root'){
				echo'<button type="button" class="btn btn-success btn-md pull-right btnNewTopic" data-toggle="modal" data-target="#newTopic" style="margin-left:10px;"> + NovoTópico</button>';
				echo '<button type="button" class="btn btn-danger btn-md pull-right btnDelTopic" data-toggle="modal" data-target="#deleteTopic"> - 
				 Apagar Tópico</button>';
				}
				echo '</div>';		
				echo '</div>';
				echo '</div>';
				

				if ($topicAmount > 0) {
					$topicFetch = $topic->getActiveTopicByDiscipline($_GET['disc']); 
					for ($i=0; $i < $topicAmount ; $i++) { 
						$topicFetchArray = mysqli_fetch_array($topicFetch,MYSQLI_ASSOC);
						$discDescription = limita_caracteres($topicFetchArray['description'], 400);
						echo '	<a href="?pages=onDiscipline&disc='.$_GET['disc'].'&topic='.$topicFetchArray['ID'].'">
									<div class="topicName">';
							echo "		<h4>" .$topicFetchArray['title']."</h4> <br>";
							echo '		<div class="topicDescription">'.$discDescription .'</div>';
							//
						echo'	</div>
							</a>';
						echo '<div class="straightLine"></div>';
					}
					
				}else{
					echo '
					   	<div class="alert alert-danger " style="margin-top:20px;">
				        	Não Existem Tópicos Cadastrados
				        </div>';
				}
			
				if($_SESSION['type'] == 'teacher' || $_SESSION['type'] == 'root'){

		echo '

			<div id="newTopic" class="modal fade" role="dialog">

			  <div class="modal-dialog">



			    <!-- Modal content-->

			    <div class="modal-content">

			      <div class="modal-header">

			        <button type="button" class="close" data-dismiss="modal">&times;</button>

			        <h4 class="modal-title">Cadastrar Novo Tópico</h4>

			      </div>

			      <div class="modal-body">

			        <form method="post" action="func/registerTopic.php/?disc='.$_GET['disc'].'">

			        	<div class="form-group">
			        		<label for="topic"> Nome do Tópico </label>
			  				<input type="text" class="form-control" id="topic" placeholder="Nome do Tópico" name="topic">

			        	</div>
			        	<div class="form-group">
			        		<label for="topicDescription"> Descrição do Tópico </label>
			  				<textarea type="text" class="form-control" id="topicDescription" placeholder="Descrição do Tópico" name="topicDescription" rows="5">
			  				</textarea>

			        	</div>

			        	<button role="submit" class="btn btn-success btn-block">Cadastrar</button>

			        </form>

			      </div>

			    </div>



			  </div>

			</div>



			<div id="deleteTopic" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Apagar Tópico</h4>
			      </div>
			      <div class="modal-body">
			        <form method="post" action="func/deleteTopic.php/?disc='.$_GET['disc'].'">
			        	<div class="form-group">
			  				  <label for="sel1">Select list:</label>
							  <select class="form-control" id="discipline" name="topic">';
								if ($topicAmount == 0 ) {
									echo '
										<option> Não Existem diciplinas cadastradas !</option>';
								}else{
									$sqlQuery = $topic->getActiveTopicByDiscipline($_GET['disc']);
									for ($i=0; $i <$topicAmount ; $i++) {

										$sqlDone =  mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);
										if($sqlDone['status'] == 1){				
											echo '<option value="'.$sqlDone['ID'].'">'.$sqlDone['title'].' </option>';
										}
									}
								}
								echo'
							   </select>
			        	</div>
			        	<button role="submit" class="btn btn-danger btn-block">Apagar</button>
			        </form>
			      </div>
			    </div>

			  </div>
			</div>

			';

		}

			}else{

				echo "Não Foi selecionada nenhuma Diciplina";

			} 



		}
	?> 


 
    <!--<div class="panel">    
    </div>-->
	
	<?php 

		

		$db->closeDb();

	?>

</div>

