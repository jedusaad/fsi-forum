<div class="full-width hidden-xs" id="home">

	<div class="col-lg-12">

		<div class="col-lg-9">

			<h3> Notícias: </h3>



			<h4>

			
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc arcu, lobortis sit amet rhoncus vitae, mollis non leo. Phasellus sed orci sagittis, tristique risus porttitor, feugiat odio. Aliquam erat volutpat. Quisque pharetra laoreet velit. Integer lobortis justo a tincidunt tincidunt. Suspendisse sagittis sapien vitae sem aliquet luctus. Mauris scelerisque bibendum porttitor. Cras volutpat, lacus non cursus aliquam, tortor quam commodo libero, sit amet sagittis libero urna quis tellus. Nulla facilisi. Vivamus maximus porta erat vitae porta. Morbi euismod magna nec hendrerit pharetra. Nullam velit orci, maximus et vehicula sed, pellentesque sit amet ante. Curabitur iaculis interdum lorem, non elementum nulla interdum ut. Fusce malesuada libero finibus, maximus turpis id, dictum orci.

			</h4>



		</div>

		<div class="col-lg-3 col-md-12 col-sm-12 rightPanel">

			<div class="col-lg-12 col-md-12 col-sm-12 wrapperTopics">

				<h3 class="titlePanel"> Últimos Tópicos: </h3>

				<?php 



					$db = new database();



					$db->conectToDb();



					$printTopics = new topic();



					$printTopics->setDb($db->returnDb());



					$topicFetch = $printTopics->getActiveNewerTen();



					$discipline = new discipline();



					$discipline->setDb($db->returnDb());



					if(mysqli_num_rows($topicFetch) < 10){

						$max = mysqli_num_rows($topicFetch) ;

					}else{

						$max = 10;

					}

					

					for ($i=0; $i < $max ; $i++) { 

						$topicDone = mysqli_fetch_array($topicFetch); 

						

						$discipline->getDiciplineById($topicDone['discipline']);



						$disciplineInitials = $discipline->GETinitials();



						//?pages=answer&disc=1&topic=42&subtopic=43

						echo 

							'<a href="/?pages=answer&disc='.$topicDone['discipline'].'&topic='.$topicDone['father'].'&subtopic='.$topicDone['ID'].'">	

								<div class="col-lg-12 col-md-12 col-sm-12 itemRightPanel">

									<h4>'.$topicDone['title'].' - '.$disciplineInitials.'</h4>

								</div>

							<a>';	

					}





				?>

			</div>	

		</div>			

	

	</div>

</div>

 