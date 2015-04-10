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
				<?php
				echo "<form action='contract_payed.php' method='post'>
						<p>Kortnummer:</p>
						<input type='number' name='kortnummer' required>
						<input type='hidden' name='korvtraktID' value=" . $_POST["korvtraktID"] . ">
						<div class='continue_button'>
							<input type='submit' value='Betala'>
						</div>
					</form>";
				?>
			</div>
		</div>
	</body>
</html>