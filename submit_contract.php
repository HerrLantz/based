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
			// Adding package information to the database

			$pkg_price = $_POST["package_price"];
			$pkg_height = $_POST["package_height"];
			$pkg_length = $_POST["package_length"];
			$pkg_width = $_POST["package_width"];
			$pkg_weight = $_POST["package_weight"];
			$pkg_desc = $_POST["package_desc"];

			$pkg_result = mysqli_query($conn, "INSERT INTO package (width, height, price, length, weight, description)
									           VALUES ('$pkg_width', '$pkg_height', '$pkg_price', '$pkg_length', '$pkg_weight', '$pkg_desc')");

			if (!$pkg_result) {
				//SQL Error message. Use for debuging only!
				printf("Error: %s\n", mysqli_error($conn));
				$everything_is_ok = false;
				exit();
			}

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

			$opens_mail = $contr_sellerMail;

			$opens_result = mysqli_query($conn, "INSERT INTO opens (sellermail, time)
									           VALUES ('$opens_mail', NOW())");

			if (!$opens_result) {
				//SQL Error message. Use for debuging only!
				printf("Error: %s\n", mysqli_error($conn));
				$everything_is_ok = false;
				exit();
			}


			// MAIL TO BUYER

			# Include the Autoloader (see "Libraries" for install instructions)
			require 'mailgun-php/vendor/autoload.php';
			use Mailgun\Mailgun;

			# Instantiate the client.
			$mgClient = new Mailgun('key-1efda47fe19993eafe17e78b05d95f2e');
			$domain = "sandbox88d1efcae48e4c77ad2cbbdca788bb3d.mailgun.org";

			# Make the call to the client.
			$mail_res = $mgClient->sendMessage("$domain",
			                  array('from'    => 'Mailgun Sandbox <postmaster@sandbox88d1efcae48e4c77ad2cbbdca788bb3d.mailgun.org>',
			                        'to'      => $contr_buyerMail,
			                        'subject' => 'TEST!!!',
			                        'text'    => 'TEST DATABAS LABB2'));

			if (!$mail_res) {
				printf("Error: %s\n", mysqli($conn));
				exit();
			}
		?>
	</div>
</body>
</html>