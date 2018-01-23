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
		} else {
			return false;
		}
	}
	public function loginAdmin($username, $password)
	{
		$sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";
		$query = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($query) > 0) {
			return true;
		} else {
			return false;
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
	public function retrieveAdminInfo($username)
	{
		$sql = "SELECT * FROM admin WHERE username ='".$username."'";
		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		return $itemArray;
	}

}


$login = new Login;

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($login->conn, $_POST['username']);
	$password = mysqli_real_escape_string($login->conn, $_POST['password']);

	if ($login->loginUser($username, md5($password))) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['type'] = 'normal';
		header("location:user/home.php");
	} else if($login->loginAdmin($username, md5($password))){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['type'] = 'admin';
		header("location:admin/home.php");
	} else {
		session_start();
		$_SESSION['error'] = "Invalid username or password.";
		header("location:index.php");
	}
}
?>