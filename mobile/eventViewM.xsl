<?xml version="1.0" encoding="utf-8"?>


<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


	<xsl:template match="event">

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
          			<a href="listEventsView.php?mobile" class="name">EventPlanner</a>
      			</div>


      			<div class="navigationBar">
        
			        <ul class="categories">
			          <li><a href="listEventsView.php?mobile">Home</a></li>
			          <li><a href="addEvent.php?mobile">Create Event</a></li>
			          <li><a href=""><xsl:value-of select="user"/></a></li>
			          <li class="active"><a href="{logLink}?mobile"><xsl:value-of select="logStatus"/></a></li>
			        </ul>

			      </div>


	      		<div class="content">
	      			<div class="eventTitle">
	      				<table>
	      					<tr>
	      						<td>
				      				<h1>
											<xsl:value-of select="title"/>
										</h1>
									</td>
									<td>
										<a href="{link}&amp;mobile" class="editEvent"><img src="img/edit.png" height="25"/></a>
									</td>
								</tr>
							</table>
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
							</table>

							

						</div>

						
					</div>

					<div class="comments">
						<xsl:choose>
							<xsl:when test="user=-1">
								<p>Log in to comment.</p>
							</xsl:when>
							<xsl:otherwise>
								<form name="commentForm" action="addComment.php" method="post">
									<table>
										<tr>
											<td>
												<p class="commentName">
													<b><xsl:value-of select="currentUser"/></b>
												</p>
											</td>
										</tr>
										<tr>
											<td>
												<p>Comment: <textarea type="text" maxlength="150" rows="4" cols="40" name="comment" /></p>
											</td>
										</tr>
										<tr>
											<td>
												<p><input type="submit" value="Send comment" name="submit"/></p>
											</td>
										</tr>

									</table>
								</form>
							</xsl:otherwise>
						</xsl:choose>
					
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

						

					</div>

				</div>
			</body>

		</html>
	</xsl:template>


</xsl:stylesheet>