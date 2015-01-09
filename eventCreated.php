<html>
	<body>
		<?php

			// koppa upp mot databasen med med användarnamn resp lösen rsslaboration

			$link = mysql_connect("emilrydkvist.se.mysql", "emilrydkvist_se", "ytt5t2Le")
		    or die("Could not connect");

			// välj databasen

			mysql_select_db("emilrydkvist_se")
		    or die("Could not select database");
		    
			$eventTitle = $_GET["eventTitle"];
			$eventTime = $_GET["eventTime"];
			$eventLocation = $_GET["eventLocation"];
			$eventDescription = $_GET["eventDescription"];

			// echo $eventTitle;
			// echo $eventDescription;
			// echo $eventTime;
			// echo $eventLocation;
			if(empty($eventTitle) || empty($eventTime) || empty($eventLocation) || empty($eventDescription))
			{
				?>
				<meta http-equiv="refresh" content="0; url=listEventsView.php" />
				<?php
			}
			else
			{
				$insertQuery = "INSERT INTO event (title, description, date, location) VALUES
				('$eventTitle', '$eventDescription', '$eventTime', '$eventLocation')";

				$result = mysql_query($insertQuery);

				if($result){
					$id = mysql_insert_id();
					?>
					<meta http-equiv="refresh" content="0; url=eventView.php?id=<?= $id ?>" />
					<?php
					echo $id;
					echo "<br>succeed";
				}
				else{
					echo "<br>failed";
				}

			}

			
		?>
	</body>
</html>		