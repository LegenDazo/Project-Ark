<?php
	/**
	* 
	*/
	class dataOperation
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","","ark");
		}

		public function InsertSponsor ($sponsor_id, $sponsor_name, $sponsor_type, $sponsor_address, $sponsor_contNum)
		{
			$sql = "INSERT INTO sponsor (sponsor_id, sponsor_name, sponsor_type, address, contact_no) VALUES ('".$sponsor_id."','".$sponsor_name."','".$sponsor_type."','".$sponsor_address."','".$sponsor_contNum."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveSponsorData()
		{
			$sql = "SELECT * FROM sponsor";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}


		public function deletesponsor($sponsor_id)
		{
			$sql = "DELETE FROM sponsor WHERE sponsor_id='".$sponsor_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}
	}

$dataOperation = new dataOperation;

if (isset($_POST['addSponsor'])) {
	
	$sponsor_id = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_id']);
	$sponsor_name = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_name']);
	$sponsor_type = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_type']);
	$sponsor_address = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_address']);
	$sponsor_contNum = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_contNum']);

	$dataOperation->InsertSponsor($sponsor_id, $sponsor_name, $sponsor_type,$sponsor_address, $sponsor_contNum );
			header("location:../reliefSponsors.php?inserted=1");	
}	
//}else{


if (isset($_POST['addSponsor2'])) {
	
	$sponsor_id = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_id']);
	$sponsor_name = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_name']);
	$sponsor_type = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_type']);
	$sponsor_address = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_address']);
	$sponsor_contNum = mysqli_real_escape_string($dataOperation->conn, $_POST['sponsor_contNum']);

	$dataOperation->InsertSponsor($sponsor_id, $sponsor_name, $sponsor_type,$sponsor_address, $sponsor_contNum );
			header("location:../addRelief.php?inserted=1");	
}	
//}else{

if (isset($_GET['deletesponsor'])) {
		$sponsor_id = mysqli_real_escape_string($dataOperation->conn, $_GET['sponsor_id']);

		
			$dataOperation->deletesponsor($sponsor_id);
			header("location:reliefSponsors.php?deleted=1");
				
	}
?>