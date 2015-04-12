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
					
				<p>Köparens Address:</p>
				<h3>Paketinformation</h3>
				<p>Pris:</p>
				<p>Höjd (meter):</p>
				<p>Längd (meter):</p>
				<p>Bredd: (meter):</p>
				<p>Beskrivning av produkt:</p>
				<div id="prod_description">
				</div>
			</form>
		</div>
	</div>
</body>
</html>