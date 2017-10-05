<div class="full-width" id="moderateUser">

	<div class="col-md-12">

		<div class="title">

			<h1> Moderar Perfil </h1>

		</div>

	</div>
  
</div> 
<?php
				$db = new dataBase();

				$db->conectToDb();
 
				$person = new person();
				
				$person->setConnectionDb($db->returnDb());
				
				$selectPerson = $person->selectUserNotTeacher();
				
				$numPerson = mysqli_num_rows($selectPerson);
				
				for ($i = 0; $i< $numPerson; $i++){
					//echo $i;
					$showSelectedPerson = mysqli_fetch_array($selectPerson,MYSQLI_ASSOC);
					echo '<div class="full-width" id="moderateUser">
							<div class="col-md-12 moderateUserPerson">
								<div class="teachercss">
									<h4 >
										<img src="'.$showSelectedPerson['img'].'" border="0"  height="80" width="80">
										 '.$showSelectedPerson['username'].'  - '.$showSelectedPerson['name'].' '.$showSelectedPerson['lastname'].' - '.$showSelectedPerson['email'];
										 echo '<button class="pull-right btn btn-primary" data-toggle="collapse" data-target="#manage'.$showSelectedPerson['ID'].'"><span class="glyphicon glyphicon-cog"></span> Moderar </button>
									</h4>	
								 <div class="straightLine"></div>
								 <div id="manage'.$showSelectedPerson['ID'].'" class="collapse">
												<div class="panel panel-primary">
												  	<div class="panel-heading">Moderar</div>
												  	<div class="panel-body">
													  	<form method="post" action="/func/moderateUser.php?user='.$showSelectedPerson['ID'].'">
														<div class="form-group col-md-10">
															  <select class="form-control" id="sel1" name="type">
															    <option value="teacher">Tornar usuário professor</option>
															    <option value="monitor">Tornar usuário monitor</option>
															    <option value="student">Tornar usuário aluno</option>
															  </select>
															</div>
															<div class="form-group col-md-2">
															  	<button type="submit" class="btn btn-block btn-success">Enviar</button>
															</div>
														</form>
													</div>
												</div>	
															
									</div>
								</div>
							</div>						
						</div>';
				}
				
				
			?>
            
                  



		


<style type="text/css">

.teachercss:hover {
	
	color:#212121;
}
a.classe1:active {
	text-decoration: none
	}
	</style>