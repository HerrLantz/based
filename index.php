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
		<!--
			<div id="create_contract">
				<h2>Skapa korvtrakt</h2>
				<form action="contract_setup.php" method="post">
					<p>Namn:</p>
					<input type="text" name="Namn" required>
					<br>
					<p>Mail:</p>
					<input type="email" name="Mail" title="Exempelmail: korv@korv.se" required>
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
			-->
			<div id="buttons">
				<ul>
					<li id="find_contract">
						<a href="find_contract.php"><h3>Hitta korvtrakt</h3></a>
					</li>
					<br>
					<li>
						<a href="find_contract.php"><h3>Skapa kontrakt</h3></a>
					</li>
					<br>
					<li id="login_as_driver">
						<a href="driver_login.php"><h3>Logga in som förare</h3></a>
					</li>
					<br>
					<li id="find_contract_as_driver">
						<a href="driver_findcontract.php"><h3>Hitta paket att hämta</h3></a>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>