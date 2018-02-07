<?php

class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "", "ark");
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

		public function retrieve_AttendanceData($resident_id, $evac_id) {
			$sql = "SELECT * FROM attendance WHERE resident_id = ".$resident_id." AND evac_id = ".$evac_id." AND date_out IS NULL";
			$query = mysqli_query($this->con,$sql);
			$row = mysqli_fetch_array($query);
			return $row['status'];
		}

		public function retrieve_EvacuationCenter($resident_id){
			$sql = "SELECT * FROM attendance WHERE resident_id=".$resident_id." AND date IS NOT NULL AND date_out IS NULL";
			$query = mysqli_query($this->con,$sql);
			$ret = false;

			if(mysqli_num_rows($query) == 1) {
				$row = mysqli_fetch_array($query);
				$evac_id = $row['evac_id'];
				$sql = "SELECT * FROM evacuationcenter WHERE evac_id='".$evac_id."'";
				$query = mysqli_query($this->con,$sql);
				$ret = mysqli_fetch_array($query);
			}

			return $ret;
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
			$sql = "SELECT * FROM attendance WHERE resident_id=".$resident_id." AND date_out IS NULL";
			$query = mysqli_query($this->con,$sql);
			$row = mysqli_fetch_array($query);

			$time = strtotime($row["date"]);
			$date = date("M d, Y (h:iA)", $time);
			
			return $date;
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
			$sql="SELECT evac_id FROM `attendance` WHERE resident_id ='".$resident_id."' AND date_out IS NULL";
			$itemArray=array();
			$query=mysqli_query($this->con,$sql);
			if($query){
				$row=mysqli_fetch_array($query);
				return $row[0];
			}else echo "passEvacResData".mysqli_error($this->con);
		}

		public function cancelAttendance($resident_id, $evac_id)
		{
			$sql = "UPDATE attendance SET date_out = CURRENT_TIMESTAMP() WHERE resident_id='".$resident_id."' AND evac_id = ".$evac_id." AND date_out IS NULL";
			$query = mysqli_query($this->con, $sql);
			if($query){
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}

		public function retrieve_residentData()
		{
			$sql = "SELECT * FROM resident ORDER BY lname";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		
}

$Functions = new Functions;

	if(isset($_POST['resident_id']) && isset($_POST["deleted"])) {
		
		$resident_id = $_POST['resident_id'];
		$evac_id = $_POST["evac_id"];

		$population=$Functions->currentPopulation($evac_id);
		$population--;
		$Functions->updatePopulation($evac_id,$population);
		$Functions->cancelAttendance($resident_id,$evac_id);

		$sql = "SELECT CURRENT_TIMESTAMP()";
		$date = mysqli_query($Functions->con, $sql);
		$info = mysqli_fetch_array($date)[0];
		$time = strtotime($info);
		$date = date("M d, Y (h:iA)", $time);

		echo $date;
		
	} else if(isset($_POST['resident_id']) && isset($_POST['evac_id'])){
		$resident_id = $_POST['resident_id'];
		$evac_id = $_POST['evac_id'];
		if($Functions->insertAttendance($resident_id, $evac_id, 1)) {
			echo $Functions->retrieve_CheckinDate($resident_id);
			$population = $Functions->currentPopulation($evac_id);
			$population++;
			$Functions->updatePopulation($evac_id, $population);
			
		}else echo "Fail";
	}
?>