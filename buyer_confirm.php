<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Bekräfta leverans</h1>
		</div>
		<div class="container">
				<form action="buyer_confirmSQL.php" method="post">
					<p>Paketnummer:</p>
					<input type="number" name="packageID" required>
					<br>
					<p>Din e-mailadress:</p>
					<input type="email" name="buyermail" required>
					<br>
					<br>	
					<div class="continue_button">
						<input type="submit" value="Logga in">
				</form>
			</div>
		</div>
	</body>
</html>