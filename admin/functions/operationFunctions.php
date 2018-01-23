<?php
	Class Func
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertOperation($operation_name, $evac_id)
		{
			$sql = "INSERT INTO reliefoperation (operation_name, evac_id) VALUES ('".$operation_name."','".$evac_id."')";
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

	$Func = new Func;

	if (isset($_POST['submitoperation'])) {

		$operation_name = mysqli_real_escape_string($Func->conn, $_POST['operation_name']);
		$evac_id = mysqli_real_escape_string($Func->conn, $_POST['evac_id']);
		
		$Func->insertOperation($operation_name, $evac_id);
			header("location:../reliefOperation.php?inserted=1");
	}


	if (isset($_GET['deleteoperation'])) {
		$operation_id = mysqli_real_escape_string($Func->conn, $_GET['operation_id']);

		
			$Func->deleteOperation($operation_id);
			header("location:reliefOperation.php?deleted=1");
				
	}
?>