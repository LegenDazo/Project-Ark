<?php

class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "Codeusctc", "ark");
	}

		public function insertPackageDistribution($package_id, $household_id){
			$sql = "INSERT INTO packagedistribution (package_id, household_id) VALUES ('".$package_id."','".$household_id."')";
			$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}
		
}

$Functions = new Functions;


if(isset($_POST['received'])) {
	$Functions->insertPackageDistribution($_POST["package_id"], $_POST["household_id"]);
	header("location: ../reliefHousehold.php");
/*	$resident_id = $_GET['resident_id'];
	$evac_id = $_GET['evac_id'];

		$population=$Functions->currentPopulation($evac_id);
		$population++;
		$Functions->updatePopulation($evac_id, $population);
		$status++;
		$Functions->insertAttendance($resident_id, $evac_id, $status); */
}
?>