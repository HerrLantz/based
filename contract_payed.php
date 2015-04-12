<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1><?php echo $_POST["korvtraktID"] ?></h1>
		</div>
		<div class="continer">
			<div>
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
					//Check if the contract has already been payed.
					$checksql = "SELECT * FROM pays 
							WHERE contractID = " . $_POST["korvtraktID"] . "";		
					$checkresult = mysqli_query($conn, $checksql);
					if(mysqli_num_rows($checkresult) == 0) {
						//Register the contract as payed in database
						$paysql = "INSERT INTO pays
								(time, contractID) VALUES (NOW(), " . $_POST["korvtraktID"] . ")";
						$payresult = mysqli_query($conn, $paysql);
						if($payresult) {
							echo "Betalning gick igenom. Fan va nice!";
							echo "<br>";
							echo "<a href='index.php'>Fortsätt</a>";
						} else {
							echo "Vi lyckades inte behandla din betalning. Säkert du som gjort fel...";
						}
						mysqli_close($conn);
					//if the contract has already been payed an error is given and the connection is closed.
					} else {
						echo "Detta korvtrakt är redan betalt";
						mysqli_close($conn);
					}
				?>
			</div>
		</div>
	</body>
</html>