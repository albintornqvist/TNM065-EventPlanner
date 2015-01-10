<?php

	// koppa upp mot databasen med med användarnamn resp lösen rsslaboration

	mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
    or die("Could not connect");

	// välj databasen

	mysql_select_db("emilrydkvist_se")
    or die("Could not select database");
    
    $username = $_GET["username"];
    $name = $_GET["name"];
    $password = $_GET["password"];

    if(empty($username) || empty($name) || empty($password))
	{
		header("Location: listEventsView.php");
		exit;
	}
	else
	{
		$userQuery = "INSERT INTO user (username, name, password) VALUES ('$username', '$name', '$password')";

		$result = mysql_query($userQuery);

		if($result){
			header("Location: listEventsView.php");
			exit;
		}
		else{
			echo "failed";
		}

	}

    ?>