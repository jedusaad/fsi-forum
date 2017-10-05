<div class="full-width" id="manageProfiles">

	<div class="col-md-12">

		<div class="title">

			<h1> Professores </h1>
<form action="func/updateTypeStudent.php" method="post">

		
	    	<?php
			echo "<table>";
				$db = new dataBase();

				$db->conectToDb();

				$teacher = new teacher();
				
				$teacher->setDb($db->returnDb());
				
				$setMonitor = $teacher->setMonitor($typeName);
				$selectType = $teacher->selectType($typeName);
				
				
				
				echo "<tr><td>".$selectType.":</td></tr>";
				while($resultado = mysql_fetch_array($selectType)){
				echo "<tr><td>".$resultado['Nome']."</td><td>".$resultado['Cidade']."</td></tr>";
				}
				echo "</table>";
				
				
			?>
	        
	    </table>
	    <button role="button" type="submit" > Alterar </button>
	</div>

</form>
		</div>

	</div>

</div>




