<?php
//Prefix
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting (E_ALL);
ob_start();
//

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != "" )) {

		header ("Location: listEventsView.php");
		exit;
	}
	else{
		$username = $_SESSION['user'];
	}

$eventID = '';

if(isset($_GET['id'])){
	$eventID = $_GET['id'];
}

// koppa upp mot databasen med med användarnamn resp lösen rsslaboration

	mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
    or die("Could not connect");

	// välj databasen

	mysql_select_db("emilrydkvist_se")
    or die("Could not select database");

    if(isset($_GET['action']) && $_GET['action'] == 0)
    {
    	//Attend
    	$attendQuery = "INSERT INTO attends (eventid, username) VALUES ('$eventID', '$username')";
    	$result = mysql_query($attendQuery);

    	if($result){
			header("Location: eventView.php?id=$eventID");
			exit;
		}
		else{
			echo "tjena";
		}
    }
    else if(isset($_GET['action']) && $_GET['action'] == 2)
    {
    	//Cancel
    	$cancelQuery = "DELETE FROM attends WHERE eventid='$eventID' AND username='$username'";
    	$result = mysql_query($cancelQuery);

    	if($result){
			header("Location: eventView.php?id=$eventID");
			exit;
		}
		else{
			echo "tjena";
		}


    }