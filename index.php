<?php
switch (strtolower(key($_GET))){
	case 'signup':
		include './user/pages/login2.php';
		break;
	case 'login':
		include './user/pages/login2.php';
		break;
	case 'logout':
		include 'user/functions/logout.php';
		break;
	default:
		include './user/home.php';
		break;
}
?>