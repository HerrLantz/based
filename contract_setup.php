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
			<form action="submit_contract.php" method="post">
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
					<input type="text" pattern=".{20,256}" name="package_desc" title="Beskrivningen måste vara mellan 20-256 tecken långt!" required>
				</div>
				<br>
				<?php
					echo	"<input type='hidden' name='Namn' value=" . $_POST["Namn"] . ">
							<input type='hidden' name='Mail' value=" . $_POST["Mail"] . ">
							<input type='hidden' name='Address' value=" . $_POST["Address"] . ">
							<input type='hidden' name='BAN' value=" . $_POST["BAN"] . ">
							<input type='hidden' name='BRN' value=" . $_POST["BRN"] . ">";
				?>
				<div class="continue_button">
					<input type="submit" value="Skapa Korvtrakt!">
				</div>
			</form>
		</div>
	</div>
</body>
</html>