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
			<div id ="search_contract">
				<h2>Sök korvtrakt</h2>
				<form action="seller_sign2.php" method="post">
					<p>E-mailadress:</p>
					<input type="email" name="sellermail" required>
					<br>
					<br>
					<p>Korvtrakt ID (endast siffor):</p>
					<p><small>Detta nummer ska du ha fått skickat till din e-mail av försäljaren</small></p>
					<input type="text" pattern="[0-9]+" name="korvtraktID" title="Endast siffor tillåtna" required>
					<br><br>
					<div class="continue_button">
						<input type="submit" value="Skriv på kontrakt">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>