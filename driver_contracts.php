<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Mina leveranser</h1>
		</div>
		<div class="package_container">
			<h2>Korvpaket du transporterar</h2>
			<br>
			<h3>Paket vars leverans har blivit bekräftad av köparen visas ej här</h3>
			<br>
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
				$dropsql = "SELECT dropsoff.packageID, contractID, time 
							FROM dropsoff JOIN package
								ON dropsoff.packageID = package.packageID
							WHERE driverID =" . $_POST["driverID"] . "
							AND dropsoff.packageID NOT IN
							(SELECT packageID FROM confirms)";
				$dropresult = mysqli_query($conn, $dropsql);
				if(!$dropresult) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				$picksql = "SELECT picksup.packageID, package.contractID, time 
							FROM picksup JOIN package
								ON picksup.packageID = package.packageID
							WHERE driverID =" . $_POST["driverID"] . "
							AND (picksup.packageID) NOT IN 
							(SELECT packageID FROM dropsoff)";
				$pickresult = mysqli_query($conn, $picksql);
				if(!$pickresult) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				$takensql = "SELECT packageID, takes.contractID, takes.time FROM
							takes JOIN package
								ON takes.contractID = package.contractID
							WHERE driverID = " . $_POST["driverID"] . "
							AND packageID NOT IN
							(SELECT packageID FROM picksup)
							AND packageID NOT IN 
							(SELECT packageID FROM dropsoff)";
				$takenresult = mysqli_query($conn, $takensql);
				if(!$takenresult) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				if(mysqli_num_rows($pickresult) > 0 || mysqli_num_rows($dropresult) > 0 || mysqli_num_rows($takenresult) > 0) {
					echo "<table style='width:100%'>
								<tr>
									<th align='left'>Paketnummer</th>
									<th align='left'>Status</th>
									<th align='left'>Senast uppdaterat</th>
									<th align='left'>Del av korvtrakt</th>
									<th align='left'></th>
								</tr>";
				} else {
					echo "Inga korvpaket håller på transporteras.";
				}
				// Print out all "hämtade" packages
				if(mysqli_num_rows($pickresult) > 0) {
					while($row = mysqli_fetch_assoc($pickresult)) {
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								<td>Hämtat</td>
								<td>" . $row["time"] . "</td>
								<td>" . $row["contractID"] . "</td>
								<td>
									<form action='driver_packagedropoff.php' method='post'>
										<input type='hidden' name='packageID' value=" . $row["packageID"] . ">
										<input type='hidden' name='driverID' value=" . $_POST["driverID"] . ">
										<input type='submit' value='Uppdatera status'>
									</form>	
								</td>
							</tr>";
					}
				}
				// Print out taken packages (not hämtade)
				if(mysqli_num_rows($takenresult) > 0) {
					while($row = mysqli_fetch_assoc($takenresult)) {
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								<td>Ej hämtat</td>
								<td>" . $row["time"] . "</td>
								<td>" . $row["contractID"] . "</td>
								<td>
									<form action='driver_packagepickup.php' method='post'>
										<input type='hidden' name='packageID' value=" . $row["packageID"] . ">
										<input type='hidden' name='driverID' value=" . $_POST["driverID"] . ">
										<input type='submit' value='Uppdatera status'>
									</form>	
								</td>
							</tr>";
					}
				}
				// Print out delivered packages. 
				if(mysqli_num_rows($dropresult) > 0) {
					while($row = mysqli_fetch_assoc($dropresult)) {
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								<td>Levererat</td>
								<td>" . $row["time"] . "</td>
								<td>" . $row["contractID"] . "</td>
							</tr>";
					}
				}
				echo "</table>
						<br>
						<a href='index.php'>Till startsidan</a>";
				mysqli_close($conn);
			?>
		</div>
	</body>
</html>