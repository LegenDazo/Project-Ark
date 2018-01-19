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

		public function retrieveReliefPackage(){
			$sql = "SELECT * FROM reliefpackage";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
	}

	$function = new DataOperation();

	

?>