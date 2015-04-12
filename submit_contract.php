<!DOCTYPE html>
<html>
<head>
	<title>Korvtrakt Skapat!</title>
</head>
<body>
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
			$mail = $_POST["Mail"];
			$address = $_POST["Address"];
			$ban = $_POST["BAN"];
			$brn = $_POST["BRN"];
			$result = mysqli_query($conn, "INSERT INTO seller (sellerMail, pickupAddress, ban, brn)
					VALUES ('$mail', '$address', '$ban', '$brn')");
		?>
	</div>
</body>
</html>