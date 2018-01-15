<?php
	Class HouseholdData
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}


		public function retrieveHouseholdItems($household_id)
		{
			$sql = "SELECT * FROM resident WHERE household_id = '".$household_id."'";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveHouseholdData()
		{
			$sql = "SELECT * FROM resident";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

	}

	$obj = new HouseholdData;
	
	if(isset($_POST['house_memship'])){

		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$bday = $_POST['bday'];
	//	$adult_age = $_POST['adult_age'];

		$house_memship = $_POST['house_memship'];

		//$brgy_id = $_POST['brgy_id'];
		//$admin_id = $_POST['admin_id'];
		//$household_id = $_POST['household_id'];
		//$user_id = $_POST['user_id'];

		//$house_no = $_POST['house_no'];
		//$street = $_POST['street'];
		
		$id = $_POST['id'];
		//$id = $_POST['id'];

	//  query to update data 
	 
	/*	
	$result  = mysqli_query($conn , "UPDATE resident SET adult_fname='$adult_fname' , adult_mname='$adult_mname' , adult_lname = '$adult_lname' , adult_gender = '$adult_gender' , adult_bday = '$adult_bday' , adult_age = '$adult_age' , house_memship = '$house_memship', brgy_id='$brgy_id' , admin_id='$admin_id' , household_id='$household_id' , user_id='$user_id' , house_no = '$house_no', street = '$street', brgy_name = '$brgy_name', city = '$city', province = '$province' WHERE household_id='$household_id'");
	if($result){
		echo 'data updated';
	}*/

	$result  = mysqli_query($obj->conn, "UPDATE resident SET fname='$fname' , mname='$mname' , lname = '$lname' , gender = '$gender' , bday = '$bday', house_memship = '$house_memship' WHERE resident_id= '$id'");
	if($result) {
		echo 'data updated';
	}

	}
?>