<?php

	if (isset($_POST['package_id'])) {
		$package_id = $_POST['package_id'];

		session_start();
		$_SESSION['package_id'] = $package_id;

	}

?>