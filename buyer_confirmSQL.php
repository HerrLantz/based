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
				$sql = "INSERT INTO confirms (packageID, buyermail, time)
						VALUES (" . $_POST["packageID"] . ", '" . $_POST["buyermail"] . "', NOW())";
				$result = mysqli_query($conn, $sql);
				if($result) {
					echo "Paketets leverans är nu bekräftas av dig.";
					echo "<br>
							<a href='index.php'>Till startsidan</a>";
				} else {
					printf("Ett fel uppstod när paketets status försöktes uppdateras. Försök igen.");
					echo "<br>
							<a href='index.php'>Till startsidan</a>";
					exit();
				}
				mysqli_close($conn);
			?>
		</div>
	</body>
</html>