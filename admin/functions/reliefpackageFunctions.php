<?php
	/**
	* 
	*/
	class obj
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","Codeusctc","ark");
		}

		public function InsertRelief($relief_id, $relief_name, $operation_id)
		{
			$sql = "INSERT INTO reliefpackage (package_id, package_name, operation_id) VALUES ('".$relief_id."','".$relief_name."','".$operation_id."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveReliefData()
		{
			$sql = "SELECT * FROM reliefpackage ORDER BY package_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function deletepackage($relief_id)
		{
			$sql = "DELETE FROM reliefpackage WHERE package_id='".$relief_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveReliefData2()
		{
			$sql = "SELECT * FROM `reliefpackage` as a JOIN reliefoperation as b ON a.operation_id = b.operation_id";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
	}

$obj = new obj;

if (isset($_POST['addRelief'])) {
	
	$relief_name = mysqli_real_escape_string($obj->conn, $_POST['relief_name']);
	$relief_id = mysqli_real_escape_string($obj->conn, $_POST['relief_id']);
	$operation_id = mysqli_real_escape_string($obj->conn, $_POST['operation_id']);

	$obj->InsertRelief($relief_id, $relief_name, $operation_id);
			header("location:../reliefpackage.php?inserted=1");	
}	
//}else{

if (isset($_GET['deletepackage'])) {
		$relief_id = mysqli_real_escape_string($obj->conn, $_GET['package_id']);

		
			$obj->deletepackage($relief_id);
			header("location:reliefpackage.php?deleted=1");
				
	}
?>