<script type="text/javascript">
	$(document).ready(function(){
		$("#logOut").click(function(){
			$.post("func/logOut.php",
			{
				logOut: "true"
			},
			function(data,status){
				if (data == 0) {
					window.location.assign("http://forum.jedusaad.com")
				}
			});
		});
	});
</script>
<div class="full-width hidden-xs" id="headerLogged">
	<div class="container-fluid">
		<a href="/">	
			<img src="assets/img/logotextohorizontal.png" width="500" style="margin-top: 7px">
		</a>

		<div class="navbar navbar-right">
			<div class="container-fluid">
				<ul class="nav navbar-nav menu">
			<?php 
				$db = new dataBase();

				$db->conectToDb();

				$person = new person();
				
				$person->setConnectionDb($db->returnDb());
				
				$selectPerson = $person->selectmoderateTeacher();
				
				$numPerson = mysqli_num_rows($selectPerson); 

				if($_SESSION['type'] == 'root'){

					echo '<li>
							<a href="/?pages=moderateTeacher" class="menuItem">
								';
					if($numPerson>0){
						echo '<div class="sLabel">'.$numPerson.'</div>';
					}
					
					echo '<i class="glyphicon glyphicon-equalizer" style="margin-left:-5px;"></i>
						</a>
						</li>';
				}
			?>				

					<li class="active"><a href="" class="menuItem">Olá, <?php echo $_SESSION['name'] ?></a></li>
					<li><a href="" class="menuItem" id="logOut"><span class="glyphicon glyphicon-off  "></span></a></li>					
				</ul>
			</div>	
		</div>
	</div>
</div>

<div class="col-xs-12 hidden-sm hidden-md hidden-lg visible-xs" id="headerLoggedXs">
	<div class="full-width">
		<div class="navbar navbar-right navBarXs">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
			<?php 
				$db = new dataBase();

				$db->conectToDb();

				$person = new person();
				
				$person->setConnectionDb($db->returnDb());
				
				$selectPerson = $person->selectmoderateTeacher();
				
				$numPerson = mysqli_num_rows($selectPerson); 

				if($_SESSION['type'] == 'root'){

					echo '<li>
							<a href="/?pages=moderateTeacher" class="menuItem">
								';
					if($numPerson>0){
						echo '<div class="sLabel">'.$numPerson.'</div>';
					}
					
					echo '<i class="glyphicon glyphicon-equalizer" style="margin-left:-5px;"></i>
						</a>
						</li>';
				}
			?>				

					<li class="active"><a href="" class="menuItem labelNavBarXs">Olá, <?php echo $_SESSION['name'] ?></a></li>
					<li><a href="" class="menuItem btnLogOutXs" id="logOut"><span class="glyphicon glyphicon-off  "></span></a></li>					
				</ul>
			</div>	
		</div>
	</div>

	<div class="full-width">
		<a href="/">	
			<img src="assets/img/logo.png" width="70%">
		</a>
	</div>
	
</div>