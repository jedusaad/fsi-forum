<script>

	$(document).ready(function(){

	    $('[data-toggle="tooltip"]').tooltip(); 

	});

</script>



<?php 

	if($_SESSION['ID'] == $_GET['id']){	

		$db = new dataBase();

		$db->conectToDb();



		$person = new person();



		$person->setConnectionDb($db->returnDb());



		$person->getUserById($_GET['id']);



		

		$type = new type(); 



		$type->setDb($db->returnDb());


	/*
		$type->getTypeByName($person->GETtype());
		$name = $person->GETname();
		$username = $person->GETnickname();
		$lastname = $person->GETlastname();
		$birthdate = $person->GETbirthdate();
		$email = $person->GETemail();
		$study = $person->GETstudy(); 
		$img = $person->GETimage();	
		//$password = $person->GETpassword();	
		

		*/
				

			

			echo'



			<div id="changeProfile" class="col-md-12 textColor">

				<div class="col-md-12">

					<h1 class="textColor" style="text-align:left;">Perfil</h1>

					

				</div>



				<div class="col-md-12 textColor backplate">';



				echo '<form method="post" action="func/updateUser.php/?id='.$_GET['id'].'">';

					echo '	<div class="col-md-2" style="text-align:center; ">

								<img class="thumbnail" src="'.$person->GETimage().'" style="width:85%;">

							

							</div>';



					echo 	'<div class="col-md-10 textColor"style="text-align:left;">

								<div class="row">

									<div class="col-md-9">

										<div class="row">

											<div class="col-md-4 form-group space">

												<label>Nome:</label>

												<input type="text" class="form-control" id="name" placeholder="'.$person->GETname().'" value="'.$person->GETname().'" name="name" >

											</div>	

											<div class="col-md-4 form-group space">

												<label>Sobrenome:</label>

												<input type="text" class="form-control" id="lastname" placeholder="'.$person->GETlastname().'" name="lastname" value="'.$person->GETlastname().'">



											</div>

											

										</div>	

										<div class="row">

											<div class="col-md-4 form-group space">

												<label>Usuário:</label>

												<input type="text" class="form-control" id="nickname" placeholder="'.$person->GETnickname().'" name="username" value="'.$person->GETnickname().'">

											</div>	

											<div class="col-md-4 form-group space">

												<label>Email:</label>

												<input type="text" class="form-control" id="email" placeholder="'.$person->GETemail().'" name="email" value="'.$person->GETemail().'">

											</div>

											<div class="col-md-4 form-group space">

												<label>Aniversário:</label>

												<input type="date" class="form-control" id="birth" placeholder="'.$person->GETbirthdate().'" name="birthdate" value="'.$person->GETbirthdate().'">

											</div>

										</div>

									</div>

									<div class="col-md-3 passwordInsert">

										<div class="col-md-12 form-group space">

											<label>Senha:</label>

											<input type="password" class="form-control" id="password" placeholder="********" name="password" required>

										</div>

										<div class="col-md-12 form-group space">';

									/*	<!-- <a href="#" class="btn btn-info btn-block" data-target="#newPassword" data-toggle="collapse">Atualizar senha</a> */
										echo'

											<small>*Para que seu cadastro seja atualizado, a senha é obrigatória.</small>

										</div>

										

									</div>

								</div>	

								<div class="row">

									<div class="col-md-12 form-group space">

										<label>Estudos:</label>

										<textarea class="form-control" id="study" placeholder="'.$person->GETstudy().'" name="study" rows="5" ></textarea>

									</div>

									<div class="collapse" id="newPassword"> 

										<div class="col-md-12 form-group space">

											<label>Nova senha:</label>

											<input type="password" class="form-control" id="newpassword" placeholder="********" name="newpassword">

										</div>

										<div class="col-md-12 form-group space">

											<label>Confirma nova senha:</label>

											<input type="password" class="form-control" id="confirmnewpassword" placeholder="********" name="confirmnewpassword">

										</div>

									</div>	

								</div>';



							//	if($_SESSION['username'] == $person->GETnickname()){

								echo '

								<div class="row">

									<div class="col-md-12 form-group space">

										<button class="btn btn-primary pull-right" type="submit">Atualizar dados</button>

									</div>

								</div>

							</div>';

//							}

		echo '</form>';

	}else{

		echo '	<div class="alert alert-danger">

					<strong>Você não tem permissão para acessar essa página.</strong>

				</div>';

	}

?>



	</div>

	

</div>

