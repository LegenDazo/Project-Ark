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
	public function retrieveUserInfo($username)
	{
		$sql = "SELECT * FROM user WHERE username ='".$username."'";
		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		return $itemArray;
	}
}


$obj = new Login;

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($obj->conn, $_POST['username']);
	$password = mysqli_real_escape_string($obj->conn, $_POST['password']);

	if ($obj->loginUser($username, $password)) {
		session_start();
		$_SESSION['username'] = $username;
		header("location:user/home.php");
	} else {
		session_start();
		$_SESSION['error'] = "Invalid username or password.";
		header("location:index.php");
	}
}
?>