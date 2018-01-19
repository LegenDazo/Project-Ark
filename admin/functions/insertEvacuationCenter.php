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

		public function insertEvacuationCenter($location, $capacity, $latitude, $longitude, $houseno, $street, $barangay)
		{
			$sql = "INSERT INTO evacuationcenter (location_name, capacity, latitude, longitude, house_no, street, brgy_id) VALUES ('".$location."','".$capacity."','".$latitude."','".$longitude."','".$houseno."','".$street."','".$barangay."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}
	}

	$obj = new DataOperations();

	if (isset($_POST['submitevac'])) {
		$location = mysqli_real_escape_string($obj->conn, $_POST['location']);
		$capacity = mysqli_real_escape_string($obj->conn, $_POST['capacity']);
		$latitude = mysqli_real_escape_string($obj->conn, $_POST['lat']);
		$longitude = mysqli_real_escape_string($obj->conn, $_POST['lng']);
		$houseno = mysqli_real_escape_string($obj->conn, $_POST['houseno']);
		$street = mysqli_real_escape_string($obj->conn, $_POST['street']);
		$barangay = mysqli_real_escape_string($obj->conn, $_POST['brgy']);


		if ($obj->insertEvacuationCenter($location, $capacity, $latitude, $longitude, $houseno, $street, $barangay)) {
			header("location:../evacuationCenter.php?inserted");
		}


	}

?>