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
 	public function insertUser($gender,$fname,$mname,$lname,$bdate,$contact_no,$username,$password)
 	{
 		$sql = "INSERT INTO user (gender,username,password,fname,mname,lname,bdate,contact_no) VALUES ('".$gender."','".$username."','".$password."','".$fname."','".$mname."','".$lname."','".$bdate."','".$contact_no."')";
 		$query = mysqli_query($this->conn, $sql);
 		if ($query) {
 			$last_id = mysqli_insert_id($this->conn);
 			return $last_id;
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
		 $gender = mysqli_real_escape_string($signup->conn, $_POST['gender']);
 		$bdate = mysqli_real_escape_string($signup->conn, $_POST['bdate']);
 		$contact_no = mysqli_real_escape_string($signup->conn, $_POST['contact_no']);
 		$username = mysqli_real_escape_string($signup->conn, $_POST['username']);
 		$password = mysqli_real_escape_string($signup->conn, $_POST['password']);
 		$confirmpassword = mysqli_real_escape_string($signup->conn, $_POST['confirmpassword']);

 		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Only letters and white space is allowed for First Name!";
 			header("location:index.php");
 		} 

 		else if(!preg_match("/^[a-zA-Z ]*$/",$mname)) {
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Only letters and white space is allowed for Middle Name!";
 			header("location:index.php");
 		} 
 		else if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
 		 	session_start();
 		 	$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Only letters and white space is allowed for Last Name!";
 			header("location:index.php");
 		}

 		else if(empty($_POST['fname'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
			$_SESSION['error'] = "Please fill out First Name!";
			header("location:index.php");
		}

		else if(empty($_POST['mname'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
			$_SESSION['error'] = "Please fill out Middle Name!";
			header("location:index.php");
		}		

		else if(empty($_POST['lname'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
			$_SESSION['error'] = "Please fill out Last Name!";
			header("location:index.php");
		}
		 
		else if(empty($_POST['bdate'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['gender'] = $gender;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
			$_SESSION['error'] = "Please enter Birthdate!";
			header("location:index.php");
		}

		else if(empty($_POST['contact_no'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['gender'] = $gender;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
			$_SESSION['error'] = "Please enter a Contact Number!";
			header("location:index.php");
		}

		else if(empty($_POST['username'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
			$_SESSION['error'] = "Please enter a Username!";
			header("location:index.php");
		}

		else if(empty($_POST['password'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Please enter a Password and Confirm Password!";
			header("location:index.php");
		}

		else if(empty($_POST['confirmpassword'])){		
			session_start();
			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Please enter a Password and Confirm Password!";
			header("location:index.php");
		}
 
 		else if(!preg_match("/([0]\d{3}\d{3}\d{4})/", $contact_no)){
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Invalid contact number.Please refer to the example below.";
 			header("location:index.php");
 		}
 		else if ($signup->checkUsernameInAdmin($username)) {
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Username already taken!";
 			header("location:index.php");
 		}
 		else if ($signup->checkUsername($username)) {
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Username already taken!";
 			header("location:index.php");
 		} 
 		else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,50}$/', $password)){
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Password must contain letters and numbers!";
 			header("location:index.php");
 		}
 		else if ($password == $confirmpassword) {
 			if (($id = $signup->insertUser($gender, $fname,$mname,$lname,$bdate,$contact_no,$username,md5($password))) != false) {
				 session_start();
				 $_SESSION['id'] = $id;
				 $_SESSION['gender'] = $gender;
 				$_SESSION['fname'] = $fname;
	 			$_SESSION['mname'] = $mname;
	 			$_SESSION['lname'] = $lname;
	 			$_SESSION['bdate'] = $bdate;
	 			$_SESSION['contact_no'] = $contact_no;
	 			$_SESSION['username'] = $username;
	 				$_SESSION['username'] = $username;
	 				$_SESSION['type'] = 'normal';
 			header("location:user/home.php");
 			} else {
 				session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
	 			$_SESSION['error'] = "Something went wrong! Please try again! ".$id;
	 			header("location:index.php");
 			}
 		} 
 		else {
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Password and Confirm Password don't match!";
 			header("location:index.php");
 		}
 	}


?>