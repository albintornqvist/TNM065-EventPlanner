<?php 
	session_start();
	session_destroy();

	header("Location: listEventsView.php");
	exit;
?>