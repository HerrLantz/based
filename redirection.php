<?php
	session_start();
	array_push($_SESSION["pkg_price"], $_POST["package_price"]);
	array_push($_SESSION["pkg_height"], $_POST["package_height"]);
	array_push($_SESSION["pkg_length"], $_POST["package_length"]);
	array_push($_SESSION["pkg_width"], $_POST["package_width"]);
	array_push($_SESSION["pkg_weight"], $_POST["package_weight"]);
	array_push($_SESSION["pkg_desc"], $_POST["package_desc"]);


	if (isset($_POST["add"])) {
		header('Location: add_package.php');
	}
	if (isset($_POST["create"])) {
		header('Location: enter_contact_info.php');
	}
	exit;
?>