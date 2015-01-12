<?php
	
	if($_POST['comment'])
	{
		session_start();

		if (!(isset($_SESSION['login']) && $_SESSION['login'] != "")) {
			header("Location: listEventsView.php");
			exit;
			
		}
		else
		{
			$username = $_SESSION['user'];
		}
		
		$userComment = htmlspecialchars($_POST['comment']);
		$eventID = $_SESSION["eventID"];

		$link = mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
	            or die("Could not connect");

		mysql_select_db("emilrydkvist_se")
	            or die("Could not select database");

	    date_default_timezone_set("Europe/Stockholm");
	    $dateNow = date("Y-m-d H:i:s");

		$sqlComment = "INSERT INTO comment (text, username, eventid, date) VALUES ('$userComment', '$username', '$eventID', '$dateNow')";
		
		if(mysql_query($sqlComment))
		{
			header("Location: eventView.php?id=$eventID");
			exit;
		}
		else
			echo "Query did not succeed...";

	}
	else
		echo "Your comment could not be saved...";
	

?>