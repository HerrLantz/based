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
						printf("Inget korvtrakt hittades! Se till att du fyllt i rätt korvtraktnummer.");
						//SQL Error message. Use for debuging only!
    					//printf("Error: %s\n", mysqli_error($conn));
    					exit();
					}
					//Display search result or error if no contract found
					if((mysqli_num_rows($result)) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "ID: " . $row["contractID"] . "<br>";
							echo "Korv Pris: " . $row["packagePrice"] . " SEK<br>";
							echo "Korv Frakt: " . $row["delivPrice"] . " SEK<br>";
							echo "Korvtrakt upprättat: " . $row["createTime"]. "<br>"; 

							//Used to send the buyers inputted korvtraktID to the next page so
							//we can use it to register the contract as payed in the database.
							echo "<div class='pay_form'>
									<form action ='paycontract.php' method='post'>
										<input type='hidden' name='korvtraktID' value=" . $_POST["korvtraktID"] . ">
										<br>
										<div class='pay_button'>
											<input type='submit' value='Betala Korvtrakt'
							 			</div>
								</div>";
						}
					} else {
						echo "Inget korvtrakt hittades! Se till att du fyllt i rätt korvtraktnummer.";
					} 
					mysqli_close($conn);
				?>
			</div>
		</div>	
	</body>
</html>