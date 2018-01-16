<?php
class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "", "ark");
	}

	public function insertDisease($resident_id, $disease_id)
	{
		$sql = "INSERT INTO diseaseacquired (resident_id, disease_id) VALUES ('".$resident_id."','".$disease_id."')";
		$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->con);
			}
	}	
		public function retrieve_acquiredData()
		{
			$sql = "SELECT * FROM diseaseacquired";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

			public function retrieve_barangayItemData2($brgy_id)
		{
			$sql = "SELECT * FROM barangay WHERE brgy_id ='".$brgy_id."'";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function deleteBarangayRecord($brgy_id)
		{
			$sql = "DELETE FROM barangay WHERE brgy_id='".$brgy_id."'";
			$query = mysqli_query($this->con, $sql);
			if($query){
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}

		public function updateBarangayRecord($brgy_id, $brgy_name, $city,	$province)
		{
			$sql = "UPDATE barangay SET brgy_name='".$brgy_name."',city='".$city."',province='".$province."' WHERE brgy_id='".$brgy_id."'";
			$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}
}

$Functions = new Functions;

if(isset($_POST['RegisterBarangay'])){

	$brgy_name = $_POST['brgy_name'];
	$city = $_POST['city'];
	$province = $_POST['province'];


		$Functions->registerBarangay($brgy_name, $city, $province);
				header("location:../barangay.php?inserted=1");
}else{

	//echo "No data received.";
}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$brgy_id = $_GET['brgy_id'];

		if($process == 'delete'){
			if($Functions->deleteBarangayRecord($brgy_id)){
				header("location:../barangay.php?deleted=1");
			}
		} 
	}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$brgy_id = $_GET['brgy_id'];

		if($process == 'update'){
			if(isset($_POST['updateBarangay'])){
				$brgy_id = mysqli_real_escape_string($Functions->con, $_POST['brgy_id']);
				$brgy_name = mysqli_real_escape_string($Functions->con, $_POST['brgy_name']);
				$city = mysqli_real_escape_string($Functions->con, $_POST['city']);
				$province = mysqli_real_escape_string($Functions->con, $_POST['province']);

				if($Functions->updateBarangayRecord($brgy_id, $brgy_name, $city, $province)){
					header("location:../barangay.php?brgy_id=$brgy_id&msg=updated");
				}
			}
		}
	}


if(isset($_POST['submitdisease'])){

	$resident_id = $_POST['resident_id'];
	$disease_id = $_POST['disease_id'];


		$Functions->insertDisease($resident_id, $disease_id);
				header("location:../diseaseacquired.php?added=1");
}else{

	//echo "No data received.";
}

?>