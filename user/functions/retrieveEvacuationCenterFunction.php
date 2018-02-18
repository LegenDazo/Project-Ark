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

		public function retrieveEvacuationCenter(){
			$sql = "SELECT * FROM evacuationcenter as a JOIN barangay as b ON a.brgy_id = b.brgy_id WHERE status ='active'";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveEvacuationShape($evac_id)
		{
			$sql = "SELECT * FROM evacuationshape WHERE evac_id ='".$evac_id."'";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
	}

	$evac = new DataOperations();

	

?>