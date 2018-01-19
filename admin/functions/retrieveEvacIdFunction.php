<?php
	/**
	* 
	*/
	class Operations
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","", "ark");
		}

		public function retrieveEvacId()
		{
			$sql = "SELECT * FROM evacuationcenter";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}



	}

	$obj = new Operations();

	

?>