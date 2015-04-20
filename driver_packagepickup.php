<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Uppdatera status</h1>
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
				$sql = "INSERT INTO picksup (packageID, driverID, time)
						VALUES (" . $_POST["packageID"] . ", " . $_POST["driverID"] . ", NOW())";
				$result = mysqli_query($conn, $sql);
				if($result) {
					echo "Paketet status har uppdaterats till \"Hämtat\".";
					echo "<br>
							<form action='driver_contracts.php' method='post'>
								<input type='hidden' name='driverID' value=" . $_POST["driverID"] . ">
								<input type='submit' value='Fortsätt'>
							</form>";
				} else {
					printf("Ett fel uppstod när paketets status försöktes uppdateras. Försök igen.");
					exit();
				}
				mysqli_close($conn);
			?>
		</div>
	</body>
</html>