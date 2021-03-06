﻿<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Ditt Korvtrakt</h1>
		</div>
		<div class ="container">
			<div id ="search_result">
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

					$ID = $_POST["korvtraktID"];
					$seller_mail = $_POST["sellermail"];
					//Fetch contract
					$sql = "SELECT * FROM contract 
							WHERE contractID = '" . $_POST["korvtraktID"] . "' AND sellerMail = '" . $_POST["sellermail"] . "'";
					$result = mysqli_query($conn, $sql);
					if (!$result) {
						//printf("Inget korvtrakt hittades! Se till att du fyllt i rätt korvtraktnummer.");
						//SQL Error message. Use for debuging only!
    					printf("Error: %s\n", mysqli_error($conn));
    					exit();
					}
					//Display search result or error if no contract found
					if((mysqli_num_rows($result)) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "ID: " . $row["contractID"] . "<br>";
							echo "Korv Pris: " . $row["packagePrice"] . " SEK<br>";
							echo "Korv Frakt: " . $row["delivPrice"] . " SEK<br>"; 

							//Used to send the buyers inputted korvtraktID to the next page so
							//we can use it to register the contract as payed in the database.
						}

						mysqli_query($conn, "INSERT INTO signs (contractID, sellerMail, time)
											 VALUES ('$ID', '$seller_mail', NOW())");
						echo "Ditt korvtrakt är nu påskrivet!";

					} else {
						echo "Inget korvtrakt hittades! Se till att du fyllt i rätt e-mailadress och korvtraktnummer.";
					} 
					mysqli_close($conn);
				?>
			</div>
			<div id="homeknapp">
				<a href="index.php"><h3>Gå tillbaka</h3></a>
			</div>
		</div>	
	</body>
</html>