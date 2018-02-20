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
			$sql = "SELECT * FROM household";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}


		public function retrieveHouseholdDataByID($household_id)
		{
			$sql = "SELECT * FROM household WHERE household_id = ".$household_id;
			$query = mysqli_query($this->conn, $sql);
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function updateHousehold($brgy_id, $household_id, $street, $house_no)						
		{

			$sql = "UPDATE household SET brgy_id=".$brgy_id.", house_no=".$house_no.", street='".$street."' WHERE household_id = ".$household_id."";
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

		public function deleteMember($resident_id)
		{
			$sql = "UPDATE resident SET household_id = NULL WHERE resident_id='".$resident_id."'";
			$query = mysqli_query($this->conn, $sql);
			if($query){
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

	}

	$house = new DataOperations;



	if (isset($_POST['submithousehold'])) {	

		$id = mysqli_real_escape_string($house->conn, $_POST['id']);
		$brgy_id = mysqli_real_escape_string($house->conn, $_POST['brgy_id']);
		$admin_id = mysqli_real_escape_string($house->conn, $_POST['admin_id']);
		$household_id = mysqli_real_escape_string($house->conn, $_POST['household_id']);
		$user_id = mysqli_real_escape_string($house->conn, $_POST['user_id']);
		$house_no = mysqli_real_escape_string($house->conn, $_POST['house_no']);
		$street = mysqli_real_escape_string($house->conn, $_POST['street']);
		$health_status = mysqli_real_escape_string($house->conn, $_POST['health_status']);		
		
		
		if ($house->insertHousehold($brgy_id, $admin_id, $household_id, $user_id, $house_no, $street)) {
			header("location:reliefHousehold.php?inserted=1");
		} 

	}

	if (isset($_POST['updatehousehold'])) {

		$brgy_id = mysqli_real_escape_string($house->conn, $_POST['brgy_id']);	
		$household_id = mysqli_real_escape_string($house->conn, $_GET['household_id']);
		$house_no = mysqli_real_escape_string($house->conn, $_POST['house_no']);
		$street = mysqli_real_escape_string($house->conn, $_POST['street']);
		
	//	$sql = "UPDATE household SET brgy_id=".$brgy_id.", house_no=".$house_no.", street='".$street."' WHERE household_id = ".$household_id."";
	//	$query = mysqli_query($house->conn, $sql);
	//	if ($query) {
	//		header("location: ../updateHousehold.php?household_id=".$household_id."");
	//	} 

		if(empty($_POST['house_no']) || empty($_POST['street']) || empty($_POST['brgy_id']) ){		
			session_start();
			$_SESSION['error'] = "Please fill out this field!";
			header("location:../updateHousehold.php?household_id=$household_id");
		} else if($house->updateHousehold($brgy_id, $household_id, $street, $house_no)) {
			session_start();
			$_SESSION['success'] = "Household has been updated!";
			header("location:../updateHousehold.php?household_id=$household_id");
		}

		else {
			echo mysqli_error($house->conn);
		}	
	}

	if (isset($_GET['deletehousehold'])) {
		$id = mysqli_real_escape_string($house->conn, $_GET['id']);

		
			if ($house->deleteHousehold($id)) {
			header("location:reliefHousehold.php?deleted=1");
		}		
	}

	if (isset($_GET['receivehousehold'])) {
		$id = mysqli_real_escape_string($house->conn, $_GET['id']);

		
			if ($house->receiveHousehold($id)) {
			header("location:reliefHousehold.php?received=1");
		}		
	}

	if (isset($_POST['deleteMember'])) {
		$resident_id = mysqli_real_escape_string($house->conn, $_POST['resident_id']);
		$household_id = $_POST["household_id"];

		if($house->deleteMember($resident_id)) {
			echo $resident_id;
		}

	}
?>