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
          			<a href="listEventsView.php" class="name">EventPlanner</a>
      			</div>


      			<div class="navigationBar">
        
			        <ul class="categories">
			          <li><a href="listEventsView.php">Home</a></li>
			          <li><a href="addEvent.html">Add Event</a></li>
			          <li class="active"><a href="portfolio.html">Log in</a></li>
			          <li><a href="courses.html">Log out</a></li>
			        </ul>

			      </div>


	      		<div class="content">
	      			<div class="eventTitle">
	      				<h1>
								<xsl:value-of select="title"/>
							</h1>
						</div>

	      			<div class="event">

							<table class="dateloc">
								<tr>
									<td>
										<p><b>When: </b> <xsl:value-of select="datetime"/></p>
									</td>
									<td>
										<p><b>Location: </b> <xsl:value-of select="location"/></p>
									</td>
									<td>
										<p>
											<b>Attending: </b><xsl:value-of select="attendees"/>
										</p>
									</td>
								</tr>
							</table>
							

							<p class="description">
								<xsl:value-of select="description"/>
							</p>

							<table class="eventInfo">
								<tr>
									<td>
										<p>
											<b>Created by: </b><xsl:value-of select="creator"/>
										</p>
									</td>
								</tr>
								<tr>
									<td>
										<p>
											<b>Admins: </b> <br/><xsl:apply-templates select="admins"/>
										</p>
									</td>
								</tr>
							</table>

							

						</div>

						
					</div>

					<div class="comments">
						<xsl:for-each select="comment">
							<div class="comment">

								<table>
									<tr>
										<td>
											<p class="commentName">
												<b><xsl:value-of select="name"/></b> 
											</p>
										</td>
										<td>
											<p class="commentDate">
													<xsl:value-of select="datetime"/> 
											</p>
										</td>
									</tr>
								</table>
								<p class="text">
									<xsl:value-of select="text"/>
								</p>
							</div>
						</xsl:for-each>

						<form action="addComment.php" method="post">
							<p>Name: <input type="text" name="name" /></p>
							<p>Comment: <textarea type="text" maxlength="150" rows="4" cols="40" name="comment" /></p>
							<p><input type="submit" value="click" name="submit"/></p>
						</form>
						


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