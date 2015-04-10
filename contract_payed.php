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
					$sql = "SELECT * FROM pays 
							WHERE contractID = " . $_POST["korvtraktID"] . "";
					$result = mysqli_query($conn, $sql);
					if(!is_null($result)) {
						//Register the contract as payed in database
						$sql = "INSERT INTO pays
								(time, contractID) VALUES (NOW(), " . $_POST["korvtraktID"] . ")";
						$result = mysqli_real_query($conn, $sql);
						//$payedResult = mysqli_use_result($conn);
						if((mysqli_num_rows($result)) > 0) {
							//printf("Vi lyckades inte behandla din betalning. Säkert du som gjort fel...");
							//SQL Error message. Use for debuging only!
    						printf("Error: %s\n", mysqli_error($conn));
    						exit();
						}
						//Check if row was added to pays (Not working)
						if($result) {
							echo "Betalning gick igenom. Fan va nice!";
						} else {
							echo "Vi lyckades inte behandla din betalning. Säkert du som gjort fel...";
						}
						mysqli_close($conn);
					} else {
						echo "Detta korvtrakt är redan betalt";
						mysqli_close($conn);
					}
				?>
			</div>
		</div>
	</body>
</html>