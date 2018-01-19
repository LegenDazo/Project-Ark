<?php
class NewFunctions
{
		public $con;

		public function __construct()
		{
			$this->con = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertDisease($disease_name)
		{

			$sql = "INSERT INTO disease (disease_name) VALUES ('".$disease_name."')";
			$query = mysqli_query($this->con, $sql);
				if ($query) {
					return true;
				} else {
					echo mysqli_error($this->con);
				}
		}	

		public function retrieveDiseaseData()
		{
			$sql = "SELECT * FROM disease";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

			public function retrieveDiseaseItemData2($resident_id)
		{
			$sql = "SELECT * FROM resident WHERE resident_id ='".$resident_id."'";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function deleteDisease($disease_id)
		{
			$sql = "DELETE FROM disease WHERE disease_id='".$disease_id."'";
			$query = mysqli_query($this->con, $sql);
			if($query){
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}

		public function updateDisease($disease_id, $disease_name)
		{
			$sql = "UPDATE disease SET disease_id='".$disease_id."', disease_name='".$disease_name."' WHERE disease_id='".$disease_id."'";
			$query = mysqli_query($this->con, $sql);
			if ($query) {
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
		public function retrieve_residentData1($resident_id)
		{
			$sql = "SELECT * FROM resident WHERE resident_id ='".$resident_id."'";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieve_residentData2($resident_id)
		{   
			$sql = "SELECT * FROM diseaseacquired as a JOIN resident as b ON a.resident_id = b.resident_id JOIN disease as c ON a.disease_id = c.disease_id WHERE a.resident_id = '".$resident_id."'";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieve_resident()
		{
			$sql = "SELECT * FROM diseaseacquired WHERE  disease_name=".$disease_name;
			//$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			//while ($row = mysqli_fetch_assoc($query)) {
			//	$itemArray[] = $row;
			//}
			$row = mysqli_fetch_array($query);
			return $row['name'];
		}

		public function cureResident($acquired_id)
		{
			$sql = "UPDATE diseaseacquired SET date_cured=CURRENT_TIMESTAMP() WHERE acquired_id='".$acquired_id."'";
			$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			} else {
				return mysqli_error($this->con);
			}
		}
		
}

$func = new NewFunctions;

if(isset($_POST['submitdisease'])){

	//$disease_name = $_POST['disease_name'];
	//$disease_id = mysqli_real_escape_string($obj->conn, $_POST['disease_id']);
	//$resident_id = 1;
	$disease_name = mysqli_real_escape_string($func->con, $_POST['disease_name']);


	if($func->insertDisease($disease_name)) {
		header("location:../disease.php?inserted=1");
	}
}


if (isset($_POST['updateDisease'])) {

		$disease_id = mysqli_real_escape_string($func->conn, $_GET['disease_id']);
		$disease_name = mysqli_real_escape_string($func->conn, $_POST['disease_name']);
				
		if ($func->updateDisease($disease_id, $disease_name)) {
			header("location:viewDiseaseDetails.php?updated=1&disease_id=$disease_id");
		}
	}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$resident_id = $_GET['resident_id'];

		if($process == 'delete'){
			if($func->deleteDisease($resident_id)){
				header("location:../disease.php?deleted=1");
			}
		} 
	}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$resident_id = $_GET['resident_id'];
		//$resident_name = $_GET['resident_name'];
		//$disease_name = $_GET['disease_name'];

		if($process == 'update'){
			if(isset($_POST['updateDisease'])){
				$disease_id = mysqli_real_escape_string($func->con, $_POST['disease_id']);
				$disease_name = mysqli_real_escape_string($func->con, $_POST['disease_name']);
				$resident_id = mysqli_real_escape_string($func->con, $_POST['resident_id']);
				$resident_name = mysqli_real_escape_string($func->con, $_POST['resident_name']);
				
				if($func->updateDisease($disease_id, $resident_id)){
					header("location:../diseaseAcquired.php?disease_id=$disease_id&disease=updated");
				}
			}
		}
	}

	if (isset($_POST['datecured'])) {
		$acquired_id = $_POST['acquired_id'];
		$resident_id = $_POST['resident_id'];
		if ($func->cureResident($acquired_id)) {
			header("location:../viewResidentDisease.php?updated=1&resident_id=$resident_id");
		}
	}

?>