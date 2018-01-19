<?php
	/**
	* 
	*/
	class DataOperations
	{
		public $conn;
		function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","Codeusctc", "ark");
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


		



	}

	$obj = new DataOperations();

	

?>