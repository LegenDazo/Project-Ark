<?php
	Class DataOperations
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertAnnounce($an_what, $an_who, $an_when, $an_where)
		{
			$sql = "INSERT INTO announcement (an_what, an_who, an_when, an_where) VALUES ('".$an_what."','".$an_who."','".$an_when."','".$an_where."')";
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

		public function updateAnnounce($announcement_id, $an_what, $an_who, $an_when, $an_where)
		{
			$sql = "UPDATE announcement SET announcement_id='".$announcement_id."',an_what='".$an_what."',an_who='".$an_who."',an_when='".$an_when."',an_where='".$an_where."' WHERE announcement_id='".$announcement_id."'";
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

	$obj = new DataOperations;

	if (isset($_POST['submitannounce'])) {

		$an_what = mysqli_real_escape_string($obj->conn, $_POST['an_what']);
		$an_who = mysqli_real_escape_string($obj->conn, $_POST['an_who']);
		$an_when = mysqli_real_escape_string($obj->conn, $_POST['an_when']);
		$an_where = mysqli_real_escape_string($obj->conn, $_POST['an_where']);
		
		if ($obj->insertAnnounce($an_what, $an_who, $an_when, $an_where)) {
			header("location:../announcement.php?inserted=1");
		}
	}

	if (isset($_POST['updateannounce'])) {

		$announcement_id = mysqli_real_escape_string($obj->conn, $_GET['announcement_id']);
		$an_what = mysqli_real_escape_string($obj->conn, $_POST['an_what']);
		$an_who = mysqli_real_escape_string($obj->conn, $_POST['an_who']);
		$an_when = mysqli_real_escape_string($obj->conn, $_POST['an_when']);
		$an_where = mysqli_real_escape_string($obj->conn, $_POST['an_where']);
				
		if ($obj->updateAnnounce($announcement_id, $an_what, $an_who, $an_when, $an_where)) {
			header("location:../viewAnnounceDetails.php?updated=1&announcement_id=$announcement_id");
		}
	}

	if (isset($_GET['deleteannounce'])) {
		$announcement_id = mysqli_real_escape_string($obj->conn, $_GET['announcement_id']);

		
			if ($obj->deleteAnnounce($announcement_id)) {
			header("location:announcement.php?deleted=1");
		}		
	}
?>