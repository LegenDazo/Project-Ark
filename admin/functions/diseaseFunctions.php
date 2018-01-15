<?php
class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "", "ark");
	}

	public function insertDisease($disease_name, $resident_id)
	{

		$sql = "INSERT INTO disease (disease_name, resident_id) VALUES ('".$disease_name."', '".$resident_id."')";
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

			public function retrieveDiseaseItemData2($disease_id)
		{
			$sql = "SELECT * FROM disease WHERE disease_id ='".$disease_id."'";
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
			$sql = "UPDATE disease SET disease_name='".$disease_name."' WHERE disease_id='".$disease_id."'";
			$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}
}

$Functions = new Functions;

if(isset($_POST['submitdisease'])){

	//$disease_name = $_POST['disease_name'];
	//$disease_id = mysqli_real_escape_string($obj->conn, $_POST['disease_id']);
	$resident_id = 1;
	$disease_name = mysqli_real_escape_string($Functions->con, $_POST['disease_name']);


	if($Functions->insertDisease($disease_name, $resident_id)) {
		header("location:../disease.php?inserted=1");
	}
}


if (isset($_POST['updateDisease'])) {

		$disease_id = mysqli_real_escape_string($Functions->conn, $_GET['disease_id']);
		$disease_name = mysqli_real_escape_string($Functions->conn, $_POST['disease_name']);
				
		if ($Functions->updateDisease($disease_id, $disease_name)) {
			header("location:viewDiseaseDetails.php?updated=1&disease_id=$disease_id");
		}
	}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$disease_id = $_GET['disease_id'];

		if($process == 'delete'){
			if($Functions->deleteDisease($disease_id)){
				header("location:../disease.php?deleted=1");
			}
		} 
	}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$disease_id = $_GET['disease_id'];

		if($process == 'update'){
			if(isset($_POST['updateDisease'])){
				$disease_id = mysqli_real_escape_string($Functions->con, $_POST['disease_id']);
				$disease_name = mysqli_real_escape_string($Functions->con, $_POST['disease_name']);
				
				if($Functions->updateDisease($disease_id, $disease_name)){
					header("location:../disease.php?disease_id=$disease_id&disease=updated");
				}
			}
		}
	}

?>