<?php
class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "", "ark");
	}

	public function registerBarangay($brgy_name, $city,	$province)
	{

		$sql = "INSERT INTO barangay (brgy_name, city,	province) VALUES ('".$brgy_name."','".$city."','".$province."')";
		$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->con);
			}
	}	
		public function retrieve_barangayData()
		{
			$sql = "SELECT * FROM barangay";
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

				if(empty($_POST['brgy_name'])){
					session_start();
 					$_SESSION['Error'] = "Barangay must not be empty!";
 					header("location:../barangayRegistration.php");
				}
				elseif(empty($_POST['city'])){
					session_start();
 					$_SESSION['Error'] = "City must not be empty!";
 					header("location:../barangayRegistration.php");
				}
				elseif(empty($_POST['province'])){
					session_start();
 					$_SESSION['Error'] = "Province must not be empty!";
 					header("location:../barangayRegistration.php");
				}
				else($Functions->registerBarangay($brgy_name, $city, $province));{
					session_start();
					$_SESSION['Success'] = "Barangay $brgy_name has been added!";
					header("location:../barangayRegistration.php");
				}
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

				if(empty($_POST['brgy_name'])){
					session_start();
 					$_SESSION['Error'] = "Barangay must not be empty!";
 					header("location:../updateBarangayProfile.php?brgy_id=$brgy_id");
				}
				elseif(empty($_POST['city'])){
					session_start();
 					$_SESSION['Error'] = "City must not be empty!";
 					header("location:../updateBarangayProfile.php?brgy_id=$brgy_id");
				}
				elseif(empty($_POST['province'])){
					session_start();
 					$_SESSION['Error'] = "Province must not be empty!";
 					header("location:../updateBarangayProfile.php?brgy_id=$brgy_id");
				}
				elseif($Functions->updateBarangayRecord($brgy_id, $brgy_name, $city, $province)){
					session_start();
					$_SESSION['Success'] = "Barangay data has been updated!";
					header("location:../updateBarangayProfile.php?brgy_id=$brgy_id&msg=updated");
				}
				else {
					session_start();
					$_SESSION['Error'] = "Something went wrong. Please provide a valid input!";
					header("location:../updateBarangayProfile.php?brgy_id=$brgy_id");
					}
			}
		}
	}

?>