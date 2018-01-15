<?php

/**
* 
*/
class Login
{
	public $conn;
	public function __construct()
	{
		$this->conn = mysqli_connect("localhost", "root", "", "ark");
	}

	public function loginUser($username, $password)
	{
		$sql = "SELECT * FROM user WHERE username='".$username."' AND password ='".$password."'";
		$query = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($query) > 0) {
			return true;
		}
	}
}


$obj = new Login;

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($obj->conn, $_POST['username']);
	$password = mysqli_real_escape_string($obj->conn, $_POST['password']);

	if ($obj->loginUser($username, $password)) {
		header("location:user/home.php");
	} else {
		header("location:index.php?error");
	}
}
?>