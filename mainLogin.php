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
										<td width="78">Username</td>
										<td width="6">:</td>
										<td width="294"><input name="myusername" type="text" id="myusername"></td>
									</tr>
									<tr>
										<td>Password</td>
										<td>:</td>
										<td><input name="mypassword" type="password" id="mypassword"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td><input type="submit" name="Submit" value="Login"></td>
									</tr>
								</table>
							</td>
						</form>
					</tr>
				</table>
			</div>
		</div>
	</body>

</html>