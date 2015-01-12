<?xml version="1.0" encoding="utf-8"?>

<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

   <xsl:output
   	doctype-system="listevents.dtd"/>

	<xsl:template match="listevents">
		<html>
			<head>
				<meta charset="utf-8"/>
				<title>EventPlanner</title>
				<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
				<link href="mobile/css/styleM.css" rel="stylesheet"/>
			</head>

			<body>
				<div class="container">
					<div class="banner">
						<a href="listEventsView.php" class="name">EventPlanner</a>
      			</div>

   				<div class="navigationBar">
     
		        		<ul class="categories">
		            	<li><a href="listEventsView.php?mobile">Home</a></li>
		            	<li><a href="addEvent.php">Create Event</a></li>
		            	<li><a href=""><xsl:value-of select="user"/></a></li>
		            	<li class="active"><a href="{logLink}"><xsl:value-of select="logStatus"/></a></li>
	          			<!-- <li><a href="logout.php">Log out</a></li> -->
		            </ul>

		        </div>

   				<div class="content">
   					<xsl:apply-templates/>
   				</div>		
      		</div>		
			</body>
		</html>
	</xsl:template>

	<xsl:template match="event">
		<div class="listevent">
			
			<table>
				<tr>
					<td>
						<h3>
							<a href="{link}?mobile" class="eventTitleLink">
								<xsl:value-of select="title"/>
							</a>
						</h3>
					</td>
				</tr>
			</table>
			<table class="dateloc">
				<tr>
					<td>
						<p>
							<b>When: </b><xsl:value-of select="datetime"/>
						</p>
					</td>
					<td>
						<p>
							<b>Where: </b><xsl:value-of select="location"/>
						</p>
					</td>
				</tr>
				
				<tr>	
					<td>				
						<p>
							<b>Attendees: </b>
							<xsl:value-of select="nrOfAttendees"/>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p>
							<b>Comments: </b>
							<xsl:value-of select="nrOfComments"/>
						</p>
					</td>
				</tr>
			</table>
		
		</div>

	</xsl:template>

	<xsl:template match="user"/>
	<xsl:template match="logLink"/>
	<xsl:template match="logStatus"/>
	<xsl:template match="title"/>
	<xsl:template match="datetime"/>
	<xsl:template match="location"/>
	<xsl:template match="nrOfAttendees"/>
	<xsl:template match="shortDescription"/>
	<xsl:template match="link"/>

</xsl:stylesheet>