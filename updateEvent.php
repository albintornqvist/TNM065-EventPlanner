<?php
	$eventID = $_GET["id"];
	if(!$_GET["id"])
	{
		die("Ooops... Something went wrong!");
	}

	$title = htmlspecialchars($_POST['eventTitle']);
	$dateTime = htmlspecialchars($_POST['eventTime']);
	$location = htmlspecialchars($_POST['eventLocation']);
	$description = htmlspecialchars($_POST['eventDescription']);

	mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
	            or die("Could not connect");

	mysql_select_db("emilrydkvist_se")
	            or die("Could not select database");

	if($title && $dateTime && $location && $description)
	{
		$query = "UPDATE event SET title='$title', date='$dateTime', 
				location='$location', description='$description' WHERE id='$eventID'";
				
		if(mysql_query($sqlComment))
		{
			header('Location: eventView.php?id=$eventID');
			exit;
		}
		else
		{
			die("The query failed...");
		}

	}
	else{
		die("Your data could not be saved...");
	}




?>