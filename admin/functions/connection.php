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

		public function retrieveResidentData()
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

		$fname = mysqli_real_escape_string($obj->conn, $_POST['fname']);
		$mname = mysqli_real_escape_string($obj->conn, $_POST['mname']);
		$lname = mysqli_real_escape_string($obj->conn, $_POST['lname']);
		$gender = mysqli_real_escape_string($obj->conn, $_POST['gender']);
		$bday = mysqli_real_escape_string($obj->conn, $_POST['bday']);
		$house_memship = mysqli_real_escape_string($obj->conn, $_POST['house_memship']);
		$id = mysqli_real_escape_string($obj->conn, $_POST['id']);

	//  query to update data 
	 
	echo "UPDATE resident SET fname='$fname' , mname='$mname' , lname = '$lname' , gender = '$gender' , bday = '$bday', house_memship = '$house_memship' WHERE resident_id= '$id'";

	$result  = mysqli_query($obj->conn, "UPDATE resident SET fname='$fname' , mname='$mname' , lname = '$lname' , gender = '$gender' , bday = '$bday', house_memship = '$house_memship' WHERE resident_id= '$id'");

	if($result) {
		echo 'data updated';
	}

	}
?>