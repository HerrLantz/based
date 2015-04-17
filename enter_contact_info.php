<!DOCTYPE html>
<html>
<head>
	<link href="styles/style.css" rel="stylesheet">
	<title>Fyll i kontakt information</title>
</head>
<body>
	<div class="header">
		<h1>Köp korv nu!</h1>
	</div>
	<div class="container">
		<form action="submit_contract.php" method="post">
			<h2>Fyll i dina personuppgifter</h2>
			<p>Namn:</p>
			<input type="text" name="Namn" required>
			<br><br>
			<p>Mail:</p>
			<input type="email" name="Mail" title="Exempelmail: korv@korv.se" required>
			<br><br>
			<p>Adress:</p>
			<input type="text" name="Address" required>
			<br><br>
			<p>Bankkontonummer:</p>
			<input type="text" pattern="[0-9]+" name="BAN" title="Endast siffor tillåtna" required>
			<br><br>
			<p>Clearingnummer:</p>
			<input type="text" pattern="[0-9]+" name="BRN" title="Endast siffor tillåtna" required>
			<br><br>
			<h2>Fyll i köparens personuppgifter</h2>
			<p>Köparens Mail:</p>
			<input type="email" name="buyer_mail" title="Exempelmail: korv@korv.se" required>
			<br><br>
			<p>Köparens Address:</p>
			<input type="text" name="buyer_address" required>
			<br><br>
			<div class="continue_button">
				<input type="submit" value="Fortsätt">
			</div>
		</form>
	</div>
</body>
</html>