<?php

include 'functions/registrationFunctions.php';
include 'functions/retrieveEvacuationCenterFunction.php';


class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "", "ark");
	}

		public function updateAttendance(){
			$sql = "SELECT * FROM resident WHERE resident_id ='".$resident_id."'";
			$sql = "SELECT * FROM evacuationcenter WHERE evac_id ='".$evac_id."'";
			$sql = "INSERT INTO attendance (resident_id, evac_id) VALUES ('".$fname."','".$mname."','".$lname."','".$gender."','".$bday."','".$street."','".$house_no."')";
				$query = mysqli_query($this->con, $sql);
				if ($query) {
					return true;
				} else {
					echo mysqli_error($this->con);
				}
		}

		public function getCurrentDate(){
				$date=date("Y-m-d");
				return $date;
		}

		public function getCurrentTime(){
			$date=date("Y-m-d G:i:s");
			return $date;
		}

}

$Functions = new Functions;

	if(isset($_POST['checkin'])){
		$attendance_id = mysqli_real_escape_string($Functions->con, $_POST['attendance_id']);
	}

?>