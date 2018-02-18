<?php

/**
* 
*/
class Message
{
	public $conn;
	function __construct()
	{
		$this->conn = mysqli_connect("localhost","root","","ark");
	}

	public function retrieveContacts()
	{
		$sql = "SELECT user_id, contact_no FROM user";
		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		return $itemArray;

	}
	public function insertMessage($user_id, $admin_id, $content)
	{
		$sql = "INSERT INTO sms (content, admin_id, status, user_id) VALUES ('".$content."','".$admin_id."','1','".$user_id."')";
		mysqli_query($this->conn, $sql);	
	}
}

$msg = new Message;


if (isset($_POST['sendmessage'])) {

	$ch = curl_init();
	$message = "";
	$message .= mysqli_real_escape_string($msg->conn, $_POST['message']);
	$message .= "-FROM PROJECT ARK";
	$id = mysqli_real_escape_string($msg->conn, $_POST['id']);
	$contact = "";
	$user_id = "";


		$myrow = $msg->retrieveContacts();
		foreach ($myrow as $row) {
			$user_id .= $row['user_id'] . ",";
			$contact .= $row['contact_no'] . ",";
		}
		$user_id = trim($user_id, ",");
		$contact = trim($contact, ",");
		
		$user_id = explode(",", $user_id);

	$parameters = array(
	    'apikey' => 'cb679f4c0a2b5854601024571ea54c96', //API KEY
	    'number' => $contact,
	    'message' => $message,
	    'sendername' => 'SEMAPHORE'
	);



	

	
		curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' ); //Target of the request
		curl_setopt( $ch, CURLOPT_POST, 1 ); //Method od sending data
	
		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters) );
		

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_exec( $ch ); //Execute			
		curl_close ($ch); //Close

		for ($i=0; $i < sizeof($user_id); $i++) { 
			$msg->insertMessage($user_id[$i],$id, $message);	

		}
		

		header("location:message.php?sent=1");
		//Show the server response
	
	
}

?>