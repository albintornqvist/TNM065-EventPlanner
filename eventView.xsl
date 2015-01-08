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

      			<div class="event">

							<h2>
								<xsl:value-of select="title"/>
							</h2>
							<h4>
								When: <xsl:value-of select="datetime"/>
							</h4>

							<h4>
								Location: <xsl:value-of select="location"/>
							</h4>

							<p>
								<xsl:value-of select="description"/>
							</p>

						</div>
					</div>
				</div>

			</body>

		</html>
	</xsl:template>

</xsl:stylesheet>