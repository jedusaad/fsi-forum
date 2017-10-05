<div class="full-width" id="discipline">

	<div class="col-md-12">

		<div class="title hidden-sm hidden-xs visible-md visible-lg"> 

			<h1>Disciplinas 

			<?php  

				if($_SESSION['type']=='teacher'|| $_SESSION['type'] == 'root'){

					echo ' <button type="button" class="btn btn-danger btn-md pull-right" data-toggle="modal" data-target="#delDiscipline"> - Apagar Disciplina</button>

					<button type="button" class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#newDiscipline" style="margin-right:10px;"> + Nova Disciplina </button>';

				}

			?> 

				 

			</h1>

		</div>

		<div class="titleSm visible-sm hidden-xs hidden-md hidden-lg"> 
			
				<h1>Disciplinas 
			
					<?php  

						if($_SESSION['type']=='teacher'|| $_SESSION['type'] == 'root'){

						echo ' <button type="button" class="btn btn-danger btn-md pull-right btnDelDisc" data-toggle="modal" data-target="#delDiscipline"> - Apagar Disciplina</button>

						<button type="button" class="btn btn-success btn-md pull-right btnNewDisc" data-toggle="modal" data-target="#newDiscipline" style="margin-right:10px;"> + Nova Disciplina </button>';

						}

					?> 
				</h1>
		</div>



		 <?php 

			$db = new dataBase();

			$db->conectToDb();



			$dicipline = new discipline();



			$dicipline->setDb($db->returnDb());



			$diciplineAmount = $dicipline->getDiciplineAmount();



			if ($diciplineAmount == 0 ) {

				echo '

				<a href="">

					<div class="well bgDicipline"> Não Existem disciplinas cadastradas !</div>

				</a>';

			}else{

				$sqlQuery = $dicipline->returnMySqlQuery();

				for ($i=0; $i <$diciplineAmount ; $i++) {



					$sqlDone =  mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);

					if($sqlDone['state'] == 1){				

						echo '

							<div class="well bgDicipline textColor">

								<a href="?pages=onDiscipline&disc='.$sqlDone['ID'].'" class"linkDiscipline textColor" >								

									'.$sqlDone['initials'].'  -  '.$sqlDone['title'].'

								</a>';

									if($_SESSION['type']=='teacher'|| $_SESSION['type'] == 'root')

										echo '<button class="pull-right btn btn-primary" data-toggle="collapse" data-target="#discipline'.$sqlDone['ID'].'"><span class="glyphicon glyphicon-cog"></span> Alterar</button>';		

						echo ' 

							</div>';



						if($_SESSION['type']=='teacher'|| $_SESSION['type'] == 'root')

							echo '

								<div id="discipline'.$sqlDone['ID'].'" class="collapse">

									<div class="panel panel-warning" >

										<div class="panel-heading">Alterar Disciplina - '.$sqlDone['title'].'</div>

	  										<div class="panel-body">

	  											<form method="post" role="form" action="func/updateDiscipline.php">

	  												<input class="hidden" name="ID" value="'.$sqlDone['ID'].'">

												 	<div class="form-group">

												 	  	<label>Digite novo nome abaixo:</label>

												 		<input class="form-control col-md-10" name="newName">											 		

												 	</div>

												 	<div class="form-group">

												 		<button role="submit" class="btn btn-info pull-right" style="margin-top:10px;">Atualizar</button>

												 	</div>

												</form>

	  										</div>									

									</div>

								</div>';

					}

				}

			}





		 ?>



		 



		 

		 

















		





	<!-- class discipline{

		private $id;

		private $title;

		private $status = new disciplineStatus(); 

		private $lastUpdate;

		private $userOwner = new user();

	}

	 -->

	</div>

</div>



<?php  

	if($_SESSION['type']=='teacher'|| $_SESSION['type'] == 'root'){

		echo '

			<div id="newDiscipline" class="modal fade" role="dialog">

			  <div class="modal-dialog">



			    <!-- Modal content-->

			    <div class="modal-content">

			      <div class="modal-header">

			        <button type="button" class="close" data-dismiss="modal">&times;</button>

			        <h4 class="modal-title">Cadastrar Disciplina</h4>

			      </div>

			      <div class="modal-body">

			        <form method="post" action="func/registerDicipline.php">

			        	<div class="form-group col-md-4">

			  				<input type="text" class="form-control" id="Sdiscipline" placeholder="Sigla da Disciplina" name="Sdiscipline">

			        	</div>

			        	<div class="form-group col-md-8">

			  				<input type="text" class="form-control" id="discipline" placeholder="Nome da Disciplina" name="discipline">

			        	</div>



			        	<button role="submit" class="btn btn-success btn-block ">Cadastrar</button>

			        </form>

			      </div>

			    </div>



			  </div>

			</div>



			<div id="delDiscipline" class="modal fade" role="dialog">

			  <div class="modal-dialog">



			    <!-- Modal content-->

			    <div class="modal-content">

			      <div class="modal-header">

			        <button type="button" class="close" data-dismiss="modal">&times;</button>

			        <h4 class="modal-title">Apagar Disciplina</h4>

			      </div>

			      <div class="modal-body">

			        <form method="post" action="func/deleteDiscipline.php">

			        	<div class="form-group">

			  				  <label for="sel1">Select list:</label>

							  <select class="form-control" id="discipline" name="discipline">';

								if ($diciplineAmount == 0 ) {

									echo '

										<option> Não Existem disciplinas cadastradas !</option>';

								}else{

									$sqlQuery = $dicipline->returnMySqlQuery();

									for ($i=0; $i <$diciplineAmount ; $i++) {



										$sqlDone =  mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);

										if($sqlDone['state'] == 1){				

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



	$db->closeDb();

?> 





<!-- Modal -->

