<!DOCTYPE html>
<html>
<head>
	<link href="styles/style.css" rel="stylesheet">
	<title>Fyll i Korvtrakt</title>
</head>
<body>
	<div class="header">
		<h1>Fyll i Korvtrakt!</h1>
	</div>
	<div class="container">
		<div id="personal_info">
			<table>
				<tr>
					<th>Namn</th>
					<th>Mail</th>
					<th>Adress</th>
					<th>Bankkontonummer</th>
					<th>Clearingnummer</th>
				</tr>
				<tr>
					<td>
						<?php echo $_POST["Namn"]; ?>
					</td>
					<td>
						<?php echo $_POST["Mail"]; ?>
					</td>
					<td>
						<?php echo $_POST["Address"]; ?>
					</td>
					<td>
						<?php echo $_POST["BAN"]; ?>
					</td>
					<td>
						<?php echo $_POST["BRN"]; ?>
					</td>
				</tr>
			</table>
		</div>
		<div id="enter_contract">
			<form action="submit_contract" method="post">
				<p>Köparens Mail:</p>
				<input type="text" name="buyer_mail" required>
				<p>Köparens Address:</p>
				<input type="text" name="buyer_address" required>
				<h3>Paketinformation</h3>
				<p>Pris:</p>
				<input type="text" name="package_price" required>
				<p>Höjd (meter):</p>
				<input type="text" name="package_height" required>
				<p>Längd (meter):</p>
				<input type="text" name="package_length" required>
				<p>Bredd: (meter):</p>
				<input type="text" name="package_width" required>
				<p>Beskrivning av produkt:</p>
				<div id="prod_description">
					<input type="text" name="package_desc" required>
				</div>
			</form>
		</div>
	</div>
</body>
</html>