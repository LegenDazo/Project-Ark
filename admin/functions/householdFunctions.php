<?php
	Class DataOperations
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertHousehold($brgy_id, $admin_id, $household_id, $user_id, $house_no, $street)
		{
			$sql = "INSERT INTO resident (brgy_id, admin_id, household_id, user_id, house_no, street, health_status) VALUES ('".$brgy_id."','".$admin_id."','".$household_id."','".$user_id."','".$house_no."','".$street."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveHouseholdItems($id)
		{
			$sql = "SELECT * FROM resident WHERE id = '".$id."'";
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

		public function updateHousehold($brgy_id, $admin_id, $household_id, $user_id, $house_no, $street)
										
		{

			$sql = "UPDATE resident SET id='".$id."',brgy_id='".$brgy_id."',admin_id='".$admin_id."',household_id='".$household_id."',user_id='".$user_id."',house_no='".$house_no."',street='".$street."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function deleteHousehold($id)
		{
			$sql = "DELETE FROM resident WHERE id='".$id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}
	}

	$obj = new DataOperations;

	if (isset($_POST['submithousehold'])) {

		//$resident_id = mysqli_real_escape_string($obj->conn, $_POST['resident_id']);

		$id = mysqli_real_escape_string($obj->conn, $_POST['id']);
		//$admin_id = mysqli_real_escape_string($obj->conn, $_POST['admin_id']);
		//$user_id = mysqli_real_escape_string($obj->conn, $_POST['user_id']);
	
		//$head_id = mysqli_real_escape_string($obj->conn, $_POST['head_id']);
		//$head_fname = mysqli_real_escape_string($obj->conn, $_POST['head_fname']);
		//$head_mname = mysqli_real_escape_string($obj->conn, $_POST['head_mname']);
		//$head_lname = mysqli_real_escape_string($obj->conn, $_POST['head_lname']);
		//$head_gender = mysqli_real_escape_string($obj->conn, $_POST['head_gender']);
		//$head_bday = mysqli_real_escape_string($obj->conn, $_POST['head_bday']);
		//$head_age = mysqli_real_escape_string($obj->conn, $_POST['head_age']);


		//$spouse_id = mysqli_real_escape_string($obj->conn, $_POST['spouse_id']);
		//$spouse_fname = mysqli_real_escape_string($obj->conn, $_POST['spouse_fname']);
		//$spouse_mname = mysqli_real_escape_string($obj->conn, $_POST['spouse_mname']);
		//$spouse_lname = mysqli_real_escape_string($obj->conn, $_POST['spouse_lname']);
		//$spouse_gender = mysqli_real_escape_string($obj->conn, $_POST['spouse_gender']);
		//$spouse_bday = mysqli_real_escape_string($obj->conn, $_POST['spouse_bday']);
		//$spouse_age = mysqli_real_escape_string($obj->conn, $_POST['spouse_age']);
		
		//$house_memship = mysqli_real_escape_string($obj->conn, $_POST['house_memship']);
		$brgy_id = mysqli_real_escape_string($obj->conn, $_POST['brgy_id']);
		$admin_id = mysqli_real_escape_string($obj->conn, $_POST['admin_id']);
		$household_id = mysqli_real_escape_string($obj->conn, $_POST['household_id']);
		$user_id = mysqli_real_escape_string($obj->conn, $_POST['user_id']);

		$house_no = mysqli_real_escape_string($obj->conn, $_POST['house_no']);
		$street = mysqli_real_escape_string($obj->conn, $_POST['street']);
		$health_status = mysqli_real_escape_string($obj->conn, $_POST['health_status']);
		
		
		if ($obj->insertHousehold($brgy_id, $admin_id, $household_id, $user_id, $house_no, $street)) {
			header("location:reliefHousehold.php?inserted=1");
		}
	}

	if (isset($_POST['updatehousehold'])) {

		$id = mysqli_real_escape_string($obj->conn, $_GET['id']);
		//$admin_id = mysqli_real_escape_string($obj->conn, $_POST['admin_id']);
		//$user_id = mysqli_real_escape_string($obj->conn, $_POST['user_id']);
	
		//$head_id = mysqli_real_escape_string($obj->conn, $_POST['head_id']);
		//$head_fname = mysqli_real_escape_string($obj->conn, $_POST['head_fname']);
		//$head_mname = mysqli_real_escape_string($obj->conn, $_POST['head_mname']);
		//$head_lname = mysqli_real_escape_string($obj->conn, $_POST['head_lname']);
		//$head_gender = mysqli_real_escape_string($obj->conn, $_POST['head_gender']);
		//$head_bday = mysqli_real_escape_string($obj->conn, $_POST['head_bday']);
		//$head_age = mysqli_real_escape_string($obj->conn, $_POST['head_age']);


		//$spouse_id = mysqli_real_escape_string($obj->conn, $_POST['spouse_id']);
		//$spouse_fname = mysqli_real_escape_string($obj->conn, $_POST['spouse_fname']);
		//$spouse_mname = mysqli_real_escape_string($obj->conn, $_POST['spouse_mname']);
		//$spouse_lname = mysqli_real_escape_string($obj->conn, $_POST['spouse_lname']);
		//$spouse_gender = mysqli_real_escape_string($obj->conn, $_POST['spouse_gender']);
		//$spouse_bday = mysqli_real_escape_string($obj->conn, $_POST['spouse_bday']);
		//$spouse_age = mysqli_real_escape_string($obj->conn, $_POST['spouse_age']);
		
		//$house_memship = mysqli_real_escape_string($obj->conn, $_POST['house_memship']);

		$brgy_id = mysqli_real_escape_string($obj->conn, $_POST['brgy_id']);
		$admin_id = mysqli_real_escape_string($obj->conn, $_POST['admin_id']);
		$household_id = mysqli_real_escape_string($obj->conn, $_POST['household_id']);
		$user_id = mysqli_real_escape_string($obj->conn, $_POST['user_id']);

		$house_no = mysqli_real_escape_string($obj->conn, $_POST['house_no']);
		$street = mysqli_real_escape_string($obj->conn, $_POST['street']);
		
		
		
		if ($obj->updateHousehold($brgy_id, $admin_id, $household_id, $user_id, $house_no, $street)) {
			header("location:viewHouseholdDetails.php?updated=1&id=$id");
		}
		
	}

	if (isset($_GET['deletehousehold'])) {
		$id = mysqli_real_escape_string($obj->conn, $_GET['id']);

		
			if ($obj->deleteHousehold($id)) {
			header("location:reliefHousehold.php?deleted=1");
		}		
	}

	if (isset($_GET['receivehousehold'])) {
		$id = mysqli_real_escape_string($obj->conn, $_GET['id']);

		
			if ($obj->receiveHousehold($id)) {
			header("location:reliefHousehold.php?received=1");
		}		
	}
?>