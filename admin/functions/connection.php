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
	
	if(isset($_POST['household_id'])){

		$adult_fname = $_POST['adult_fname'];
		$adult_mname = $_POST['adult_mname'];
		$adult_lname = $_POST['adult_lname'];
		$adult_gender = $_POST['adult_gender'];
		$adult_bday = $_POST['adult_bday'];
		$adult_age = $_POST['adult_age'];

		$house_memship = $_POST['house_memship'];

		//$brgy_id = $_POST['brgy_id'];
		//$admin_id = $_POST['admin_id'];
		//$household_id = $_POST['household_id'];
		//$user_id = $_POST['user_id'];

		//$house_no = $_POST['house_no'];
		//$street = $_POST['street'];
		
		$household_id = $_POST['household_id'];
		//$id = $_POST['id'];

	//  query to update data 
	 
	/*	
	$result  = mysqli_query($conn , "UPDATE resident SET adult_fname='$adult_fname' , adult_mname='$adult_mname' , adult_lname = '$adult_lname' , adult_gender = '$adult_gender' , adult_bday = '$adult_bday' , adult_age = '$adult_age' , house_memship = '$house_memship', brgy_id='$brgy_id' , admin_id='$admin_id' , household_id='$household_id' , user_id='$user_id' , house_no = '$house_no', street = '$street', brgy_name = '$brgy_name', city = '$city', province = '$province' WHERE household_id='$household_id'");
	if($result){
		echo 'data updated';
	}*/

	$result  = mysqli_query($conn , "UPDATE resident SET adult_fname='$adult_fname' , adult_mname='$adult_mname' , adult_lname = '$adult_lname' , adult_gender = '$adult_gender' , adult_bday = '$adult_bday' , adult_age = '$adult_age' , house_memship = '$house_memship', WHERE household_id='$household_id'");
	if($result){
		echo 'data updated';
	}

	}
?>