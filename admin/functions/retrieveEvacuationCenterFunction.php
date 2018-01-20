<?php
	/**
	* 
	*/
	class DataOperation
	{
		public $conn;
		function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","", "ark");
		}

		public function retrieveEvacuationCenter(){
			$sql = "SELECT * FROM evacuationcenter ORDER BY location_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
		public function retrieveEvacuationCenter2(){
			$sql = "SELECT * FROM evacuationcenter as a JOIN barangay as b ON a.brgy_id = b.brgy_id ORDER BY location_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
		public function retrieveEvacuationCenter3($evac_id){
			$sql = "SELECT * FROM evacuationcenter as a JOIN barangay as b ON a.brgy_id = b.brgy_id WHERE evac_id='".$evac_id."' ORDER BY location_name ASC";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
	}

	$obj = new DataOperation();

	

?>