<?php
//Prefix
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting (E_ALL);
ob_start();
//

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != "")) {

		// header ("Location: mainLogin.php");
		$loginMessage = '';
		$logStatus = 'Log in';
		$logLink = 'mainLogin.php';
		$loggedIn = false;

	}
	else{
		$ses = $_SESSION['login'];
		// $user = $_SESSION['user'];
		$loginMessage = 'Logged in as ' . $_SESSION['user'];
		$logStatus = 'Log out';
		$logLink = 'logout.php';
		$loggedIn = true;
	}
?>


<!DOCTYPE party SYSTEM "http://www.albintornqvist.se/TNM065/project/changeevent.dtd">


<?php

	// ob_start();

	$link = mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
	            or die("Could not connect");

	mysql_select_db("emilrydkvist_se")
	            or die("Could not select database");

	if(!$_GET["id"])
	{
		die("Ooops... Something went wrong!");
	}


	$eventID = $_GET["id"];

	$query = "SELECT * FROM event WHERE id = $eventID";
	$result = mysql_query($query) or die("Query failed");
	$object = mysql_fetch_object($result);

	$date = new datetime($object->date);

	//Handling comment info from new entry
	$_SESSION["eventID"] = $eventID;
?>
<page>

	<user><?php print utf8_encode($loginMessage); ?></user>
	<logLink><?php print utf8_encode($logLink); ?></logLink>
	<logStatus><?php print utf8_encode($logStatus); ?></logStatus>

	<event>

		<title><?php print utf8_encode($object->title); ?></title>

		<description><?php print utf8_encode($object->description); ?></description>

		<datetime><?php print utf8_encode(date_format($date, 'Y-m-d H:m')); ?></datetime>
		<location><?php print utf8_encode($object->location); ?></location>
		
	<link><?php 
				$resString = "updateEvent.php?id=" . $_GET["id"];
				print utf8_encode($resString); ?></link>

	</event>

</page>

<?php 
	//put XML content in a string
	$xmlstr=ob_get_contents();
	ob_end_clean();
	
	// Load the XML string into a DOMDocument
	$xml = new DOMDocument;
	$xml->loadXML($xmlstr);
	
	// Make a DOMDocument for the XSL stylesheet
	$xsl = new DOMDocument;
	

	header("Content-type:text/html");
	$xsl->load('editEvent.xsl');
	
	// Make the transformation and print the result
	$proc = new XSLTProcessor;
	$proc->importStyleSheet($xsl); // attach the xsl rules
	echo utf8_decode($proc->transformToXML($xml));
?>

