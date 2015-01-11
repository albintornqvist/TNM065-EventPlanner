<?xml version="1.0"?>


<xsl:stylesheet version="1.0"
   xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


	<xsl:template match="page">

		<html>
			<head>
				<meta charset="utf-8"/>
			  <title>EventPlanner</title>
			  <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
			  <link href="css/style.css" rel="stylesheet"/>
			</head>

			<body>

				<script type="text/javascript">
				    function validateForm(){
					    var a=document.forms["eventForm"]["eventTitle"].value;
					    var b=document.forms["eventForm"]["eventTime"].value;
					    var c=document.forms["eventForm"]["eventLocation"].value;
					    var d=document.forms["eventForm"]["eventDescription"].value;
					    if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d==""){
							alert("Please Fill All Required Fields");
							return false;
				      	}
				    }
			    </script>


				<div class="container">
					<div class="banner">
          			<a href="listEventsView.php" class="name">EventPlanner</a>
      			</div>

      			<div class="navigationBar">
        
			        <ul class="categories">
			          <li><a href="listEventsView.php">Home</a></li>
			          <li><a href="addEvent.php">Create Event</a></li>
			          <li><a href=""><xsl:value-of select="user"/></a></li>
			          <li class="active"><a href="{logLink}"><xsl:value-of select="logStatus"/></a></li>
			        </ul>

			   	</div>
			   		<xsl:apply-templates/>
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

	<xsl:template match="user"/>
	<xsl:template match="logLink"/>
	<xsl:template match="logStatus"/>

	<xsl:template match="event">

		<div class="content">
			<div class="addEvent">
				<h2>Edit event</h2>

				<form name="eventForm" action="{link}" method="get" onsubmit="return validateForm()">
					<table>
						<tr>
							<td>Name:</td>
							<td><input type="text" value="{title}" name="eventTitle"/></td>
						</tr>
						<tr>
							<td>Time:</td>
							<td>
								<div id="datetimepicker" class="input-append date">
							      <input type="text" value="{datetime}" name="eventTime"></input>
							      <span class="add-on">
							        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							      </span>
							    </div>
							    <script type="text/javascript"
							     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
							    </script> 
							    <script type="text/javascript"
							     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
							    </script>
							    <script type="text/javascript"
							     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
							    </script>
							    <script type="text/javascript">
							      $('#datetimepicker').datetimepicker({
							        format: 'yyyy-MM-dd hh:mm',
							        language: 'en',
							        pickSeconds: false
							      });
							    </script>
							</td>
						</tr>
						<tr>
							<td>Location:</td>
							<td><input type="text" value="{location}" name="eventLocation"/></td>
						</tr>
						<tr>
							<td>Description:</td>
							<td><textarea rows="4" cols="50" name="eventDescription"><xsl:value-of select="description"/></textarea></td>
						</tr>
					</table>

					<input type="submit" value="Save changes"/>
				</form>
			</div>
		</div>	
	</xsl:template>	






</xsl:stylesheet>