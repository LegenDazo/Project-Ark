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

		public function insertAttendance($resident_id, $evac_id){
			/*$sql = "SELECT * FROM resident WHERE resident_id ='".$resident_id."'";
			$sql = "SELECT * FROM evacuationcenter WHERE evac_id ='".$evac_id."'"; */
			$sql = "INSERT INTO attendance (resident_id, evac_id) VALUES ('".$resident_id."','".$evac_id."')";
				$query = mysqli_query($this->con, $sql);
				if ($query) {
					return true;
				} else {
					echo mysqli_error($this->con);
				}
		}

		public function currentPopulation($evac_id){
			$sql="SELECT `population` FROM evacuationcenter WHERE evac_id='".$evac_id."'";
			$itemArray=array();
			$query=mysqli_query($this->con,$sql);
			$row=mysqli_fetch_array($query);
			return $row[0];
		}

		public function updatePopulation($evac_id,$population){
			$sql="UPDATE evacuationcenter SET population='".$population."' WHERE evac_id='".$evac_id."'";
			$query=mysqli_query($this->con,$sql);
			if($query){
				return true;
			}else echo mysqli_error($this->con);
		}
}

$Functions = new Functions;

	if(isset($_GET['checkin'])){
		$resident_id = $_GET['resident_id'];
		$evac_id = $_GET['evac_id'];

			$population=$Functions->currentPopulation($evac_id);
			$population++;
			$Functions->updatePopulation($evac_id, $population);
			$Functions->insertAttendance($resident_id, $evac_id);
				header("location:../attendance.php?checkedin=1");
	}

?>