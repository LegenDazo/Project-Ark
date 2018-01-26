<?php

//include 'functions/retrieveEvacuationCenterFunction.php';

	Class Functions
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertAnnounce($admin_id, $an_what)
		{
			$sql = "INSERT INTO newannouncement (admin_id, an_what) VALUES ('".$admin_id."','".$an_what."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveAnnounceItems($announce_id)
		{
			$sql = "SELECT * FROM newannouncement WHERE announce_id = '".$announce_id."'";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveAnnounceData()
		{
			$sql = "SELECT * FROM newannouncement as a JOIN admin as b ON a.admin_id=b.username";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function updateAnnounce($announce_id, $an_what)
		{
			$sql = "UPDATE newannouncement SET announce_id='".$announce_id."' WHERE announce_id='".$announce_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function deleteAnnounce($announce_id)
		{
			$sql = "DELETE FROM newannouncement WHERE announce_id='".$announce_id."'";
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

		
		if ($func->insertAnnounce($admin_id, $an_what)) {
			header("location:../newannouncement.php?inserted=1");
		}
	}

	if (isset($_POST['updateannounce'])) {

		$announce_id = mysqli_real_escape_string($func->conn, $_GET['announce_id']);
		$an_what = mysqli_real_escape_string($func->conn, $_POST['an_what']);
		
				
		if ($func->updateAnnounce($announce_id, $an_what)) {
			header("location:../viewAnnounceDetails.php?updated=1&announce_id=$announce_id");
		}
	}

	if (isset($_GET['deleteannounce'])) {
		$announce_id = mysqli_real_escape_string($func->conn, $_GET['announce_id']);

		
			if ($func->deleteAnnounce($announce_id)) {
			header("location:newannouncement.php?deleted=1");
		}		
	}
?>