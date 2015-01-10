<?php
//Prefix
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting (E_ALL);
ob_start();
//
?>

<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != "")) {

	header ("Location: mainLogin.php");

}
	$ses = $_SESSION['login'];

?>


<?php  

	// koppa upp mot databasen med med användarnamn resp lösen rsslaboration

	$link = mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
	    or die("Could not connect");

	// välj databasen

	mysql_select_db("emilrydkvist_se")
	    or die("Could not select database");

	$query = "SELECT * FROM event";

	$result = mysql_query($query)
		or die("Query failed");

	$returnstring ="";
	print utf8_encode("<listevents>");
	while($line = mysql_fetch_object($result))
	{

		$title = $line->title;

		$desc = $line->description;

		$date = $line->date;

		$location = $line->location;

		$eventId = $line->id;

		$idQuery = "SELECT * FROM attends WHERE eventid = $eventId";
		$idResult = mysql_query($idQuery);
		$nrOfAttendees = mysql_num_rows($idResult);

		$commentQuery = "SELECT * FROM comment WHERE eventid = $eventId";
		$commentResult = mysql_query($commentQuery);
		$nrOfComments = mysql_num_rows($commentResult);

		$returnstring = $returnstring . "<listevents><title>$title</title></listevents>";

		$returnTitle = "<title>$title</title>";
		$returnDesc = "<shortDescription>$desc</shortDescription>";
		$returnDate = "<datetime>$date</datetime>";
		$returnLocation = "<location>$location</location>";
		$returnNrOfAttendees = "<nrOfAttendees>$nrOfAttendees</nrOfAttendees>";
		$returnNrOfComments = "<nrOfComments>$nrOfComments</nrOfComments>";
		$returnLink ="<link>eventView.php?id=$eventId</link>";

		// $returnstring = $returnstring . "<nrOfAttendees>$nrOfAttendees</nrOfAttendees></listevents>";

		print utf8_encode("<event>");
		print utf8_encode($returnTitle);
		print utf8_encode($returnDesc);
		print utf8_encode($returnDate);
		print utf8_encode($returnLocation);
		print utf8_encode($returnNrOfAttendees);
		print utf8_encode($returnNrOfComments);
		print utf8_encode($returnLink);
		print utf8_encode("</event>");

	}
	print utf8_encode("</listevents>");
	// echo "hejhej";
	// echo $returnstring;
	// print utf8_encode($returnstring);
?>

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
 $xsl->load('listEventsView.xsl');
 
 // Make the transformation and print the result
 $proc = new XSLTProcessor;
 $proc->importStyleSheet($xsl); // attach the xsl rules
 echo utf8_decode($proc->transformToXML($xml));
?>