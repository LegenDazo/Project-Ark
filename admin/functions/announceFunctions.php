<?php

//include 'functions/retrieveEvacuationCenterFunction.php';

	Class Functions
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "Codeusctc", "ark");
		}

		public function insertAnnounce($admin_id, $an_what, $to_whom, $date_start, $date_end, $time_start, $time_end, $description, $location)
		{
			$sql = "INSERT INTO announcement (admin_id, an_what, to_whom, date_start, date_end, time_start, time_end, description, location) VALUES ('".$admin_id."','".$an_what."','".$to_whom."','".$date_start."','".$date_end."','".$time_start."','".$time_end."','".$description."','".$location."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveAnnounceItems($announcement_id)
		{
			$sql = "SELECT * FROM announcement WHERE announcement_id = '".$announcement_id."'";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveAnnounceData()
		{
			$sql = "SELECT * FROM announcement";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function updateAnnounce($announcement_id, $an_what, $to_whom, $date_start, $date_end, $time_start, $time_end, $description, $location)
		{
			$sql = "UPDATE announcement SET announcement_id='".$announcement_id."',an_what='".$an_what."',to_whom='".$to_whom."',date_start='".$date_start."',date_end='".$date_end."',time_start='".$time_start."',time_end='".$time_end."',description='".$description."',location='".$location."' WHERE announcement_id='".$announcement_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function deleteAnnounce($announcement_id)
		{
			$sql = "DELETE FROM announcement WHERE announcement_id='".$announcement_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}
	}

	$func = new Functions;

	if (isset($_POST['submitannounce'])) {
		$admin_id = 1;
		$an_what = mysqli_real_escape_string($func->conn, $_POST['an_what']);
		$to_whom = mysqli_real_escape_string($func->conn, $_POST['to_whom']);
		$date_start = mysqli_real_escape_string($func->conn, $_POST['date_start']);
		$date_end = mysqli_real_escape_string($func->conn, $_POST['date_end']);
		$time_start = mysqli_real_escape_string($func->conn, $_POST['time_start']);
		$time_end = mysqli_real_escape_string($func->conn, $_POST['time_end']);
		$description = mysqli_real_escape_string($func->conn, $_POST['description']);
		$location = mysqli_real_escape_string($func->conn, $_POST['location']);

		
		if ($func->insertAnnounce($admin_id, $an_what, $to_whom, $date_start, $date_end, $time_start, $time_end, $description, $location)) {
			header("location:../announcement.php?inserted=1");
		}
	}

	if (isset($_POST['updateannounce'])) {

		$announcement_id = mysqli_real_escape_string($func->conn, $_GET['announcement_id']);
		$an_what = mysqli_real_escape_string($func->conn, $_POST['an_what']);
		$to_whom = mysqli_real_escape_string($func->conn, $_POST['to_whom']);
		$date_start = mysqli_real_escape_string($func->conn, $_POST['date_start']);
		$date_end = mysqli_real_escape_string($func->conn, $_POST['date_end']);
		$time_start = mysqli_real_escape_string($func->conn, $_POST['time_start']);
		$time_end = mysqli_real_escape_string($func->conn, $_POST['time_end']);
		$description = mysqli_real_escape_string($func->conn, $_POST['description']);
		$location = mysqli_real_escape_string($func->conn, $_POST['location']);

				
		if ($func->updateAnnounce($announcement_id, $an_what, $to_whom, $date_start, $date_end, $time_start, $time_end, $description, $location)) {
			header("location:../viewAnnounceDetails.php?updated=1&announcement_id=$announcement_id");
		}
	}

	if (isset($_GET['deleteannounce'])) {
		$announcement_id = mysqli_real_escape_string($func->conn, $_GET['announcement_id']);

		
			if ($func->deleteAnnounce($announcement_id)) {
			header("location:announcement.php?deleted=1");
		}		
	}
?>