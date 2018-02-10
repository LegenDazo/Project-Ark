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
			$row = mysqli_fetch_assoc($query);
			return $row["user_id"];
		} else {
			return false;
		}
	}
	public function loginAdmin($username, $password)
	{
		$sql = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";
		$query = mysqli_query($this->conn, $sql);

		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			return $row["id"];
		} else {
			return false;
		}
	}
	public function retrieveUserInfo($id)
	{
		$sql = "SELECT * FROM user WHERE user_id ='".$id."'";
		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		return $itemArray;
	}
	public function retrieveAdminInfo($id)
	{
		$sql = "SELECT * FROM admin WHERE id ='".$id."'";
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

	if (($id = $login->loginUser($username, md5($password))) != false) {
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
		$_SESSION['type'] = 'normal';
		header("location:user/home.php");
	} else if(($id = $login->loginAdmin($username, md5($password))) != false){
		session_start();
		$_SESSION['id'] = $id;
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