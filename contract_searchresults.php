<!DOCTYPE html>
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
					//Fetch contract
					$sql = "SELECT * FROM contract WHERE contractID = " . $_POST["korvtraktID"] . "";
					$result = mysqli_query($conn, $sql);
					if (!$result) {
    					printf("Error: %s\n", mysqli_error($conn));
    					exit();
					}
					//Display search result or error if no contract found
					if((mysqli_num_rows($result)) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "ID: " . $row["contractID"] . " Korv Frakt: " . $row["delivPrice"] . " SEK" . " Korvtrakt upprättat vid: " . $row["createTime"]. "<br>"; 
							echo "<div class='pay_button'>
							 		<a href=''>Betala Korvtrakt</a>
								</div>";
						}
					} else {
						echo "Inget korvtrakt hittades!";
					} 
					mysqli_close($conn);
				?>
			</div>	
		</div>	
	</body>
</html>