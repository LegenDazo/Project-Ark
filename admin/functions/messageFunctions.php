<?php
	Class DataOperations
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost", "root", "", "ark");
		}



		public function retrieveMessageData()
		{
			$sql = "SELECT * FROM sms as a JOIN user as b on a.user_id=b.user_id";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
		public function retrieveMessageItems($sms_id)
		{
			$sql = "SELECT * FROM sms as a JOIN user as b on a.user_id=b.user_id WHERE sms_id='".$sms_id."'";
			$query = mysqli_query($this->conn, $sql);
			$itemArray = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}


		public function deleteMessage($message_id)
		{
			$sql = "DELETE FROM sms WHERE sms_id='".$message_id."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				return false;
			}
		}
	}

	$obj = new DataOperations;



	if (isset($_GET['deletemessage'])) {
		$message_id = mysqli_real_escape_string($obj->conn, $_GET['sms_id']);

			if ($obj->deleteMessage($message_id)) {
			header("location:../message.php?deleted=1");
		} else {
			header("location:../viewMessageDetails.php?sms_id=22");
		}		
	}

?>