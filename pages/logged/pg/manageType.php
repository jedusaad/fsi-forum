<form role="form" method="post" class="" action="func/registerType.php">

Nome de sistema: <input type="text" name="typeName"> <br/>
Nome de apresentação:<input type="text" name="description"> <br/>
<button role="button" type="submit" > Cadastrar </button>
</form>


<form action="func/deleteType.php" method="post">
	<div class="form-group">
		<label for="selecttype">
			Selecione:
		</label>
		<select name="selectApagar" id="selecttype" class="formcontrol"> 
	    	<?php
				$db = new dataBase();

				$db->conectToDb();

				$type = new type();
				
				$type->setDb($db->returnDb());
				
				$selectType = $type->selectActive();
				
				for ($i = 0; $i< mysqli_num_rows($selectType); $i++){
					$showSelectedType = mysqli_fetch_array($selectType,MYSQLI_ASSOC);
					echo "<option value=".$showSelectedType['ID']."> ".$showSelectedType['description']."  -  ".$showSelectedType['typeName']."</option>";
				}
				
				
			?>
	        
	    </select>
	    <button role="button" type="submit" > Excluir </button>
	</div>

</form>


