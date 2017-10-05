<div class="full-width" id="header">

	<!-- This Header will be shown for MD / LG --> 
	<div class="full-width header hidden-xs hidden-sm">
		<div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10">
			<!-- This section is the logo-->
			<a href="/">
				<img src="assets/img/logotexto.png" width="400px">
			</a>

			<nav class="navbar navbar-right menu">
				<div class="container-fluid">
				    <ul class="nav navbar-nav">
						<li class="active"><a href="?pages=about" class="menuItem">Sobre</a></li>
						<li><a href="?pages=contactus" class="menuItem">Contato</a></li>
					    <li class="active"><a href="#" class="menuItem" data-toggle="modal" data-target="#myModal">Entrar</a></li>
				    </ul>
				</div>
			</nav>
		</div>
	</div>

	<!-- This Header will be shown for SM -->
	<div class="full-width  visible-sm">
		<div class="col-sm-12 headerSm">
			<div class="col-sm-10 col-sm-offset-1">
				<!-- This section is the logo-->
				<div class="col-sm-10 col-sm-offset-1 logoWrapper">
					<a href="/">
						<img src="assets/img/logo.png" style="width:100%;">
					</a>
				</div>
				<div class="col-sm-12 "><!-- nav nav-pills nav-justified -->
					<ul class="nav nav-pills nav-justified navPillsMenuSm">
						<li class=""><a href="?pages=about" class="menuItemSm">Sobre</a></li>
						<li><a href="?pages=contactus" class="menuItemSm">Contato</a></li>
					    <li class=""><a href="#" class="menuItemSm" data-toggle="modal" data-target="#myModal">Entrar</a></li>
				    </ul>
				</div>
			</div>
		</div>
	</div>

	<!-- This Header will be shown for XS -->
	<div class="full-width  visible-xs">
		<div class="col-xs-12 headerXs">
			<div class="col-xs-10 col-xs-offset-1">
				<!-- This section is the logo-->
				<div class="col-xs-12 logoWrapper">
					<a href="/">
						<img src="assets/img/logo.png" style="width:100%;">
					</a>
				</div>
				<div class="col-xs-12 ">
					<ul class="nav nav-pills nav-justified nav-stacked navPillsMenuSmXs">
						<li class=""><a href="?pages=about" class="menuItemXs">Sobre</a></li>
						<li><a href="?pages=contactus" class="menuItemXs">Contato</a></li>
					    <li class=""><a href="#" class="menuItemXs" data-toggle="modal" data-target="#myModal">Entrar</a></li>
				    </ul>
				</div>
			</div>
		</div>
	</div>

</div>
	
	<!-- This PHP Section will work only if the URL has a $_GET  for var error set to 1 -->
	<!-- Making the Modal from login trigger with a message for wrog user/password -->
	<?php 
		if(isset($_GET['error'])){
			if($_GET['error'] == 1){
				echo '
					<script type="text/javascript">
					$(document).ready(function(){
						setTimeout(function(){
							$("#myModal").modal();
						}, 1000);
					});	
						
					</script>

					';
			}
		}

	?>







				<!-- This section bellow represents the modal for the login  -->

				<!-- Modal -->
				<div id="myModal" class="modal fade modalHeader" role="dialog">
				  <div class="modal-dialog ">
				    <!-- Modal content-->
				    <div class="modal-content">
				    <!-- Modal Header -->
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Login</h4>
				      </div><!-- Close Modal Header -->
				      <!-- Modal Body -->
				      <div class="modal-body">
				      	<div class="container-fluid">
					      	<form method="post" action="func/logIn.php" >
					      		<div class="form-group full-width">
					      			<?php 
					      				if(isset($_GET['error'])){
					      					if($_GET['error'] == 1){
					      						echo '<div class="alert alert-danger">
					      								<div ="pull-center">Usuário e/ou senha, não conferem!</div>
					      							  </div>';
					      					}
					      				}
					      			?>
						      		<div class="input-group">
						      			<span class="input-group-addon">
						      				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						      			</span>
							        	<input type="text" placeholder="Usuário" class="form-control modalInput" name="username"> 
							        </div>
							    </div>
							    <div class="form-group full-width">
							        <div class="input-group">
							        	<span class="input-group-addon">
						      				<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
						      			</span>
						        		<input type="password" placeholder="Senha" class="form-control modalInput" name="password">
						        	</div>
						        </div>
						        <button class="btn btn-primary btn-block">Entrar</button>
						    </form>
						    <small class="linkRegister"><span><a href="?pages=register">Não é Cadastrado? Cadastre-se agora!</a></span></small>
						</div>
			      
				      </div><!-- Close modal body -->
				    </div><!-- Close modal content -->

				  </div><!-- Close modal dialog-->
				</div><!-- Close modal -->


<?php  
	if (isset($_GET['error'])) {
		if($_GET['error'] != 1){

		echo '
			<script type="text/javascript">
			$(document).ready(function(){
				setTimeout(function(){
					$("#notVerified").modal();
				}, 700);
			});			
			</script>
			';
		}
		echo '
			<div id="notVerified" class="modal fade" role="dialog">
				<div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Aviso !</h4>
				      </div>
				      <div class="modal-body">';
				      switch ($_GET['error']) {
				      	case 2:
				      		echo '
				      		<div class="alert alert-danger">
					        	<strong>Conta ainda não verificada!</strong> Enviamos no email cadastrado um link de verificação.
					        </div>';
				      		break;
				      	
				      	case 3:
				      		echo '
				      		<div class="alert alert-danger">
					        	<strong>Conta ainda não aprovada!</strong> Aguarde aprovação de nossos admnistradores para se tornar professor.
					        </div>';
				      		break;
				      }
				        
				        echo '
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
				      </div>
				    </div>

				  </div>
				</div>';
	}
?>
