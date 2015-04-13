<!DOCTYPE html>
	<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Köp korv nu!</h1>
		</div>
		<div class="container">
			<div id="create_contract">
				<h2>Skapa korvtrakt</h2>
				<form action="contract_setup.php" method="post">
					<p>Namn:</p>
					<input type="text" name="Namn" required>
					<br>
					<p>Mail:</p>
					<input type="text" name="Mail" title="Exempelmail: korv@korv.se" required>
					<br>
					<p>Adress:</p>
					<input type="text" name="Address" required>
					<br>
					<p>Bankkontonummer:</p>
					<input type="text" pattern="[0-9]+" name="BAN" title="Endast siffor tillåtna" required>
					<br>
					<p>Clearingnummer:</p>
					<input type="text" pattern="[0-9]+" name="BRN" title="Endast siffor tillåtna" required>
					<br><br>
					<div class="continue_button">
						<input type="submit" value="Fortsätt">
					</div>
				</form>
			</div>
			<div id="find_contract">
				<h2>Hitta korvtrakt</h2>
				<p>
					Här kan du hitta ett korvtrakt som passar dig!
					Det finns en stor variation bland olika korvtyper
					från olika korvtillverkare.
				</p>
				<br>
				<a href="find_contract.php">Klicka här!</a>
			</div>
		</div>
	</body>
</html>