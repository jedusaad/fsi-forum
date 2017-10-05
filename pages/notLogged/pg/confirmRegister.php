<?php  

	//sinclude ('func/class.php');

?>

<div id="about" class="full-width">

	<div class="row col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">



			<h1 class="textColor"> Obrigado por cadastrar em nosso Fórum.</h1>

			<?php  

				if (isset($_GET['user'])&& $_GET['confirm'] == 'true'){

					$db = new dataBase();

					$db->conectToDb();



					$person = new person();

					$person->setConnectionDb($db->returnDb());



					$person->getUserByNickname($_GET['user']);

					echo '<div class="alert alert-success">Confirmação de Cadastro realizado com Sucesso.</div>';



					if ($person->GETtype() == 'teacher') {

						$person->updateState(3);

						echo '<div class="alert alert-danger">Aguarde aprovação de nossos administradores para acessar o sistema.</div>';

					}else{

						$person->updateState(1);

					}

				}

			?>

	</div>	

</div>