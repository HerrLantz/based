<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Vänta...</h1>
		</div>
		<div class="package_container">
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
					echo "<h2>Detta paket har nu registrerat som \"Hämtat\"</h2>
						<form action='driver_contractupdate.php' method='post'>
							<input type='hidden' name='korvtraktID' value=" . $_POST["korvtraktID"] . ">
							<input type='submit' value='Fortsätt'>";
					mysqli_close($conn);
					exit();
				} else {
					printf("Error: %s\n", mysqli_error($conn));
					printf("Ett fel uppstod. Försök igen.");
					echo "<br><a href='driver_contracts.php'>Fortsätt</a>";
					mysqli_close($conn);
					exit();
				}
			?>
		</div>	
	</body>
</html>