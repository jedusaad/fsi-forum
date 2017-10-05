<?php 
	include("pages/logged/setup/header.php");
?>
	<div class="full-width">
		<div class="full-width">
			<?php 
				include("pages/logged/setup/sideMenu.php");
			?>
			<div class="col-md-10 col-sm-9" id="bodyLogged">
				<?php  
					if(isset($_GET['pages'])){
						switch ($_GET['pages']) {
							case 'dicipline':
								include('pages/logged/pg/discipline.php');
								break;
							
							case 'onDiscipline':
								include('pages/logged/pg/onDiscipline.php');
								break;
							
							case 'teacher':
								include('pages/logged/pg/teacher.php');
								break;
							
							case 'home':
								include('pages/logged/pg/home.php');
								break;

							case 'manageType':
								include('pages/logged/pg/manageType.php');
								break;
							
							case 'answer':
								include('pages/logged/pg/answer.php');
								break;
							
							case 'user':
								include('pages/logged/pg/user.php');
								break;
								
							case 'moderateTeacher':
								include('pages/logged/pg/moderateTeacher.php');
								break;
								
							case 'moderateUser':
								include('pages/logged/pg/moderateUser.php');
								break;
							
							case 'profile':
								include('pages/logged/pg/profile.php');
								break;
							case 'changeProfileSettings':
								include('pages/logged/pg/changeProfileSettings.php');
								break;

							default:
								include('pages/logged/pg/home.php');
								break;
						} 
					}else{
						include('pages/logged/pg/home.php');
					}
				?> 
			</div>
		</div>
	</div>

