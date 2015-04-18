<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Uppdatera status</h1>
		</div>
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
				//Select all packages that are in this contract.
				$sql = "SELECT * 
						FROM takes JOIN package
							ON takes.contractID = package.contractID
						WHERE takes.contractID =" . $_POST["korvtraktID"];
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("Ett fel uppstod. Försök igen.");
					exit();
				}
				if(mysqli_num_rows($result) > 0) {
					echo "<h3>Paket som är del av detta korvtrakt:</h3>
							<table style='width:100%'>
								<tr>
									<th align='left'>Paketnummer</th>
								</tr>";
					while($row = mysqli_fetch_assoc($result)) {
							// Add function so that the package is set to "hämtat" on button click.
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								</tr>";
					}
					echo "</table>";
				} else {
					echo "<h3>Det finns inga paket som är del av detta korvtrakt. Konstigt...</h3>";
				}
				mysqli_close($conn);
			?>
		</div>
	</body>
</html>