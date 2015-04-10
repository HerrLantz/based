<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Hitta Korvtrakt</h1>
		</div>
		<div class ="container">
			<div id ="search_contract">
				<h2>Sök korvtrakt</h2>
				<form action="contract_searchresults.php" method="post">
					<p>E-mailadress:</p>
					<input type="email" name="buyermail" required>
					<br>
					<p>Korvtrakt ID:</p>
					<input type="number" name="korvtraktID" required>
					<br>
					<div class="continue_button">
						<input type="submit" value="Sök">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>