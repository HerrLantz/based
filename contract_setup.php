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
		<form>
			
		</form>
	</div>
</body>
</html>