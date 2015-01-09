<?xml version="1.0"?>


<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


	<xsl:template match="event">

		<html>

			<head>
				<meta charset="utf-8"/>
			  <title>EventPlanner</title>
			  <link href="css/style.css" rel="stylesheet"/>
			</head>


			<body>
				
				<div class="container">
					<div class="banner">
          			<a href="/" class="name">EventPlanner</a>
      			</div>

	      		<div class="content">
	      			<div class="eventTitle">
	      				<h1>
								<xsl:value-of select="title"/>
							</h1>
						</div>

	      			<div class="event">

							
							<p>
								When: <xsl:value-of select="datetime"/>
							</p>

							
							<h4>Location: <xsl:value-of select="location"/></h4>
							<p>
								Attending: <xsl:value-of select="attendees"/>
							</p>
							

							<p>
								<xsl:value-of select="description"/>
							</p>

							<h5>
								Created by: <xsl:value-of select="creator"/>
							</h5>

							<h5>
								Admins:
							</h5>
							<p>
								<xsl:apply-templates select="admins"/> 
							</p>

						</div>

						<div class="comments">

							<xsl:for-each select="comment">
								<div class="comment">
									<p> <b><xsl:value-of select="name"/></b> <xsl:value-of select="datetime"/> </p>
									<p class="text">
										<xsl:value-of select="text"/>
									</p>
								</div>
							</xsl:for-each>

						</div>
					</div>
				</div>

			</body>

		</html>
	</xsl:template>


	<xsl:template match="admins">
		<xsl:for-each select="admin">
			<xsl:apply-templates/>
			<br/>
		</xsl:for-each>
	</xsl:template>


	

	










</xsl:stylesheet>