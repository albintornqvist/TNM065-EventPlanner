<html>

	<head>
		<meta charset="utf-8"/>
		<title>EventPlanner</title>

		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" media="screen"
     	href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
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
		          <li><a href="addEvent.php">Create Event</a></li>
		          <!-- <li class="active"><a href="mainLogin.php">Log in</a></li>
		          <li><a href="logout.php">Log out</a></li> -->
		        </ul>

		    </div>

		    <div class="content">
				<div class="loginbox">
					<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
						<tr>
							<form name="form1" method="post" action="checkLogin.php">
								<td>
									<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
										<tr>
											<td colspan="3"><strong>Member Login </strong></td>
										</tr>
										<tr>
											<td width="78">Username:</td>
											<!-- <td width="6">:</td> -->
											<td width="294"><input name="myusername" type="text" id="myusername"></td>
										</tr>
										<tr>
											<td>Password:</td>
											<!-- <td>:</td> -->
											<td><input name="mypassword" type="password" id="mypassword"></td>
										</tr>
										<tr>
											<!-- <td>&nbsp;</td> -->
											<!-- <td>&nbsp;</td> -->
											<td><input type="submit" name="Submit" value="Log in"></td>
											<td><a href="register.html">Register here</a></td>
										</tr>
									</table>
								</td>
							</form>
						</tr>
					</table>
				</div>
			</div>
			
		</div>
	</body>

</html>