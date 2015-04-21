<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Fastställ korvtrakt</h1>
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
				$mail = $_POST["buyermail"];
				$contractID = $_POST["korvtraktID"];

				$sql = "SELECT * FROM contract 
						WHERE contractID = '$contractID' AND buyermail = '$mail'";
				$result = mysqli_query($conn, $sql);
				if (!$result) {
					//printf("Inget korvtrakt hittades! Se till att du fyllt i rätt korvtraktnummer.");
					//SQL Error message. Use for debuging only!
    				printf("Error: %s\n", mysqli_error($conn));
    				exit();
				}
			?>
		</div>
	</body>
</html>