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
			<?php echo $_POST["Namn"]; ?>
			<?php echo $_POST["Mail"]; ?>
			<?php echo $_POST["Address"]; ?>
			<?php echo $_POST["BAN"]; ?>
			<?php echo $_POST["BRN"]; ?>
		</div>
		<form>
			
		</form>
	</div>
</body>
</html>