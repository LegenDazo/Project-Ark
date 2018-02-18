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
			$sql = "SELECT * FROM disease ";
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
		
}

$func = new NewFunctions;

if(isset($_POST['submitdisease'])){

	$disease_name = mysqli_real_escape_string($func->con, $_POST['disease_name']);

	if(empty($_POST['disease_name'])){		
		session_start();
		$_SESSION['error'] = "Please fill out this field!";
		header("location:../addDisease.php");
	} 

	else if(!preg_match("/^[a-zA-Z]*$/", $disease_name)){
		session_start();
		$_SESSION['disease_name'] = $disease_name;
		$_SESSION['error'] = "Only letters and white space is allowed!";
		header("location:../addDisease.php");
	}

	else {
		$func->insertDisease($disease_name); 
		header("location:../disease.php?inserted=1");
	}
	
} else {
	//
}

if (isset($_GET['deleteDisease'])) {
		
	$disease_id = mysqli_real_escape_string($func->con, $_GET['disease_id']);

		if($func->deleteDisease($disease_id)){
		header("location:disease.php?deleted=1");
		}				
	}


?>