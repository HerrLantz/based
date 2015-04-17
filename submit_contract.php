<?php
	date_default_timezone_set('Europe/Stockholm');

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

	$contr_sellerMail = $mail;
	$contr_buyerMail = $_POST["buyer_mail"];
	$contr_buyerAddress = $_POST["buyer_address"];

	$seller_result = mysqli_query($conn, "INSERT INTO seller (sellerMail, pickupAddress, ban, brn)
							  			  VALUES ('$mail', '$address', '$ban', '$brn')");

	if (!$seller_result) {
		//SQL Error message. Use for debuging only!
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}

	// START SESSION TO ACCESS SESSION VARIABLES
	session_start();

	$price_total = 0; // The total price of all packages

	foreach($SESSION["pkg_price"] as $price) {
		$price_total += $price;
	}

	// Calculating delivery price
	$deliv_price = 0;
	for($i = 0; i < count($_SESSION["pkg_price"]; $i++) {
		$pkg_height = $_POST["pkg_height"][$i];
		$pkg_length = $_POST["pkg_length"][$i];
		$pkg_width = $_POST["pkg_width"][$i];
		$pkg_weight = $_POST["pkg_weight"][$i];

		$deliv_price += ($pkg_height*$pkg_length*$pkg_width)*100;
	}

	$contr_result = mysqli_query($conn, "INSERT INTO contract (sellerMail, buyerMail, delivPrice, packagePrice)
									     VALUES ('$contr_sellerMail', '$contr_buyerMail', '$deliv_price', '$pkg_price')");

	if (!$contr_result) {
		//SQL Error message. Use for debuging only!
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}

	$lastID = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
	$lastID = mysqli_fetch_row($lastID);

	// adding packages to the DB
	for($i = 0; i < count($_SESSION["pkg_price"]; $i++) {
		$pkg_price = $_SESSION["pkg_price"][$i];
		$pkg_height = $_POST["pkg_height"][$i];
		$pkg_length = $_POST["pkg_length"][$i];
		$pkg_width = $_POST["pkg_width"][$i];
		$pkg_weight = $_POST["pkg_weight"][$i];
		$pkg_desc = $_POST["pkg_desc"][$i];

		$pkg_result = mysqli_query($conn, "INSERT INTO package (contractID, width, height, price, length, weight, description)
									       VALUES ('$lastID','$pkg_width', '$pkg_height', '$pkg_price', '$pkg_length', '$pkg_weight', '$pkg_desc')");
	}


	// OPEN THE CONTRACT!
	$opens_mail = $contr_sellerMail;
	$opens_result = mysqli_query($conn, "INSERT INTO opens (sellermail, time)
							           VALUES ('$opens_mail', NOW())");

	if (!$opens_result) {
		//SQL Error message. Use for debuging only!
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<?php


		




			// Adding package information to the database

			



		?>
	</div>
</body>
</html>