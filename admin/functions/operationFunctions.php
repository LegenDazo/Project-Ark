<?php
	Class DataOperations
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertOperation($operation_id, $operation_name)
		{
			$sql = "INSERT INTO reliefoperation (operation_id, operation_name) VALUES ('".$operation_id."','".$operation_name."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveOperationItems($operation_id)
		{
			$sql = "SELECT * FROM reliefoperation WHERE operation_id = '".$operation_id."'";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveOperationData()
		{
			$sql = "SELECT * FROM reliefoperation";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function updateOperation($operation_id, $operation_name)
		{
			$sql = "UPDATE reliefoperation SET operation_id='".$operation_id."',operation_name='".$operation_name."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function deleteOperation($operation_id)
		{
			$sql = "DELETE FROM reliefoperation WHERE operation_id='".$operation_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}
	}

	$obj = new DataOperations;

	if (isset($_POST['submitoperation'])) {

		$operation_id = mysqli_real_escape_string($obj->conn, $_POST['operation_id']);
		$operation_name = mysqli_real_escape_string($obj->conn, $_POST['operation_name']);
		
		if ($obj->insertOperation($operation_id, $operation_name)) {
			header("location:adminOperation.php?inserted=1");
		}
	}

	if (isset($_POST['updateoperation'])) {

		$operation_id = mysqli_real_escape_string($obj->conn, $_GET['operation_id']);
		$operation_name = mysqli_real_escape_string($obj->conn, $_POST['operation_name']);
				
		if ($obj->updateOperation($operation_id, $operation_name)) {
			header("location:viewOperationDetails.php?updated=1&operation_id=$operation_id");
		}
	}

	if (isset($_GET['deleteoperation'])) {
		$operation_id = mysqli_real_escape_string($obj->conn, $_GET['operation_id']);

		
			if ($obj->deleteOperation($operation_id)) {
			header("location:adminOperation.php?deleted=1");
		}		
	}
?>