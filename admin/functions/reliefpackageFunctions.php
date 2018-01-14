<?php
	/**
	* 
	*/
	class Functions
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","","ark");
		}

		public function InsertRelief($relief_id, $relief_name)
		{
			$sql = "INSERT INTO reliefpackage (package_id, package_name) VALUES ('".$relief_id."','".$relief_name."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveReliefData()
		{
			$sql = "SELECT * FROM reliefpackage";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
	}

$Functions = new Functions;

if (isset($_POST['addRelief'])) {
	$relief_name = mysqli_real_escape_string($Functions->conn, $_POST['relief_name']);
	$relief_id = mysqli_real_escape_string($Functions->conn, $_POST['relief_id']);

$Functions->InsertRelief($relief_id, $relief_name);
			header("location:../reliefpackage.php?inserted=1");
}else{
}


?>