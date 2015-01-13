<html>

	<head>
		<meta charset="utf-8"/>
		<title>EventPlanner</title>

		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" media="screen"
     	href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
		<?php 
			if(isset($_GET['mobile']))
			{
				?><link href="mobile/css/styleM.css" rel="stylesheet"/><?php
			}
			else
			{
				?><link href="css/style.css" rel="stylesheet"/><?php
			}
		?>
	</head>

	<body>
		<div class="container">
			<div class="banner">
				<a href="listEventsView.php" class="name">EventPlanner</a>
			</div>

			<div class="navigationBar">
        		
				<?php 
					if(isset($_GET['mobile']))
					{
						?>
						<ul class="categories">
				         <li><a href="listEventsView.php?mobile">Home</a></li>
				         <li><a href="addEvent.php?mobile">Create Event</a></li>
				          <!-- <li class="active"><a href="mainLogin.php">Log in</a></li>
				          <li><a href="logout.php">Log out</a></li> -->
				      </ul>
						<?php
					}
					else
					{
						?>
						<ul class="categories">
				         <li><a href="listEventsView.php">Home</a></li>
				         <li><a href="addEvent.php">Create Event</a></li>
				          <!-- <li class="active"><a href="mainLogin.php">Log in</a></li>
				          <li><a href="logout.php">Log out</a></li> -->
				      </ul>
				      <?php
					}
				?>

		        

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
											
											<?php 
												if(isset($_GET['mobile']))
												{
													?><td><a href="register.php?mobile">Register here</a></td><?php
												}
												else
												{
													?><td><a href="register.php">Register here</a></td><?php
												}
											?>
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