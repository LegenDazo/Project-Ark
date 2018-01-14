<?php



	include ( "NexmoMessage.php" );
/**
* 
*/
class DataOperation
{
	public $conn;
	public function __construct()
	{
		$this->conn = mysqli_connect("localhost", "root", "", "ark");
	}

	public function retrieveRecipient()
	{
		$sql = "SELECT contact_no, username FROM user";
		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		return $itemArray;

	}

	public function insertSms($message, $username)
	{
		$sql = "INSERT INTO sms(username,content, status) VALUES('".$username."','".$message."', '1')";
		$query = mysqli_query($this->conn, $sql);
		if ($query) {
			echo "message inserted";
		} else {
			echo mysqli_error($this->conn);
		}
	}

	
}

	$obj = new DataOperation;

	if (isset($_POST['sendmessage'])) {
		$content = mysqli_real_escape_string($obj->conn, $_POST['message']);
		

		/**
		 * To send a text message.
		 *
		 */
		$from = "PROJECTARK";
		$message = $from;
		$message .= " ADVISORY! ";
		$message .= $content;

		$myrow = $obj->retrieveRecipient();
		foreach ($myrow as $row) {
			// Step 1: Declare new NexmoMessage.
			$nexmo_sms = new NexmoMessage('f2031dc7', '74bf29378762ccce');

			// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
			$info = $nexmo_sms->sendText( $row['contact_no'], $from, $message );

			$obj->insertSms($message, $row['username']);
			

			// Step 3: Display an overview of the message
			echo $nexmo_sms->displayOverview($info);

			// Done!
		}

	}

?>