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
		<div class ="container">
			<div id ="search_result">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "labb2";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
					}
					//Fetch contract
					$sql = 'SELECT * FROM contract WHERE contractID = "" . $_POST["korvtraktID"]';
					$result = $conn->query($sql);
					//Display search result or error if no contract found
					if((mysqli_num_rows($result)) > 0) {
						while($row = $result->fetch_assoc()) {
							echo "id: " . $row["contractID"] . " " . $row["delivPrice"] . " " . $row["createTime"]. "<br>"; 
						}
					} else {
						echo "Inget korvtrakt hittades";
					}
					$conn->close();
				?>
			</div>	
		</div>	
	</body>
</html>