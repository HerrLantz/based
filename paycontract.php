<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Betala Korvtrakt</h1>
		</div>
		<div class ="container">
			<div id ="pay_contract">
				<form action="contract_payed.php" method="post">
					<p>Kortnummer</p>
					<input type="number" name="kortnummer" required>
					<br>
					<div class="continue_button">
						<input type="submit" value="Betala">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>