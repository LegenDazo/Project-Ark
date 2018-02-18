<?php
	/**
	* 
	*/
	class DataOperations
	{
		public $conn;
		function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","", "ark");
		}

		public function retrieveDisease()
		{
			$sql = "SELECT * FROM disease";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

			public function retrieveDisease2($disease_id)
		{
			$sql = "SELECT * FROM disease WHERE disease_id ='".$disease_id."'";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}


		public function updateDisease ($disease_id, $disease_name)
		{
			$sql = "UPDATE disease SET disease_name='".$disease_name."' WHERE disease_id='".$disease_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}


		



	}

	$obj = new DataOperations();

		if(isset($_POST['updateDisease'])){

			$disease_id = mysqli_real_escape_string($obj->conn, $_POST['disease_id']);
			$disease_name = mysqli_real_escape_string($obj->conn, $_POST['disease_name']);

			if(empty($_POST['disease_name'])){
				session_start();
				$_SESSION['error'] = "Please fill out this field!";
				header("location:../updateDiseases.php");
			}

			else if(!preg_match("/^[a-zA-Z]*$/", $disease_name)){
				session_start();
				$_SESSION['disease_name'] = $disease_name;
				$_SESSION['error'] = "Only letters and white space is allowed!";
				header("location:../updateDiseases.php");
			}

			else {

				$obj->updateDisease($disease_id, $disease_name);
				header("location:../disease.php?disease_id=$disease_id&msg=updated");
			}
			
			
		}
?>