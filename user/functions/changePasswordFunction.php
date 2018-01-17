<?php
	/**
	* 
	*/
	class password
	{
		public $conn;	
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root","", "ark");
		}
		public function confirmCurrentPassword($currentPassword, $username)
		{
			$sql = "SELECT * FROM user WHERE username ='".$username."' AND password='".$currentPassword."'";
			$query = mysqli_query($this->conn, $sql);
			if (mysqli_num_rows($query) > 0) {
				return true;
			} else {
				return false;
			}
		}
		public function updatePassword($username, $newPassword)
		{
			$sql = "UPDATE user SET password ='".$newPassword."' WHERE username ='".$username."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			}
		}
	}

	$pass = new password;

	if (isset($_POST['changePassword'])) {
		$username = mysqli_real_escape_string($pass->conn, $_POST['username']);
		$currentPassword = mysqli_real_escape_string($pass->conn, $_POST['curPassword']);
		$newPassword = mysqli_real_escape_string($pass->conn, $_POST['newPassword']);
		$confirmPassword = mysqli_real_escape_string($pass->conn, $_POST['conPassword']);

		if ($pass->confirmCurrentPassword($currentPassword, $username)) {
			if ($newPassword == $confirmPassword) {
				if($pass->updatePassword($username, $newPassword)){
					session_start();
					$_SESSION['Notice'] = "Password updated successfully!";
					header("location: ../changePassword.php");
				} else {
			session_start();
			$_SESSION['Notice'] = "Something went wrong! Please try again!";
			header("location:../changePassword.php");

			}

		} else {
			session_start();
			$_SESSION['Notice'] = "The value of 'New Password' and 'Confirm Password' don't match!";
			header("location:../changePassword.php");
		}

	} else {
			session_start();
			$_SESSION['Notice'] = "The 'Current Password' you typed was invalid!";
			header("location:../changePassword.php");
		}
}

?>