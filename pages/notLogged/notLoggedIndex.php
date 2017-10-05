<?php  

include('setup/header.php');

	if(isset($_GET['pages']))
	{
		switch($_GET['pages'])
		{				
			case 'about':
				include('pages/notLogged/pg/about.php');
				break;
				
			case 'contactus':
				include ('pages/notLogged/pg/contatcUs.php');
				break;

			case 'register':
				include('pages/notLogged/pg/register.php');
				break;

			case 'confirmRegister':
				include('pages/notLogged/pg/confirmRegister.php');
				break;
				
			default: 
				include('pages/notLogged/pg/about.php');
				break;
				
		}
	}else{
		include('pages/notLogged/pg/about.php');
	}

?>