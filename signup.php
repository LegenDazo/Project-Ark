<?php
 /**
 * 
 */
 class Signup
 {
 	public $conn;
 	public function __construct()
 	{
 		$this->conn = mysqli_connect("localhost","root","","ark");
 	}

 	public function checkUsername($username)
 	{
 		$sql = "SELECT username FROM user WHERE username='".$username."'";
 		$query = mysqli_query($this->conn, $sql);
 		if (mysqli_num_rows($query) > 0) {
 			return true;
 		} else {
 			return false;
 		}
 	}
 	public function checkUsernameInAdmin($username)
 	{
 		$sql = "SELECT username FROM admin WHERE username='".$username."'";
 		$query = mysqli_query($this->conn, $sql);
 		if (mysqli_num_rows($query) > 0) {
 			return true;
 		} else {
 			return false;
 		}
 	}
 	public function insertUser($fname,$mname,$lname,$bdate,$contact_no,$username,$password)
 	{
 		$sql = "INSERT INTO user (username,password,fname,mname,lname,bdate,contact_no) VALUES ('".$username."','".$password."','".$fname."','".$mname."','".$lname."','".$bdate."','".$contact_no."')";
 		$query = mysqli_query($this->conn, $sql);
 		if ($query) {
 			return true;
 		} else {
 			return false;
 		}
 	}

 }

 	$signup = new Signup;

 	if (isset($_POST['signup'])) {
 		$fname = mysqli_real_escape_string($signup->conn, $_POST['fname']);
 		$mname = mysqli_real_escape_string($signup->conn, $_POST['mname']);
 		$lname = mysqli_real_escape_string($signup->conn, $_POST['lname']);
 		$bdate = mysqli_real_escape_string($signup->conn, $_POST['bdate']);
 		$contact_no = mysqli_real_escape_string($signup->conn, $_POST['contact_no']);
 		$username = mysqli_real_escape_string($signup->conn, $_POST['username']);
 		$password = mysqli_real_escape_string($signup->conn, $_POST['password']);
 		$confirmpassword = mysqli_real_escape_string($signup->conn, $_POST['confirmpassword']);

 		if ($signup->checkUsernameInAdmin($username)) {
 			session_start();
 			$_SESSION['error'] = "Username already taken!";
 			header("location:index.php");
 		} else if ($signup->checkUsername($username)) {
 			session_start();
 			$_SESSION['error'] = "Username already taken!";
 			header("location:index.php");
 		} else if ($password == $confirmpassword) {
 			if ($signup->insertUser($fname,$mname,$lname,$bdate,$contact_no,$username,$password)) {
 				session_start();
 				$_SESSION['username'] = $username;
 				header("location:user/home.php");
 			} else {
 				session_start();
	 			$_SESSION['error'] = "Something went wrong! Please try again!";
	 			header("location:index.php");
 			}
 		} else {
 			session_start();
 			$_SESSION['error'] = "Password and Confirm Password don't match!";
 			header("location:index.php");
 		}
 	}


?>