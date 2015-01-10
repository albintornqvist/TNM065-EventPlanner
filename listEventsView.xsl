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
				<link href="css/style.css" rel="stylesheet"/>
			</head>

			<body>
				<div class="container">
					<div class="banner">
						<a href="listEventsView.php" class="name">EventPlanner</a>
      				</div>

      				<div class="navigationBar">
        
			        	<ul class="categories">
			            	<li><a href="listEventsView.php">Home</a></li>
			            	<li><a href="addEvent.html">Create Event</a></li>
			            	<li class="active"><a href="portfolio.html">Log in</a></li>
			            	<li><a href="courses.html">Log out</a></li>
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
			<h3>
				<a href="{link}" class="eventTitleLink">
					<xsl:value-of select="title"/>
				</a>
			</h3>
			
			<p>
				<xsl:value-of select="datetime"/>
			</p>

			<p>
				<xsl:value-of select="location"/>
			</p>

			<table>
				<tr>
					<td>
						<p>
							Attendees:
							<xsl:value-of select="nrOfAttendees"/>
						</p>
					</td>

					<td>
						<p>
							Comments:
							<xsl:value-of select="nrOfComments"/>
						</p>
					</td>
				</tr>
			</table>

			<p>
				<xsl:value-of select="shortDescription"/>
			</p>			
		</div>

	</xsl:template>

	<xsl:template match="title"/>
	<xsl:template match="datetime"/>
	<xsl:template match="location"/>
	<xsl:template match="nrOfAttendees"/>
	<xsl:template match="shortDescription"/>
	<xsl:template match="link"/>

</xsl:stylesheet>