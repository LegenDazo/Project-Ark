<?php
	/**
	* 
	*/
	class Operations
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","Codeusctc", "ark");
		}

		public function retrieveUserId()
		{
			$sql = "SELECT * FROM user";
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