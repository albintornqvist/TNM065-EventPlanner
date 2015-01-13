<html>

	<head>
		<meta charset="utf-8"/>
		<title>EventPlanner</title>
		<!-- <link href="css/style.css" rel="stylesheet"/> -->

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

		<script type="text/javascript">
		    function validateUser(){
			    var a=document.forms["eventForm"]["username"].value;
			    var b=document.forms["eventForm"]["name"].value;
			    var c=document.forms["eventForm"]["password"].value;
			    var d=document.forms["eventForm"]["password2"].value;
			    if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d==""){
					alert("Please Fill All Required Fields");
					return false;
		      	}
		      	else if(c!=d){
		      		alert("Password does not match")
		      		return false;
		      	}
		    }
	    </script>

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
				<div class="register">
					<h2>Register new user</h2>

					<form name="eventForm" action="userCreated.php" method="get" onsubmit="return validateUser()">

						<table>
							<tr>
								<td>Username:</td>
								<td><input type="text" name="username"></td>
							</tr>
							<tr>
								<td>Name:</td>
								<td><input type="text" name="name"></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="password"></td>
							</tr>
							<tr>
								<td>Repeat password:</td>
								<td><input type="password" name="password2"></td>
							</tr>

						</table>

						<input type="submit" value="Register">
					</form>

				</div>
			</div>



</html>