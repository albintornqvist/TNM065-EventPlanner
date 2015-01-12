<?php 

	session_start();

	if (!(isset($_SESSION['login']) && $_SESSION['login'] != "")) {

		// header ("Location: mainLogin.php");
		$loginMessage = '';
		$logStatus = 'Log in';
		
		if(isset($_GET['mobile']))
			$logLink = 'mainLogin.php?mobile';
		else
			$logLink = 'mainLogin.php';

		$loggedIn = false;

	}
	else{
		$ses = $_SESSION['login'];
		// $user = $_SESSION['user'];
		$loginMessage = 'Logged in as ' . $_SESSION['user'];
		$logStatus = 'Log out';
		$logLink = 'logout.php';
		$loggedIn = true;
	}
	
?>


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

				<?php 
					if(isset($_GET['mobile']))
					{
						?>
							<ul class="categories">
					         <li><a href="listEventsView.php?mobile">Home</a></li>
					         <li><a href="addEvent.php?mobile">Create Event</a></li>
					         <li><a href=""><?= $loginMessage ?></a></li>
					         <li class="active"><a href="<?= $logLink ?>"><?= $logStatus ?></a></li>
					      </ul>
				      <?php
					}
					else
					{
						?>
							<ul class="categories">
					         <li><a href="listEventsView.php">Home</a></li>
					         <li><a href="addEvent.php">Create Event</a></li>
					         <li><a href=""><?= $loginMessage ?></a></li>
					         <li class="active"><a href="<?= $logLink ?>"><?= $logStatus ?></a></li>
					      </ul>
				      <?php
					}
				?>

		        

		   </div>

			<div class="content">

				<?php

				if($loggedIn == true)
				{ ?>

				<div class="addEvent">
					<h2>Create new event</h2>

					<form name="eventForm" action="eventCreated.php" method="get" onsubmit="return validateForm()">
						<table>
							<tr>
								<td>Name:</td>
								<td><input type="text" name="eventTitle"></td>
							</tr>
							<tr>
								<td>Time:</td>
								<td>
									<div id="datetimepicker" class="input-append date">
								      <input type="text" name="eventTime"></input>
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
								    <!-- <script type="text/javascript"
								     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
								    </script> -->
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
								<td><input type="text" name="eventLocation"></td>
							</tr>
							<tr>
								<td>Description:</td>
								<td><textarea rows="4" cols="50" name="eventDescription"></textarea></td>
							</tr>
						</table>

						<input type="submit" value="Create Event">
					</form>
				</div>
				<?php }
			else
			{
				echo "You must log in to create an event.";
			}
			?>
			</div>		
		</div>		

	</body>

</html>