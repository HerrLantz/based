﻿<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1><?php echo "Ditt korvtraktID: " . $_POST["korvtraktID"]; ?></h1>
		</div>
		<div class="container">
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "labb2";
				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				// Check connection
				if (!$conn) {
    				die("Connection failed: " . mysqli_connect_error());
				}
				// Add this person as a driver in the DB
				$sql = "INSERT INTO driver (brn, ban) VALUES 
							(" . $_POST["BRN"] . ", " . $_POST["BAN"] . ")";
				$result = mysqli_query($conn, $sql);
				// Check if the query was successfull
				if (!$result) {
						//SQL Error message. Use for debuging only!
    					printf("Error: %s\n", mysqli_error($conn));
    					mysqli_close($conn);
    					exit();
    			} else {
    				// Select the users generated driverID.
    				$sql = "SELECT driverID FROM driver
    						WHERE brn = '" . $_POST["BRN"] . "' AND ban = '" . $_POST["BAN"] . "'";
    				$result = mysqli_query($conn, $sql);
    				if(!$result) {
						//SQL Error message.
    					printf("Error: %s\n", mysqli_error($conn));
    					exit();
    				} else {
    					if((mysqli_num_rows($result)) > 0) {
    						$row = mysqli_fetch_assoc($result);
    						// Set the contract as taken in the database.
    						$sql = "INSERT INTO takes (contractID, driverID, time) VALUES
    							(" . $_POST["korvtraktID"] . ", " . $row["driverID"] . ", NOW())";
    						$result = mysqli_query($conn, $sql);
    						if(!$result) {
								//SQL Error message.
    							printf("Error: %s\n", mysqli_error($conn));
    							exit();
    						} else {
    						echo "Grattis, du är nu registrerad som förare för detta korvtrakt.<br>
    								Ditt förarnummer är " . $row["driverID"] . "<br>
    								Detta nummer använder du för att logga in på startsida när du ska 
    								registrera att du hämtat korven från säljaren.<br>";
    						echo "<a href='index.php'>Fortsätt</a>";
    						}
    					} else {
    						echo "Ett fel uppstod. Shit...";
    						mysqli_close($conn);
    						exit();
    					}
    				}


    			} 
    			mysqli_close($conn);
			?>
		</div>
	</body>

</html>