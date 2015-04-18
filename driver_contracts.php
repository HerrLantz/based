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
				$dropsql = "SELECT * FROM dropsoff
							WHERE driverID =" . $_POST["driverID"] . "";
				$dropresult = mysqli_query($conn, $dropsql);
				if(!$dropresult) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				$picksql = "SELECT packageID, time FROM picksup
							WHERE driverID =" . $_POST["driverID"] . "
							AND (packageID) NOT IN 
							(SELECT packageID FROM dropsoff)";
				$pickresult = mysqli_query($conn, $picksql);
				if(!$pickresult) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				if(mysqli_num_rows($pickresult) > 0 || mysqli_num_rows($dropresult) > 0) {
					echo "<table style='width:100%'>
								<tr>
									<th align='left'>Paketnummer</th>
									<th align='left'>Status</th>
									<th align='left'>Senast uppdaterat</th>
								</tr>";
				} else {
					echo "Inga korvpaket håller på transporteras.";
				}
				if(mysqli_num_rows($pickresult) > 0) {
					while($row = mysqli_fetch_assoc($pickresult)) {
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								<td>Hämtat</td>
								<td>" . $row["time"] . "</td>
								<td>
									<form action='driver_packageupdate.php' method='post'>
										<input type='hidden' name='packageID' value=" . $row["packageID"] . ">
										<input type='hidden' name='driverID' value=" . $_POST["driverID"] . ">
										<input type='submit' value='Uppdatera status'>	
								</td>
							</tr>";
					}
				}
				if(mysqli_num_rows($dropresult) > 0) {
					while($row = mysqli_fetch_assoc($dropresult)) {
						echo "<tr>
								<td>" . $row["packageID"] ."</td>
								<td>Levererat</td>
								<td>" . $row["time"] . "</td>
							</tr>";
					}
					echo "</table><br>";
				}	
			?>
		</div>
		<div class = "contracts_container">
			<h2>Korvtrakt du ska transportera</h2>
			<?php
				$sql = "SELECT * FROM takes 
						WHERE driverID =" . $_POST["driverID"] . "";
				$result = mysqli_query($conn, $sql);
				if(!$result) {
					printf("Ett fel uppstod. Se till att du fyllt i rätt förarnummer.");
					exit();
				}
				if(mysqli_num_rows($result) > 0) {
					echo "<table style='width:100%'>
								<tr>
									<th align='left'>Korvtraktnummer</th>
									<th align='left'>Status</th>
								</tr>";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>" . $row["contractID"] ."</td>
								<td>Ej påbörjat leverans</td>
								<td>
									<form action='driver_contractupdate.php' method='post'>
									<input type='hidden' name='korvtraktID' value=" . $row["contractID"] . ">
									<input type='hidden' name='driverID' value=" . $_POST["driverID"] . ">
									<input type='submit' value='Uppdatera status'>
									</form>
								</td>
							</tr>";
					}
					echo "</table>";
				} else {
					echo "Inga korvtrakt tillgängliga för upphämtning.";
				}
				mysqli_close($conn);
			?>
		</div>
	</body>
</html>