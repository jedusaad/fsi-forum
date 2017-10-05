</a>
<div class="col-md-2 col-sm-3 hidden-xs" id="sideBar">

	<div class="full-width" >

	<?php  
		
		echo '<div class="links col-md-12 col-sm-12">
				<a href="/?pages=profile&id='.$_SESSION['ID'].'">
				<img class="col-md-offset-1 col-md-10 col-xs-10 col-xs-offset-1 imgDefault thumbnail" src="'.$_SESSION['img'].'" >
				</a>
		</div>';


	?>

		<div class="straightLine"></div>

		<?php 

			echo $_SESSION['name']."<br>"; 
	
			$db = new dataBase();

			$db->conectToDb();



			$type = new type(); 

			$type->setDb($db->returnDb());

			$type->getTypeByName($_SESSION['type']);

			$status = $type->getDescription();



			echo "Nível de Acesso: <br> ".$status;



			$db->closeDb();





			echo '<div class="straightLine"></div>

					<div class="links col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-2">';

					if($_SESSION['type'] == 'monitor' || $_SESSION['type'] == 'student' ){

						echo '

						<a href="/?pages=user"><div class="wrapperLinks"><span class="glyphicon glyphicon-user"></span> Perfil</div></a>

						<a href="/?pages=teacher"><div class="wrapperLinks" ><span class="glyphicon glyphicon-education"></span> Professores</div></a>

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>

						';

					}elseif($_SESSION['type'] == 'teacher'){

						echo '

											

						<div class="wrapperLinks" data-toggle="collapse" data-target="#profile">

							<span class="glyphicon glyphicon-user"></span> Perfil

						</div>

						<div id="profile" class="collapse">

							<div class="submenu">

								<a href=""><div class="wrapperLinks"><span class="glyphicon glyphicon-wrench"></span> Moderar Perfis</div></a>

								<a href="/?pages=user"><div class="wrapperLinks"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Listar Perfis</div></a>

							</div>

						</div>



						<a href="/?pages=teacher"><div class="wrapperLinks"><span class="glyphicon glyphicon-education"></span> Professores</div></a>
		

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>

						';



					}elseif($_SESSION['type'] == 'root'){

						echo '

						


						<div class="wrapperLinks" data-toggle="collapse" data-target="#profile">

							<span class="glyphicon glyphicon-user"></span> Perfil

						</div>

						<div id="profile" class="collapse">

							<div class="submenu">

								<a href="?pages=moderateUser"><div class="wrapperLinks"><span class="glyphicon glyphicon-wrench"></span> Moderar Perfis</div></a>

								<a href="/?pages=user"><div class="wrapperLinks"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Listar Perfis</div></a>

							</div>

						</div>



						

						<div class="wrapperLinks" data-toggle="collapse" data-target="#teacher">

							<span class="glyphicon glyphicon-education"></span> Professores

						</div>

						<div id="teacher" class="collapse">

							<div class="submenu">

								<a href="?pages=moderateTeacher"><div class="wrapperLinks"><span class="glyphicon glyphicon-wrench"></span> Moderar Professores</div></a>

								<a href="?pages=teacher"><div class="wrapperLinks"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Listar Perfis</div></a>

							</div>

						</div>

						

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>
						';



					}else{
						echo '

						<a href=""><div class="wrapperLinks"><span class="glyphicon glyphicon-user"></span> Perfil</div></a>

						<a href=""><div class="wrapperLinks" ><span class="glyphicon glyphicon-education"></span> Professores</div></a>

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>

						';
					}

			

			echo'	</div>';

		?>

	</div>

</div>

<div class="full-width hidden-lg hidden-md hidden-sm" id="sideBarXs">
	<div class="col-xs-12 sideBarXs">
		<div class="col-xs-4">
			<?php  

		echo '<div class="links col-xs-12">
				<a href="/?pages=profile&id='.$_SESSION['ID'].'">
				<img class="col-xs-12 imgDefault thumbnail" src="'.$_SESSION['img'].'" >
				</a>
		</div>';


	?>
		</div>
		<div class="col-xs-8">
			<?php 

			echo $_SESSION['name']."<br>"; 
	
			$db = new dataBase();

			$db->conectToDb();



			$type = new type(); 

			$type->setDb($db->returnDb());

			$type->getTypeByName($_SESSION['type']);

			$status = $type->getDescription();



			echo "Nível de Acesso: <br> ".$status;



			$db->closeDb();





			echo '<div class="straightLine"></div>

					<div class="links col-xs-12">';

					if($_SESSION['type'] == 'monitor' || $_SESSION['type'] == 'student' ){

						echo '

						<a href="/?pages=user"><div class="wrapperLinks"><span class="glyphicon glyphicon-user"></span> Perfil</div></a>

						<a href="/?pages=teacher"><div class="wrapperLinks" ><span class="glyphicon glyphicon-education"></span> Professores</div></a>

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>

						';

					}elseif($_SESSION['type'] == 'teacher'){

						echo '

											

						<div class="wrapperLinks" data-toggle="collapse" data-target="#profile">

							<span class="glyphicon glyphicon-user"></span> Perfil

						</div>

						<div id="profile" class="collapse">

							<div class="submenu">

								<a href="/?pages=moderateUser"><div class="wrapperLinks"><span class="glyphicon glyphicon-wrench"></span> Moderar Perfis</div></a>

								<a href="/?pages=user"><div class="wrapperLinks"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Listar Perfis</div></a>

							</div>

						</div>



						<a href="/?pages=teacher"><div class="wrapperLinks"><span class="glyphicon glyphicon-education"></span> Professores</div></a>
		

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>

						';



					}elseif($_SESSION['type'] == 'root'){

						echo '

						


						<div class="wrapperLinks" data-toggle="collapse" data-target="#profile">

							<span class="glyphicon glyphicon-user"></span> Perfil

						</div>

						<div id="profile" class="collapse">

							<div class="submenu">

								<a href="?pages=moderateUser"><div class="wrapperLinks"><span class="glyphicon glyphicon-wrench"></span> Moderar Perfis</div></a>

								<a href="/?pages=user"><div class="wrapperLinks"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Listar Perfis</div></a>

							</div>

						</div>



						

						<div class="wrapperLinks" data-toggle="collapse" data-target="#teacher">

							<span class="glyphicon glyphicon-education"></span> Professores

						</div>

						<div id="teacher" class="collapse">

							<div class="submenu">

								<a href="?pages=moderateTeacher"><div class="wrapperLinks"><span class="glyphicon glyphicon-wrench"></span> Moderar Professores</div></a>

								<a href="?pages=teacher"><div class="wrapperLinks"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Listar Perfis</div></a>

							</div>

						</div>

						

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>
						';



					}else{
						echo '

						<a href=""><div class="wrapperLinks"><span class="glyphicon glyphicon-user"></span> Perfil</div></a>

						<a href=""><div class="wrapperLinks" ><span class="glyphicon glyphicon-education"></span> Professores</div></a>

						<a href="/?pages=dicipline"><div class="wrapperLinks"><span class="glyphicon glyphicon-th-list"></span> Disciplinas</div></a>

						';
					}

			

			echo'	</div>';

		?>
		</div>
	</div>	
</div>