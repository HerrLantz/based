<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Mina korvtrakt</h1>
		</div>
		<div class="package_container">
			<h2>Korvpaket du transporterar</h2>
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
				echo "<table style='width:100%'>
								<tr>
									<th align='left'>Paketnummer</th>
									<th align='left'>Status</th>
								</tr>";
				$sql = "SELECT * FROM dropsoff
						WHERE driverID =" . $_POST["driverID"] . "";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								<td>Levererat</td>
								<td>
									<form action='' method='post'>";
									//Använd om packet nummer måste skickas vidare till nästa sida.
									//<input type='hidden' name='korvtraktID' value=" . $row["packageID"] . ">"
						echo	"</td>
							</tr>";
					}
				}
				$sql = "SELECT packageID FROM picksup
						WHERE driverID =" . $_POST["driverID"] . "
						AND (packageID) NOT IN 
						(SELECT packageID FROM dropsoff)";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								<td>Hämtat</td>
								<td>
									<form action='' method='post'>";
									//Använd om packet nummer måste skickas vidare till nästa sida.
									//<input type='hidden' name='korvtraktID' value=" . $row["contractID"] . ">
						echo		"<input type='submit' value='Uppdatera status'>
								</td>
							</tr>";
					}
					echo "</table>";
				}	
			?>
		</div>
		<div class = "contracts_container">
			<h2>Korvtrakt du ska transportera</h2>
			<?php
				echo "<table style='width:100%'>
								<tr>
									<th align='left'>Korvtraktnummer</th>
									<th align='left'>Status</th>
								</tr>";
				$sql = "SELECT * FROM takes 
						WHERE driverID =" . $_POST["driverID"] . "";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>" . $row["contractID"] ."</td>
								<td>Ej påbörjat leverans</td>
								<td>
									<form action='' method='post'>
									<input type='hidden' name='korvtraktID' value=" . $row["contractID"] . ">
									<input type='submit' value='Uppdatera status'>
								</td>
							</tr>";
					}
					echo "</table>";
				}
			?>
		</div>
	</body>
</html>