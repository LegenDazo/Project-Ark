<?php
/**
* 
*/
class UserInfo
{
	public $conn;
	public function __construct()
	{
		$this->conn = mysqli_connect("localhost","root","","ark");
	}
	public function updateUserProfile($username,$fname, $mname, $lname, $bdate, $contact_no)
	{
		$sql = "UPDATE user SET fname='".$fname."',lname='".$lname."',mname='".$mname."',bdate='".$bdate."',contact_no='".$contact_no."' WHERE username='".$username."'";
		$query = mysqli_query($this->conn, $sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}

$user = new UserInfo;

if (isset($_POST['updateuser'])) {
	$username = $_POST['username'];
	$fname = mysqli_real_escape_string($user->conn, $_POST['fname']);
	$mname = mysqli_real_escape_string($user->conn, $_POST['mname']);
	$lname = mysqli_real_escape_string($user->conn, $_POST['lname']);
	$bdate = mysqli_real_escape_string($user->conn, $_POST['bdate']);
	$contact_no = mysqli_real_escape_string($user->conn, $_POST['contact_no']);

	if ($user->updateUserProfile($username,$fname, $mname, $lname, $bdate, $contact_no)) {
		session_start();
		$_SESSION['Notice'] = "User profile has been updated!";
		header("location:../viewProfile.php");
	}  else {
		session_start();
		$_SESSION['Notice'] = "Something went wrong. Please provide a valid input!";
		header("location:../viewProfile.php");
	}
}

?>