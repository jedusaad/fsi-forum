<div class="full-width" id="user">

	<div class="col-md-12" >

		<div class="title">

			<h1> Professor </h1>

		</div>

	</div>

</div>

<?php
				$db = new dataBase();

				$db->conectToDb();

				$person = new person();
				
				$person->setConnectionDb($db->returnDb());
				
				$selectPerson = $person->selectTeacher();
				
				$numPerson = mysqli_num_rows($selectPerson);
				
				for ($i = 0; $i< $numPerson; $i++){
					//echo $i;
					$showSelectedPerson = mysqli_fetch_array($selectPerson,MYSQLI_ASSOC);
					echo '<div class="full-width hidden-xs hidden-sm" id="teacher">
							<div class="col-md-12 teacherPerson">
								<a href="/?pages=profile&id='.$showSelectedPerson['ID'].'">
								<div class="col-md-2 teachercss colorDefault">
										<img src="'.$showSelectedPerson['img'].'" border="0"  height="100" width="100">
								</div>	
								<div class="col-md-10 teachercss colorDefault">	
										
									<h4>
										 '.$showSelectedPerson['username'].'  - '.$showSelectedPerson['name'].' '.$showSelectedPerson['lastname'].' - '.$showSelectedPerson['email'];
										 echo '
									</h4>	 

								</div>	
								</a>
							</div>	
							<div class="col-md-12 sizeStraightLine">
								<div class="straightLine"></div>
							</div>						  
						</div>';


					echo '<div class="full-width hidden-xs hidden-md hidden-lg" id="teacher">
							<div class="col-sm-12 teacherPerson">
								<a href="/?pages=profile&id='.$showSelectedPerson['ID'].'">
								<div class="col-sm-3 teachercss colorDefault imgSmListTeacher">
									<img src="'.$showSelectedPerson['img'].'" height="90" width="90">
								</div>
								<div class="col-sm-9 teachercss colorDefault">
							   		
									<h4>
							   			'.$showSelectedPerson['username'].'  - '.$showSelectedPerson['name'].' '.$showSelectedPerson['lastname'].' - '.$showSelectedPerson['email'];
										 echo '
									</h4>	 

								</div>
								</a>
							</div>
							<div class="col-sm-12 sizeStraightLine">
								<div class="straightLine"></div>
							</div>
						</div>';
				}
				
				
			?>

<style type="text/css">

.teachercss:hover {
	text-decoration: underline; 
	color:#212121;

}
a.classe1:active {
	text-decoration: none
	}
	</style>