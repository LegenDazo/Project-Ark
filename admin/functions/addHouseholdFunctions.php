<?php
 /**
 * 
 */
 class addHousehold
 {
 	public $conn;
 	public function __construct()
 	{
 		$this->conn = mysqli_connect("localhost","root","","ark");
 	}

 }

 	$obj = new addHousehold;

 	if (isset($_POST['submithousehold'])) {
 		$house_no = mysqli_real_escape_string($obj->conn, $_POST['house_no']);
 		$street = mysqli_real_escape_string($obj->conn, $_POST['street']);
		$brgy = mysqli_real_escape_string($obj->conn, $_POST['brgy']);
		

 		if(empty($_POST['house_no'])){		
			session_start();
			$_SESSION['house_no'] = $house_no;
 			$_SESSION['street'] = $street;
 			$_SESSION['brgy'] = $brgy;
 			$_SESSION['error'] = "Please fill out House Number!";
			header("location:../addHousehold.php");
		} 

		else if(empty($_POST['street'])){		
			session_start();
			$_SESSION['house_no'] = $house_no;
 			$_SESSION['street'] = $street;
 			$_SESSION['brgy'] = $brgy;
 			$_SESSION['error'] = "Please fill out Street!";
			header("location:../addHousehold.php");
		}

		else if(empty($_POST['brgy'])){		
			session_start();
			$_SESSION['house_no'] = $house_no;
 			$_SESSION['street'] = $street;
 			$_SESSION['brgy'] = $brgy;
 			$_SESSION['error'] = "Please fill out Street!";
			header("location:../addHousehold.php");
		}


		/*
 		else if(!preg_match("/^[a-zA-Z ]*$/",$mname)) {
 			session_start();
 			$_SESSION['fname'] = $fname;
 			$_SESSION['mname'] = $mname;
 			$_SESSION['lname'] = $lname;
 			$_SESSION['bdate'] = $bdate;
 			$_SESSION['contact_no'] = $contact_no;
 			$_SESSION['username'] = $username;
 			$_SESSION['error'] = "Only letters and white space is allowed for Middle Name!";
 			header("location:../addHousehold.php");
 		} 
 		
 		else {
 			
 		}*/
 	}


?>