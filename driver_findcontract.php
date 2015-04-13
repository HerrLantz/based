<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Transportera korv</h1>
		</div>
		<div class ="container">
			<h2>Tillgängliga korvtrakt:</h2>
			<p>
			Här ser du korvtrakt som behöver folk som kan transportera varan.
			Ser du ett korvtrakt du vill transportera för är det bara att klicka på
			SWWAAAGG
			</p>
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
				$sql = "SELECT contractID, delivPrice
						FROM contract
						WHERE (contractID, delivPrice) NOT IN
						(SELECT contractID, delivPrice 
						FROM contract NATURAL JOIN takes)";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("Ett fel uppstod. Försök igen.");
					exit();
				}
				if((mysqli_num_rows($result)) > 0) {
					echo "<table border='1' style='width:100%'>
								<tr>
									<th>ID</th>
									<th>Du tjänar</th>
								</tr>";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>" . $row["contractID"] . " </td>
								<td>" . $row["delivPrice"] . " </td>
							</tr>";	
					}
					echo "</table>";
				}
			?>
		</div>	
	</body>
</html>