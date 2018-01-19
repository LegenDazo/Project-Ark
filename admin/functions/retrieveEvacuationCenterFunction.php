<?php
	/**
	* 
	*/
	class DataOperation
	{
		public $conn;
		function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","Codeusctc", "ark");
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
	}

	$obj = new DataOperation();

	

?>