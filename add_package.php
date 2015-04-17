<!DOCTYPE html>
<html>
<head>
	<title>Lägg till paket</title>
	<link href="styles/style.css" rel="stylesheet">
</head>
<body>
	<div class="header">
		<h1>Köp korv nu!</h1>
	</div>
	<div class="container">
		<div id="enter_contract">
			<form action="redirection.php" method="post">
				<h3>Uppgifter om köparen</h3>
				<p>Köparens Mail:</p>
				<input type="email" name="buyer_mail" title="Exempelmail: korv@korv.se" required>
				<p>Köparens Address:</p>
				<input type="text" name="buyer_address" required>
				<h3>Paketinformation</h3>
				<p>Pris:</p>
				<input type="text" pattern="[0-9]+" name="package_price" title="Endast siffor tillåtna" required>
				<p>Höjd (meter):</p>
				<input type="text" pattern="[0-9]+" name="package_height" title="Endast siffor tillåtna" required>
				<p>Längd (meter):</p>
				<input type="text" pattern="[0-9]+" name="package_length" title="Endast siffor tillåtna" required>
				<p>Bredd: (meter):</p>
				<input type="text" pattern="[0-9]+" name="package_width" title="Endast siffor tillåtna" required>
				<p>Vikt (kg):</p>
				<input type="text" pattern="[0-9]+" name="package_weight" title="Endast siffor tillåtna" required>
				<p>Beskrivning av produkt:</p>
				<div id="prod_description">
					<input type="text" pattern=".{10,256}" name="package_desc" title="Beskrivningen måste vara mellan 20-256 tecken långt!" required>
				</div>
				<br>
				<div class="continue_button">
					<input type="submit" value="Skapa Korvtrakt!" name="create">
					<input type="submit" value="Lägg till paket!" name="add">
				</div>
	</div>
</body>
</html>