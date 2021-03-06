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

		public function insertEvacuationCenter($location, $capacity,/* $latitude, $longitude,*/ $houseno, $street, $barangay, $shape)
		{
			$sql = "INSERT INTO evacuationcenter (location_name, capacity, house_no, street, brgy_id, status) VALUES ('".$location."','".$capacity."','".$houseno."','".$street."','".$barangay."','active')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				$evac_id  = mysqli_insert_id($this->conn);
				$insert = "";
				for ($i=0; $i < sizeof($shape); $i++) { 
					$insert .= "INSERT INTO evacuationshape (evac_id, ord, latitude, longitude) VALUES('".$evac_id."','".$i."','".$shape[$i]['lat']."','".$shape[$i]['lng']."');";
				}

				if(mysqli_multi_query($this->conn, $insert)){
					return true;
				}
				
				
			} else {
				echo mysqli_error($this->conn);
			}
		}
		public function updateEvacuationCenter($evac_id, $location, $capacity, $latitude, $longitude, $houseno, $street, $barangay, $status)
		{
			$sql = "UPDATE evacuationcenter SET evac_id='".$evac_id."',location_name='".$location."',capacity='".$capacity."',latitude='".$latitude."',longitude='".$longitude."',house_no='".$houseno."',street='".$street."',brgy_id='".$barangay."',status='".$status."' WHERE evac_id='".$evac_id."'";
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
		///$latitude = mysqli_real_escape_string($obj->conn, $_POST['lat']);
		//$longitude = mysqli_real_escape_string($obj->conn, $_POST['lng']);
		$houseno = mysqli_real_escape_string($obj->conn, $_POST['houseno']);
		$street = mysqli_real_escape_string($obj->conn, $_POST['street']);
		$barangay = mysqli_real_escape_string($obj->conn, $_POST['brgy']);
		$shape = json_decode($_POST["arr"], true);

		if ($obj->insertEvacuationCenter($location, $capacity, /*$latitude, $longitude, */$houseno, $street, $barangay, $shape)) {
			header("location:../evacuationCenter.php?inserted");
		}


	}

	if (isset($_POST['updateevac'])) {
		$evac_id = mysqli_real_escape_string($obj->conn, $_POST['evac_id']);
		$status = mysqli_real_escape_string($obj->conn, $_POST['status']);
		$location = mysqli_real_escape_string($obj->conn, $_POST['location']);
		$capacity = mysqli_real_escape_string($obj->conn, $_POST['capacity']);
		$latitude = mysqli_real_escape_string($obj->conn, $_POST['lat']);
		$longitude = mysqli_real_escape_string($obj->conn, $_POST['lng']);
		$houseno = mysqli_real_escape_string($obj->conn, $_POST['houseno']);
		$street = mysqli_real_escape_string($obj->conn, $_POST['street']);
		$barangay = mysqli_real_escape_string($obj->conn, $_POST['brgy']);

		if ($obj->updateEvacuationCenter($evac_id, $location, $capacity, $latitude, $longitude, $houseno, $street, $barangay, $status)) {
			header("location:../updateEvacCenter.php?updated=1&evac_id=$evac_id");
		}
	}

?>