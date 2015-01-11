<?php
	
	if(!$_GET["id"])
	{
		die("Could not get id...");
	}
	$eventID = $_GET["id"];

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
				location='$location', description='$description' WHERE id=$eventID";

		if(mysql_query($query))
		{
			$locString = "Location: eventView.php?id=1";
			header($locString);
			exit;
		}
		else
		{
			echo "The query failed...";
		}

	}
	else{
		die("Your data could not be saved...");
	}




?>