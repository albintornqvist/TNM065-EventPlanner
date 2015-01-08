<?php
//Prefix
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting (E_ALL);
ob_start();
//
?>


<!DOCTYPE party SYSTEM "http://www.albintornqvist.se/TNM065/project/event.dtd">


<?php
	$link = mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
	            or die("Could not connect");

	mysql_select_db("emilrydkvist_se")
	            or die("Could not select database");

	$query = "SELECT * FROM event WHERE id = 1";
	$result = mysql_query($query) or die("Query failed");
	$object = mysql_fetch_object($result);

	$adminQ = "SELECT * FROM admins WHERE eventid = 1";
	$adminR = mysql_query($adminQ);

	$commentQ = "SELECT * FROM comment WHERE eventid = 1";
	$commentR = mysql_query($commentQ);

?>


<event>

	<title><?php print utf8_encode($object->title); ?></title>

	<description><?php print utf8_encode($object->description); ?></description>

	<datetime><?php print utf8_encode($object->date); ?></datetime>
	<location><?php print utf8_encode($object->location); ?></location>
	<creator><?php print utf8_encode($object->creator); ?></creator>

	<admins>

		<?php
			while($line = mysql_fetch_object($adminR))
			{
				$resString = "<admin> $line->username </admin>";
				print utf8_encode($resString);
			}
		?>

	</admins>

	<attendees></attendees>

	<?php 
		while($line2 = mysql_fetch_object($commentR))
		{
			$resString2 = "<comment id='$line2->commentid'> <name> $line2->username </name> <datetime> $line2->date </datetime> <text> $line2->text </text> </comment>";
			print utf8_encode($resString2);
		}
	?>

</event>


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
	$xsl->load('eventView.xsl');
	
	// Make the transformation and print the result
	$proc = new XSLTProcessor;
	$proc->importStyleSheet($xsl); // attach the xsl rules
	echo utf8_decode($proc->transformToXML($xml));
?>




