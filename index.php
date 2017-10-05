<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	require('func/class.php');
	require('func/functions.php');
	include('setup/meta.php');

	if(isset($_SESSION['username'])){
		include('pages/logged/loggedIndex.php');
	}else{
		include('pages/notLogged/notLoggedIndex.php');
	}
	
	include('setup/close.php');

?>