<?php
	Class DataOperations
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}

		public function insertMessage($message_name, $message_date)
		{
			$sql = "INSERT INTO message (message_name, message_date) VALUES ('".$message_name."','".$message_date."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveMessageItems($message_id)
		{
			$sql = "SELECT * FROM message WHERE message_id = '".$message_id."'";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieveMessageData()
		{
			$sql = "SELECT * FROM sms";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function updateMessage($message_id, $message_name, $message_date)
		{
			$sql = "UPDATE message SET message_id='".$message_id."',message_name='".$message_name."',message_date='".$message_date."' WHERE message_id='".$message_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function deleteMessage($message_id)
		{
			$sql = "DELETE FROM message WHERE message_id='".$message_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}
	}

	$obj = new DataOperations;

	if (isset($_POST['submitmessage'])) {

		$message_name = mysqli_real_escape_string($obj->conn, $_POST['message_name']);
		$message_date = mysqli_real_escape_string($obj->conn, $_POST['message_date']);
		
		if ($obj->insertMessage($message_name, $message_date)) {
			header("location:adminMessage.php?inserted=1");
		}
	}

	if (isset($_POST['updatemessage'])) {

		$message_id = mysqli_real_escape_string($obj->conn, $_GET['message_id']);
		$message_name = mysqli_real_escape_string($obj->conn, $_POST['message_name']);
		$message_date = mysqli_real_escape_string($obj->conn, $_POST['message_date']);
				
		if ($obj->updateMessage($message_id, $message_name, $message_date)) {
			header("location:viewMessageDetails.php?updated=1&message_id=$message_id");
		}
	}

	if (isset($_GET['deletemessage'])) {
		$message_id = mysqli_real_escape_string($obj->conn, $_GET['message_id']);

			if ($obj->deleteMessage($message_id)) {
			header("location:adminMessage.php?deleted=1");
		}		
	}

?>