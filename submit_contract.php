<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<?php
			date_default_timezone_set('Europe/Stockholm');

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "labb2";

			$everything_is_ok = true;
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
				$everything_is_ok = false;
				exit();
			}

			
			$pkg_price = $_POST["package_price"];
			$pkg_height = $_POST["package_height"];
			$pkg_length = $_POST["package_length"];
			$pkg_width = $_POST["package_width"];
			$pkg_weight = $_POST["package_weight"];
			$pkg_desc = $_POST["package_desc"];

			$contr_sellerMail = $mail;
			$contr_buyerMail = $_POST["buyer_mail"];
			$contr_buyerAddress = $_POST["buyer_address"];
			$deliv_price = ($pkg_height*$pkg_length*$pkg_width)*100;

			$contr_result = mysqli_query($conn, "INSERT INTO contract (sellerMail, buyerMail, delivPrice, packagePrice)
									           VALUES ('$contr_sellerMail', '$contr_buyerMail', '$deliv_price', '$pkg_price')");

			if (!$contr_result) {
				//SQL Error message. Use for debuging only!
				printf("Error: %s\n", mysqli_error($conn));
				$everything_is_ok = false;
				exit();
			}


			// Adding package information to the database

			$pkg_result = mysqli_query($conn, "INSERT INTO package (packageID,width, height, price, length, weight, description)
									           VALUES (LAST_INSERT_ID(),'$pkg_width', '$pkg_height', '$pkg_price', '$pkg_length', '$pkg_weight', '$pkg_desc')");

			
			if (!$pkg_result) {
				//SQL Error message. Use for debuging only!
				printf("Error: %s\n", mysqli_error($conn));
				$everything_is_ok = false;
				exit();
			}

			echo mysqli_query($conn, "SELECT LAST_INSERT_ID()");

			$opens_mail = $contr_sellerMail;

			$opens_result = mysqli_query($conn, "INSERT INTO opens (sellermail, time)
									           VALUES ('$opens_mail', NOW())");

			if (!$opens_result) {
				//SQL Error message. Use for debuging only!
				printf("Error: %s\n", mysqli_error($conn));
				$everything_is_ok = false;
				exit();
			}

		?>
	</div>
</body>
</html>