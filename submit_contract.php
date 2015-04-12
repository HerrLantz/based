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

			// Adding the seller to the database
			$mail = $_POST["Mail"];
			$address = $_POST["Address"];
			$ban = $_POST["BAN"];
			$brn = $_POST["BRN"];
			$seller_result = mysqli_query($conn, "INSERT INTO seller (sellerMail, pickupAddress, ban, brn)
					VALUES ('$mail', '$address', '$ban', '$brn')");

			if (!$seller_result) {
				//SQL Error message. Use for debuging only!
				printf("Error: %s\n", mysqli_error($conn));
				exit();
			}
			// Adding package information to the database

			$pkg_price = $_POST["package_price"];
			$pkg_height = $_POST["package_height"];
			$pkg_length = $_POST["package_length"];
			$pkg_width = $_POST["package_width"];
			$pkg_weight = $_POST["package_weight"];
			$pkg_desc = $_POST["package_desc"];

			$deliv_price = ($pkg_height*$pkg_length*$pkg_width)*100;

			$pkg_result = mysqli_query($conn, "INSERT INTO package (width, height, price, length, width, weight, description)
									           VALUES ('$pkg_width', '$pkg_height', '$pkg_price', '$pkg_length', $pkg_weight, $pkg_desc)");

			if (!$pkg_result) {
				//SQL Error message. Use for debuging only!
				printf("Error: %s\n", mysqli_error($conn));
				exit();
			}


			
		?>
	</div>
</body>
</html>