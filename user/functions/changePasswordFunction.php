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
			$sql = "SELECT * FROM user WHERE username ='".$username." AND password='".$currentPassword."'";
			$query = mysqli_query($this->conn, $sql);
			if (mysqli_num_rows($query) > 0) {
				return true;
			}
		}
		public function updatePassword($username, $newPassword)
		{
			$sql = "UPDATE user SET password ='".$newPassword." WHERE username ='".$username."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			}
		}
	}

	$obj = new password;

	if (isset($_POST['changePassword'])) {
		$username = mysqli_real_escape_string($obj->conn, $_POST['username']);
		$currentPassword = mysqli_real_escape_string($obj->conn, $_POST['curPassword']);
		$newPassword = mysqli_real_escape_string($obj->conn, $_POST['newPassword']);
		$confirmPassword = mysqli_real_escape_string($obj->conn, $_POST['conPassword']);

		if ($obj->confirmCurrentPassword($currentPassword, $username)) {
			if ($newPassword == $confirmPassword) {
				if($obj->updatePassword($username, $newPassword)){
					header("location: ../changePassword.php?updated");
				}
			}
		}

	}


?>