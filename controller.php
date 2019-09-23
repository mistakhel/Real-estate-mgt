<?php
	session_start();
	require('../connect.php');

	// predefined sessions admin, agent and user...	
	if (isset($_SESSION['user'])) {
		header("location: ../");
	} else if(!isset($_SESSION['admin']) AND !isset($_SESSION['user']) AND !isset($_SESSION['user'])) {
		header("location: ../login.php");
	}

?>