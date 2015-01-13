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
		$loggedIn = -1;
		$user = -1;
		$currentUser = '';

	}
	else{
		$ses = $_SESSION['login'];
		// $user = $_SESSION['user'];
		$loginMessage = 'Logged in as ' . $_SESSION['user'];
		$logStatus = 'Log out';
		$logLink = 'logout.php';
		$loggedIn = 1;
		$user = 0;
		$currentUser = $_SESSION['user'];
	}
?>


<!DOCTYPE party SYSTEM "http://www.albintornqvist.se/TNM065/project/event.dtd">


<?php
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

	$commentQ = "SELECT * FROM comment WHERE eventid = $eventID ORDER BY date DESC";
	$commentR = mysql_query($commentQ);

	$attendQ = "SELECT * FROM attends WHERE eventid = $eventID";
	$attendR = mysql_query($attendQ);
	$nrOfAttendees = mysql_num_rows($attendR);

	$date = new datetime($object->date);

	$creator = $object->creator;
	if(isset($_SESSION['user']) && $creator == $_SESSION['user'])
	{
		$user = 1;
	}


	while($line1 = mysql_fetch_object($attendR))
	{
		if(isset($_SESSION['user']) && $_SESSION['user'] == $line1->username)
		{
			$user = 2;
		}		

	}
	
	//Handling comment info from new entry
	$_SESSION["eventID"] = $eventID;
?>


<event>

	<user><?php print utf8_encode($loginMessage); ?></user>
	<logLink><?php print utf8_encode($logLink); ?></logLink>
	<logStatus><?php print utf8_encode($logStatus); ?></logStatus>

	<user><?php print utf8_encode($user); ?></user>

	<title><?php print utf8_encode($object->title); ?></title>

	<description><?php print utf8_encode($object->description); ?></description>

	<datetime><?php print utf8_encode(date_format($date, 'Y-m-d H:m')); ?></datetime>
	<location><?php print utf8_encode($object->location); ?></location>
	<creator><?php print utf8_encode($object->creator); ?></creator>

	<attendees><?php print utf8_encode($nrOfAttendees); ?></attendees>

	<link><?php print utf8_encode("editEvent.php?id=$eventID"); ?></link>

	<attendLink><?php print utf8_encode("handleAttend.php?id=$eventID&amp;action=$user"); ?></attendLink>
	
	<currentUser><?php print utf8_encode($currentUser); ?></currentUser>

	<?php 
		while($line2 = mysql_fetch_object($commentR))
		{
			$commentDate = new datetime($line2->date);
			$commentDate = date_format($commentDate, 'Y-m-d G:i');
			$resString2 = "<comment id='$line2->commentid'> <name> $line2->username </name> <datetime> $commentDate </datetime> <text> $line2->text </text> </comment>";
			print utf8_encode($resString2);
		}
	?>

</event>


<?php 


	// put XML content in a string
	$xmlstr=ob_get_contents();
	ob_end_clean();
	
	// Load the XML string into a DOMDocument
	$xml = new DOMDocument;
	$xml->loadXML($xmlstr);
	
	// Make a DOMDocument for the XSL stylesheet
	$xsl = new DOMDocument;
	

	header("Content-type:text/html");
	

	if(isset($_GET['mobile']))     
	{     
		$xsl->load('mobile/eventViewM.xsl'); 
	}     
	else {            
	  	$xsl->load('eventView.xsl');  
	}    
	
	// Make the transformation and print the result
	$proc = new XSLTProcessor;
	$proc->importStyleSheet($xsl); // attach the xsl rules
	echo utf8_decode($proc->transformToXML($xml));
?>
