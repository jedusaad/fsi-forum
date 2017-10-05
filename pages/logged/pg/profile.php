<?php 
// profile
	$db = new dataBase();

	$db->conectToDb();



	$person = new person();



	$person->setConnectionDb($db->returnDb());



	$person->getUserById($_GET['id']);



	

	$type = new type(); 



	$type->setDb($db->returnDb());



	$type->getTypeByName($person->GETtype());



			

?>



<div id="profile" class="col-md-12 textColor">

	<div class="col-md-12">

		<h1 class="textColor" style="text-align:left;">Perfil</h1>

	</div>



	<div class="col-md-12 textColor backplate">

<?php 

	echo '	<div class="col-md-2" style="text-align:center;">

				<img class="thumbnail" src="'.$person->GETimage().'" style="width:85%;">

			</div>';



	echo 	'<div class="col-md-10 textColor"style="text-align:left;">

				<div class="row">

					<div class="col-md-3">

						<h3>Nome:</h3>

						<h4>'.$person->GETname().'</h4>

					</div>	

					<div class="col-md-3">

						<h3>Sobrenome:</h3>

						<h4>'.$person->GETlastname().'</h4>

					</div>

					<div class="col-md-3">

						<h3>Tipo de Conta:</h3>

						<h4>'.$type->getDescription().'</h4>

					</div>

				</div>	

				<div class="row">

					<div class="col-md-3">

						<h3>Usuário:</h3>

						<h4>'.$person->GETnickname().'</h4>

					</div>	

					<div class="col-md-3">

						<h3>Email:</h3>

						<h4>'.$person->GETemail().'</h4>

					</div>

					<div class="col-md-3">

						<h3>Aniversário:</h3>

						<h4>'.$person->GETbirthdate().'</h4>

					</div>

				</div>	

				<div class="row">

					<div class="col-md-12">

						<h3>Estudos:</h3>

						<h4>'.$person->GETstudy().'</h4>

					</div>	

				</div>';



				if($_SESSION['ID'] == $_GET['id']){  // bt atualizar dados somente pro user do respectivo id
				echo ' 

				<div class="row">

					<a href="/?pages=changeProfileSettings&id='.$_SESSION['ID'].'" class="btn btn-primary pull-right enabled">Atualizar dados.</a>

				</div>

			</div>';
				}























?>



	</div>

	

</div>