<?php
/**
* 
*/
class AdminInfo
{
	public $conn;
	public function __construct()
	{
		$this->conn = mysqli_connect("localhost","root","","ark");
	}
	public function updateAdminProfile($username,$fname, $mname, $lname, $bdate)
	{
		$sql = "UPDATE admin SET fname='".$fname."',lname='".$lname."',mname='".$mname."',bday='".$bdate."' WHERE username='".$username."'";
		$query = mysqli_query($this->conn, $sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}

$admin = new AdminInfo;

if (isset($_POST['updateadmin'])) {
	$username = $_POST['username'];
	$fname = mysqli_real_escape_string($admin->conn, $_POST['fname']);
	$mname = mysqli_real_escape_string($admin->conn, $_POST['mname']);
	$lname = mysqli_real_escape_string($admin->conn, $_POST['lname']);
	$bdate = mysqli_real_escape_string($admin->conn, $_POST['bdate']);


		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
 			session_start();
 			$_SESSION['Error'] = "Only letters and white space is allowed for First Name!";
 			header("location:../viewAdminProfile.php");
 		} 
 		else if(!preg_match("/^[a-zA-Z ]*$/",$mname)) {
 			session_start();
 			$_SESSION['Error'] = "Only letters and white space is allowed for Middle Name!";
 			header("location:../viewAdminProfile.php");
 		} 
 		else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
 		 	session_start();
 			$_SESSION['Error'] = "Only letters and white space is allowed for Last Name!";
 			header("location:../viewAdminProfile.php");
 		} 
 		
		else if ($admin->updateAdminProfile($username,$fname, $mname, $lname, $bdate)) {
			session_start();
			$_SESSION['Success'] = "Your profile has been updated!";
			header("location:../viewAdminProfile.php");
		}  else {
			session_start();
			$_SESSION['Error'] = "Something went wrong. Please provide a valid input!";
			header("location:../viewAdminProfile.php");
		}
	}

?>