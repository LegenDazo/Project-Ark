<?php

class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "Codeusctc", "ark");
	}

		public function insertAttendance($resident_id, $evac_id, $status){
			$sql = "INSERT INTO attendance (resident_id, evac_id, status) VALUES ('".$resident_id."','".$evac_id."','".$status."')";
				$query = mysqli_query($this->con, $sql);
				if ($query) {
					return true;
				} else {
					echo mysqli_error($this->con);
				}
		}

		public function retrieve_AttendanceData($resident_id){
			$sql = "SELECT * FROM attendance WHERE resident_id=".$resident_id;
			$query = mysqli_query($this->con,$sql);
			$row = mysqli_fetch_array($query);
			return $row['status'];
		}

		public function retrieve_EvacuationCenter($resident_id){
			$sql = "SELECT * FROM attendance WHERE resident_id=".$resident_id;
			$query = mysqli_query($this->con,$sql);
			$row = mysqli_fetch_array($query);
			$evac_id = $row['evac_id'];

			$sql = "SELECT * FROM evacuationcenter WHERE evac_id='".$evac_id."'";
			$query = mysqli_query($this->con,$sql);
			$row = mysqli_fetch_array($query);
			return $row['location_name'];
		}

		public function retrieve_EvacuationCenterID($resident_id){
			$sql = "SELECT * FROM attendance WHERE resident_id='".$resident_id."'";
			$query = mysqli_query($this->con,$sql);
			if($query){
				$row = mysqli_fetch_array($query);
				return $row['evac_id'];
			}else echo "EvacuationCenterID: ".mysqli_error($this->con);
		}

		public function retrieve_CheckinDate($resident_id){
			$sql = "SELECT * FROM attendance WHERE resident_id=".$resident_id;
			$query = mysqli_query($this->con,$sql);
			$row = mysqli_fetch_array($query);
			return $row['date'];
		}

		public function currentPopulation($evac_id){
			$sql="SELECT `population` FROM evacuationcenter WHERE evac_id='".$evac_id."'";
			$itemArray=array();
			$query=mysqli_query($this->con,$sql);
			$row=mysqli_fetch_array($query);
			return $row[0];
		}

		public function updatePopulation($evac_id, $population){
			$sql="UPDATE evacuationcenter SET population='".$population."' WHERE evac_id='".$evac_id."'";
			$query=mysqli_query($this->con,$sql);
			if($query){
				return true;
			}else echo mysqli_error($this->con);
		}

		public function passEvacResData($resident_id)
		{
			$sql="SELECT evac_id FROM `attendance` WHERE resident_id ='".$resident_id."'  ";
			$itemArray=array();
			$query=mysqli_query($this->con,$sql);
			if($query){
				$row=mysqli_fetch_array($query);
				return $row[0];
			}else echo "passEvacResData".mysqli_error($this->con);
		}

		public function cancelAttendance($resident_id)
		{
			$sql = "DELETE FROM attendance WHERE resident_id='".$resident_id."'";
			$query = mysqli_query($this->con, $sql);
			if($query){
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}

		public function retrieve_residentData()
		{
			$sql = "SELECT * FROM resident";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		
}

$Functions = new Functions;

	// if(isset($_GET['checkin'])){
	// 	$resident_id = $_GET['resident_id'];
	// 	$evac_id = $_GET['evac_id'];
	// 	$population=$Functions->currentPopulation($evac_id);
	// 	$population++;
	// 	$Functions->updatePopulation($evac_id, $population);
	// 	$status++;
	// 	$Functions->insertAttendance($resident_id, $evac_id, $status);
	// 	header("location:../attendance.php?checkedin=1");	
	// }

	// if(isset($_GET['cancelAttendance'])){
	// 	$resident_id = $_GET['resident_id'];
	// 	$evac_id = $Functions->retrieve_EvacuationCenterID($resident_id);
	// 	$Functions->passEvacResData($evac_id);

			
	// 		$population=$Functions->currentPopulation($evac_id);
	// 		$population--;
	// 		$Functions->updatePopulation($evac_id, $population);
	// 		$Functions->cancelAttendance($resident_id, $evac_id, $status);
	// 		header("location:../attendance.php?checkedin=1");
	// }

	if(isset($_POST['resident_id']) && isset($_POST['evac_id'])){
		$resident_id = $_POST['resident_id'];
		$evac_id = $_POST['evac_id'];
		if($Functions->insertAttendance($resident_id, $evac_id, 1)){
			echo $Functions->retrieve_CheckinDate($resident_id);
			$population=$Functions->currentPopulation($evac_id);
			$population++;
			$Functions->updatePopulation($evac_id, $population);
		}else echo "Fail";
	}else if(isset($_POST['resident_id'])){
		$resident_id = $_POST['resident_id'];
		$evac_id = $Functions->retrieve_EvacuationCenterID($resident_id);
		$Functions->passEvacResData($evac_id);
		$population=$Functions->currentPopulation($evac_id);
		$population--;
		$Functions->updatePopulation($evac_id,$population);
		$Functions->cancelAttendance($resident_id,$evac_id,0);
		echo "Success";
	}
?>