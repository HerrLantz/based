<!DOCTYPE html>
	<html>
	<head>
		<title>Stunna!</title>
	</head>
	<body>
		<?php
			$wadidis = "Korv";
			for ($i = 0; $i < 1000; $i++) {
				echo $wadidis . " ";
				if ($i%10 == 0) {
					echo "<br>";
				}
			}
		?>
	</body>
</html>
