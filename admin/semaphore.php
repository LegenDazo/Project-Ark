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
		$sql = "SELECT contact_no FROM user";
		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		return $itemArray;

	}
}

$msg = new Message;


if (isset($_POST['sendmessage'])) {
	$ch = curl_init();
	$message = "PROJECTARK ADVISORY! ";
	$message .= $_POST['message'];
	$contact = "";
	$successCtr = 0;
	$failedCtr = 0;

	/*$parameters = array(
	    'apikey' => 'cb679f4c0a2b5854601024571ea54c96', //Your API KEY
	    'number' => '09994738632',
	    'message' => $message,
	    'sendername' => 'SEMAPHORE'
	);*/

	$myrow = $msg->retrieveContacts();
	foreach ($myrow as $row) {
		$contact .= $row['contact_no'] . ",";
	}

	$contact = trim($contact, ",");
	



	
		curl_setopt( $ch, CURLOPT_URL,'http://api.semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );
	
		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( /*$parameters*/ array('apikey' => 'cb679f4c0a2b5854601024571ea54c96', 'number' => $contact, 'message' => $message, 'sendername' => 'SEMAPHORE')) );
		

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		
		
				
		curl_close ($ch);
		$myoutput = json_decode($output, true);
		foreach ($myoutput as $row) {
			if ($row['status'] == 'pending') {
				$successCtr++;
			} else if ($row['status'] == 'failed') {
				$failedCtr++;
			}
		}

		//Show the server response
		echo "<pre>";
		var_dump($myoutput);
		echo "</pre>";
		session_start();
		echo $_SESSION['failed'] = $failedCtr;
		echo $_SESSION['success'] = $successCtr;
		
		
		
		
	

	
	
}

?>