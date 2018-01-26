<?php
	/**
	* 
	*/
	class DataOperation
	{
		public $conn;
		function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","", "ark");
		}

		public function retrieveEvacuationCenter() {
			$sql = "SELECT * FROM evacuationcenter WHERE status = 'active' ORDER BY location_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveEvacuationCenterAll(){
			$sql = "SELECT * FROM evacuationcenter as a JOIN barangay as b ON a.brgy_id = b.brgy_id ORDER BY location_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveEvacuationCenter2(){
			$sql = "SELECT * FROM evacuationcenter as a JOIN barangay as b ON a.brgy_id = b.brgy_id WHERE a.status='active' ORDER BY location_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveEvacuationCenter3($evac_id){
			$sql = "SELECT * FROM evacuationcenter as a JOIN barangay as b ON a.brgy_id = b.brgy_id WHERE evac_id='".$evac_id."' ORDER BY location_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function setInactiveEvac($evac_id)
		{
			$sql = "UPDATE evacuationcenter SET status = 'inactive' WHERE evac_id='".$evac_id."';";
			$sql .= "UPDATE evacuationperiod SET date_end = CURRENT_TIMESTAMP() WHERE evac_id = ".$evac_id." AND date_end IS NULL";
			$query = mysqli_multi_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}

		public function setActiveEvac($evac_id)
		{
			$sql = "UPDATE evacuationcenter SET status = 'active' WHERE evac_id='".$evac_id."';";
			$sql .= "INSERT INTO evacuationperiod (evac_id) VALUES (".$evac_id.")";
			$query = mysqli_multi_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}
		
	}

	$obj = new DataOperation();

	if (isset($_GET['inactive'])) {
		$evac_id = $_GET['evac_id'];

		if ($obj->setInactiveEvac($evac_id)) {
			session_start();
			$_SESSION['msg'] = "Evacuation Set to Inactive";
			header("location:../listOfEvacCenters.php");
		} else {
			session_start();
			$_SESSION['msg'] = "Failed";
			header("location:../listOfEvacCenters.php");
		}
	}

	if (isset($_GET['active'])) {
		$evac_id = $_GET['evac_id'];

		if ($obj->setActiveEvac($evac_id)) {
			session_start();
			$_SESSION['msg'] = "Evacuation Set to Active";
			header("location:../listOfEvacCenters.php");
		} else {
			session_start();
			$_SESSION['msg'] = "Failed";
			header("location:../listOfEvacCenters.php");
		}
	}

?>