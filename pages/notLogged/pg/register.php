<script type="text/javascript">

$(document).ready(function(){

	start=0;				//variable that tells if the fields has started to be filled to the page dont show any warning without it

	okByPassword = 0;		//variabel that tells if the register can proceed according to passwords

	okByUser = 0;			//variabel that tells if the register can proceed according to username





	//this function makes the button works or not, and show one warning or not deppending on the variables that tells 

	// if the register can be done

	setInterval(function(){ 

		if (start==0) {$("#buttonRegister").html('<button class="btn btn-primary btn-lg col-md-3 pull-right disabled">Cadastrar</button>');



		}else{

			if (okByPassword == 0) {

				$("#message").html('<div class=" alert alert-danger">As senhas não conferem!</div>');

				$("#buttonRegister").html('<button class="btn btn-primary btn-lg col-md-3 pull-right disabled">Cadastrar</button>');

			}else if (okByUser == 0) {

				$("#message").html('<div class=" alert alert-danger">Nome de usuário já existe, ou é inválido!</div>');

				$("#buttonRegister").html('<button class="btn btn-primary btn-lg col-md-3 pull-right disabled">Cadastrar</button>');

			}else{

				$("#message").html('<div class=" alert alert-success">Nome de usuário válido, e as senhas conferem!</div>');

				$("#buttonRegister").html('<button class="btn btn-primary btn-lg col-md-3 pull-right">Cadastrar</button>');

			}

		}





	},500);



	//this function colors the borders of the inputs form password, deppending on their ar equals or not

	// and the te value of the variable that tells if its ok to continue the register according to passwords

	$("#confirmPassword").keyup(function(){

		if ($("#password").val() == $("#confirmPassword").val()) {

			okByPassword = 1;

			start = 1;

			$("#password").css("border-color", "green");

			$("#confirmPassword").css("border-color", "green");

		}else{

			okByPassword = 0;

			start = 1;

			$("#password").css("border-color", "red");

			$("#confirmPassword").css("border-color", "red");

		}

	});



	$("#username").change(function(){

		$.post("func/checkUserExistance.php",{

			username: $("#username").val()

		},

		function(data,status){

			if(data == 0){

				okByUser = 0;

				start = 1;

				$("#username").css("border-color", "red");

				//cant do

			}else{

				okByUser = 1;

				start = 1;

				$("#username").css("border-color", "green");

				//can do 

			}

		});

	});



});

	

</script>

<div class="full-width" id="register">

	<div class="col-md-10 col-md-offset-1">

		<div class="col-md-4 text-center" >

			<img src="assets/img/logo.png"  width="70%" style="margin-top: 20px;">

			<br>

			<div class="titleRegister">

				Fórum Sistemas de Informação

			</div>

		</div> 

		<div class="col-md-8">

			<div class="col-md-12">

				<h2>Cadastre-se</h2>

			</div>

			<form method="post" action="func/registerUser.php" enctype="multipart/form-data">

				<div class="form-group col-md-6">

					<label>Nome:</label>

					<input type="text" class="form-control" placeholder="Nome" required id="name" autofocus name="name">

				</div>

				<div class="form-group col-md-6">

					<label>Sobrenome:</label>

					<input type="text" class="form-control" placeholder="Sobrenome" required id="lastName" name="lastname">

				</div>

				<div class="form-group col-md-5">

					<label>Email:</label>

					<input type="email" class="form-control" placeholder="Email" required id="email" name="email">

				</div>

				<div class="form-group col-md-4">

					<label>Data de Nascimento:</label>

					<input type="date" class="form-control" placeholder="Data de Nascimento:" required id="birthdate" name="birthdate">

				</div>

				<div class="form-group col-md-3">

					<label>Foto:</label>

					<input type="file" class="form-control" id="img" name="fileUpload" >

				</div>

				<div class="form-group col-md-7">

					<label>Nome de Usuário:</label>

					<input type="text" class="form-control" placeholder="Nome de Usuário" required id="username" maxlength="8" name="username">

				</div>

				<div class="form-group col-md-5">

				  <label for="type">Aluno/Professor :</label>

				  <select class="form-control" id="selecTeacher" name="type">

				    <option value="student">Aluno</option>

				    <option value="teacher">Professor</option>				  

				  </select>

				</div>

				<div class="form-group col-md-6">

					<label>Senha:</label>

					<input type="password" class="form-control" placeholder="Senha" required id="password" maxlength="15" name="password">

				</div>

				<div class="form-group col-md-6">

					<label>Confirma senha:</label>

					<input type="password" class="form-control" placeholder="Confirmar Senha" required id="confirmPassword" maxlength="15" name="">

				</div>

				<div class="form-group col-md-12">

					<label>Formação:</label>

					<textarea class="form-control" placeholder="Formação"  id="study" rows="5" name="study"></textarea>

				</div>

				<div class="col-md-12" id="message">

					<?php  

						if(isset($_GET['error']))

						{

							if ($_GET['error'] == 1) {

								echo '<div class=" alert alert-danger">Nome de usuário já existe, ou é inválido!</div>';

							}

						}

					?>

				</div>

				<div class="col-md-12" id="buttonRegister">	

					<button class="btn btn-primary btn-lg col-md-3 pull-right">Cadastrar</button>

				</div>

				

			</form>

		</div>

	</div>

</div>