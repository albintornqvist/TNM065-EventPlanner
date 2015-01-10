<?php

	// koppa upp mot databasen med med användarnamn resp lösen rsslaboration

	$link = mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
    or die("Could not connect");

	// välj databasen

	mysql_select_db("emilrydkvist_se")
    or die("Could not select database");
    
	$eventTitle = $_GET["eventTitle"];
	$eventTime = $_GET["eventTime"];
	$eventLocation = $_GET["eventLocation"];
	$eventDescription = $_GET["eventDescription"];

	if(empty($eventTitle) || empty($eventTime) || empty($eventLocation) || empty($eventDescription))
	{
		header("Location: listEventsView.php");
		exit;
	}
	else
	{
		$insertQuery = "INSERT INTO event (title, description, date, location) VALUES
		('$eventTitle', '$eventDescription', '$eventTime', '$eventLocation')";

		$result = mysql_query($insertQuery);

		if($result){
			$id = mysql_insert_id();
			header("Location: eventView.php?id=$id");
			exit;			
		}
		else{
			echo "<br>failed";
		}
	}			
?>