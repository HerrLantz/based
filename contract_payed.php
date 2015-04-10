<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1><?php echo $_POST["korvtraktID"] ?></h1>
		</div>
		<div class="continer">
			<div>
				<?php
					//INTE KLART. SQL funkar inte för $_POST vill inte ge mig korvtraktID.
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
					//Register the contract as payed in database
					$sql = "INSERT INTO pays
							(time, contractID) VALUES (NOW(), " . $_POST["korvtraktID"] . ")";
					$result = mysqli_query($conn, $sql);
					if (!$result) {
						//printf("Vi lyckades inte behandla din betalning. Säkert du som gjort fel...");
						//SQL Error message. Use for debuging only!
    					printf("Error: %s\n", mysqli_error($conn));
    					exit();
					}
					//Check if row was added to pays (Not working)
					if((mysql_fetch_array($result))) {
						printf("Betalning gick igenom. Fan va nice!");
					} else {
						printf("Vi lyckades inte behandla din betalning. Säkert du som gjort fel...");
					}
					mysqli_close($conn);
				?>
			</div>
		</div>
	</body>
</html>