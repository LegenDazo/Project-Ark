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
			} else {
				return false;
			}
		}
		
		public function resetPassword($username, $newpassword)
		{
			$sql = "UPDATE user SET password='".$newpassword."' WHERE username='".$username."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}
	}

	$pass = new password;

	if (isset($_POST['changePassword'])) {
		$username = mysqli_real_escape_string($pass->conn, $_POST['username']);
		$currentPassword = mysqli_real_escape_string($pass->conn, $_POST['curPassword']);
		$newPassword = mysqli_real_escape_string($pass->conn, $_POST['newPassword']);
		$confirmPassword = mysqli_real_escape_string($pass->conn, $_POST['conPassword']);


		if ($pass->confirmCurrentPassword(md5($currentPassword), $username)) {
			if ($currentPassword == $newPassword) {
					session_start();
					$_SESSION['Error'] = "Please create another password!";
					header("location: ../changePassword.php");
			}
			else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,50}$/', $newPassword)){
		 			session_start();
		 			$_SESSION['Error'] = "Password must contain letters and numbers!";
		 			header("location:../changePassword.php");
		 	}
			else if ($newPassword == $confirmPassword) {
				
				if($pass->updatePassword($username, md5($newPassword))){
					session_start();
					$_SESSION['Success'] = "Password updated successfully!";
					header("location: ../changePassword.php");
				} else {
					session_start();
					$_SESSION['Error'] = "Something went wrong! Please try again!";
					header("location:../changePassword.php");
				}

			} else if($newPassword != $confirmPassword){
				session_start();
				$_SESSION['Error'] = "The value of 'New Password' and 'Confirm Password' don't match!";
				header("location:../changePassword.php");
			}

	} else {
			session_start();
			$_SESSION['Error'] = "The 'Current Password' you typed was invalid!";
			header("location:../changePassword.php");
		}
}

if (isset($_POST['resetPassword'])) {
	$newpassword = mysqli_real_escape_string($pass->conn, $_POST['newpassword']);
	$retpassword = mysqli_real_escape_string($pass->conn, $_POST['retpassword']);
	$username = mysqli_real_escape_string($pass->conn, $_POST['username']);

	 if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,50}$/', $newpassword)){
		session_start();
		$_SESSION['Error'] = "Password must contain letters and numbers.";
		header("location: ../../resetPassword.php?username=$username;");
	} else if ($newpassword == $retpassword) {
		if ($pass->resetPassword($username, md5($newpassword))) {
			header("location: ../../passwordReset.php?reset=1");
		} else {
			session_start();
			$_SESSION['Error'] = "Something went wrong.";
			header("location: ../../resetPassword.php?username=$username");
		}
	}
	else if($newpassword != $retpassword){
		session_start();
		$_SESSION['Error'] = "Passwords don't match!";
		header("location: ../../resetPassword.php?username=$username");
	}
}

?>