<!DOCTYPE html>
<html>
	<head>
		<link href="styles/style.css" rel="stylesheet">
		<title>Stunna!</title>
	</head>
	<body>
		<div class="header">
			<h1>Transportera korv</h1>
		</div>
		<div class="container">
			<h2>Fyll i dina uppgifter</h2>
			<?php
			echo "<form action='driver_confirm.php' method='post'>
				<p>Bankkontonummer:</p>
				<input type='number' name='BAN' required>
				<br>
				<p>Clearingnummer:</p>
				<input type='number' name='BRN' required>
				<input type='hidden' name='korvtraktID' value=" . $_POST["korvtraktID"] . ">
				<br>
				<div class='continue_button'>
					<input type='submit' value='Fortsätt'>
				</div>
			</form>"
			?>
		</div>
	</body>
</html>