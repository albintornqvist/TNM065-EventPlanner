<?php

	// koppa upp mot databasen med med användarnamn resp lösen rsslaboration

	mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
	    or die("Could not connect");

	// välj databasen

	mysql_select_db("emilrydkvist_se")
	    or die("Could not select database");


	// username and password sent from form 
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 

	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";
	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){

		// Register $myusername, $mypassword and redirect to file "login_success.php"
		session_register("myusername");
		session_register("mypassword");
		$_SESSION['login'] = "1";

		if(!session_is_registered(myusername)){
			header("location:mainLogin.php");
		}

		// header("location:loginSuccess.php");
		header("location: listEventsView.php");
	}
	else {
		$errorMessage = "Invalid Login";
		session_start();
		$_SESSION['login'] = "";
		echo "Wrong Username or Password";
	}
?>