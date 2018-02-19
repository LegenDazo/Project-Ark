<?php

//include 'functions/retrieveEvacuationCenterFunction.php';

	Class Functions
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertAnnounce($admin_id, $an_about, $an_what)
		{
			$sql = "INSERT INTO newannouncement (admin_id, an_about, an_what) VALUES ('".$admin_id."','".$an_about."','".$an_what."')";
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
			$sql = "SELECT * FROM newannouncement as a JOIN admin as b ON a.admin_id=b.id ORDER BY datepost DESC";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function updateAnnounce($announce_id, $an_about, $an_what)
		{
			$sql = "UPDATE newannouncement SET announce_id='".$announce_id."', an_about='".$an_about."', an_what='".$an_what."' WHERE announce_id='".$announce_id."'";
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
		session_start();
		$admin_id = $_SESSION['id'];
		$an_about = mysqli_real_escape_string($func->conn, $_POST['an_about']);
		$an_what = mysqli_real_escape_string($func->conn, $_POST['an_what']);

		if(empty($_POST['an_about'])){		
			session_start();
			$_SESSION['error'] = "Please fill out all of the fields!";
			header("location:../newAddAnnounce.php");
		} 

		else if(empty($_POST['an_what'])){		
			session_start();
			$_SESSION['error'] = "Please fill out all of the fields!";
			header("location:../newAddAnnounce.php");
		} 

		else {
			$func->insertAnnounce($admin_id, $an_about, $an_what);
				header("location:../announcement.php?inserted=1");
			}
		}



	if (isset($_POST['updateannounce'])) {

		$announce_id = mysqli_real_escape_string($func->conn, $_GET['announce_id']);
		$an_about = mysqli_real_escape_string($func->conn, $_POST['an_about']);
		$an_what = mysqli_real_escape_string($func->conn, $_POST['an_what']);
		
		if(empty($_POST['an_about'])){		
			session_start();
			$_SESSION['error'] = "Please fill out all of the fields!";
			header("location:../newUpdateAnnounce.php?announce_id=$announce_id");
		} 

		else if(empty($_POST['an_what'])){		
			session_start();
			$_SESSION['error'] = "Please fill out all of the fields!";
			header("location:../newUpdateAnnounce.php?announce_id=$announce_id");
		}

		else if($func->updateAnnounce($announce_id, $an_about, $an_what)){
			session_start();
			$_SESSION['success'] = "Announcement has been updated!";
			header("location:../newUpdateAnnounce.php?announce_id=$announce_id");
		}


		else {
			session_start();
			$_SESSION['error'] = "Something went wrong. Please provide a valid input!";
			header("location:../newUpdateAnnounce.php?announce_id=$announce_id");
			
		}			
		
		
	}

	if (isset($_GET['delfromhome'])) {
		$delfromhome = $_GET['delfromhome'];
		$announce_id = mysqli_real_escape_string($func->conn, $_GET['announce_id']);
				
		if($delfromhome == 'delete'){		
			if ($func->deleteAnnounce($announce_id)) {
			header("location:announcement.php?deleted=1");
			}
		} 
	}

	if (isset($_GET['deleteannounce'])) {
		$deleteannounce = $_GET['deleteannounce'];
		$announce_id = mysqli_real_escape_string($func->conn, $_GET['announce_id']);
				
		if($deleteannounce == 'delete'){		
			if ($func->deleteAnnounce($announce_id)) {
			header("location:../announcement.php?deleted=1");
			}
		} 
	}
	
?>