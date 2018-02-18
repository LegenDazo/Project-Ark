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
	public function updateUserProfile($id,$username,$fname, $mname, $lname, $bdate, $contact_no)
	{
		$sql = "UPDATE user SET username='".$username."',fname='".$fname."',lname='".$lname."',mname='".$mname."',bdate='".$bdate."',contact_no='".$contact_no."' WHERE user_id='".$id."'";
		$query = mysqli_query($this->conn, $sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function checkIfUsernameExistsInUser($username)
	{
		$sql = "SELECT * FROM user WHERE username='".$username."'";
		$query = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($query) > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function checkIfUsernameExistsInAdmin($username)
	{
		$sql = "SELECT * FROM admin WHERE username='".$username."'";
		$query = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($query) > 0) {
			return true;
		} else {
			return false;
		}
	}
}

$user = new UserInfo;

if (isset($_POST['updateuser'])) {
	$id = mysqli_real_escape_string($user->conn, $_POST['user_id']);

	$fname = mysqli_real_escape_string($user->conn, $_POST['fname']);
	$mname = mysqli_real_escape_string($user->conn, $_POST['mname']);
	$lname = mysqli_real_escape_string($user->conn, $_POST['lname']);
	$bdate = mysqli_real_escape_string($user->conn, $_POST['bdate']);
	$contact_no = mysqli_real_escape_string($user->conn, $_POST['contact_no']);

	
		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
 			session_start();
 			$_SESSION['Error'] = "Only letters and white space is allowed for First Name!";
 			header("location:../viewProfile.php");
 		} 
 		else if(!preg_match("/^[a-zA-Z ]*$/",$mname)) {
 			session_start();
 			$_SESSION['Error'] = "Only letters and white space is allowed for Middle Name!";
 			header("location:../viewProfile.php");
 		} 
 		else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
 		 	session_start();
 			$_SESSION['Error'] = "Only letters and white space is allowed for Last Name!";
 			header("location:../viewProfile.php");
 		} 
 		else if(!preg_match("/([0]\d{3}\d{3}\d{4})/", $contact_no)){
 			session_start();
 			$_SESSION['Error'] = "Invalid contact number.";
 			header("location:../viewProfile.php");
 		}
 		
		else if ($user->updateUserProfile($id,$username,$fname, $mname, $lname, $bdate, $contact_no)) {
			session_start();
			$_SESSION['Success'] = "User profile has been updated!";
			header("location:../viewProfile.php");
		}  else {
			session_start();
			$_SESSION['Error'] = "Something went wrong. Please provide a valid input!";
			header("location:../viewProfile.php");
		}
	}

?>