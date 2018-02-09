<?php
/**
* 
*/
class Verification
{
	public $conn;
	function __construct()
	{
		$this->conn = mysqli_connect("localhost","root","","ark");
	}

	public function checkIfUsernameExists($username)
	{
		$sql = "SELECT * FROM user WHERE username='".$username."'";
		$query = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($query) > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function retrieveUserInfo($username)
	{
		$sql = "SELECT * FROM user WHERE username='".$username."'";
		$query = mysqli_query($this->conn, $sql);
		if ($query) {
			$row = mysqli_fetch_assoc($query);
			return $row;
		} else {
			return false;
		}
	}
	public function insertCode($code,$username)
	{
		$sql = "UPDATE user SET code='".$code."' WHERE username='".$username."'";
		$query = mysqli_query($this->conn, $sql);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	public function sendCode($contact, $code)
	{
		$ch = curl_init();
		$parameters = array(
		    'apikey' => 'cb679f4c0a2b5854601024571ea54c96', //Your API KEY
		    'number' => $contact,
		    'message' => "Your verification code is ".$code,
		    'sendername' => 'SEMAPHORE'
		);

		curl_setopt($ch, CURLOPT_URL, 'http://api.semaphore.co/api/v4/messages');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);
		return true;
		
	}
	public function verifyCode($username, $code)
	{
		$sql = "SELECT * FROM user WHERE username='".$username."' AND code='".$code."'";
		$query = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($query) > 0) {
			$update = "UPDATE user SET code=NULL WHERE username='".$username."'";
			mysqli_query($this->conn, $update);
			return true;
		} else {
			return false;
		}
	}
}

$verify = new Verification;

if (isset($_POST['verify'])) {
	$username = mysqli_real_escape_string($verify->conn, $_POST['username']);

	if ($verify->checkIfUsernameExists($username)) {
		header("location:sendCode.php?username=$username");
	}  else {
		session_start();
		$_SESSION['Error'] = "User doesn't exists";
		header("location:inputUsername.php?invalid=1");
	}
}

if (isset($_POST['sendCode'])) {
	$username = mysqli_real_escape_string($verify->conn, $_POST['username']);
	$contact = mysqli_real_escape_string($verify->conn, $_POST['contact_no']);

	$code = mt_rand(100000,999999);
	if ($verify->insertCode($code, $username)) {
		if ($verify->sendCode($contact, $code)) {
			header("location:inputCode.php?username=$username");
		}
	}
}

if (isset($_POST['verifycode'])) {
	$username = mysqli_real_escape_string($verify->conn, $_POST['username']);
	$code = mysqli_real_escape_string($verify->conn, $_POST['code']);

	if ($verify->verifyCode($username, $code)) {
		header("location:resetPassword.php?username=$username");
	} else {
		session_start();
		$_SESSION['Error'] = "Invalid code";
		header("location:inputCode.php?username=$username");
	}
}

?>