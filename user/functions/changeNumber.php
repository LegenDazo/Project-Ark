<?php
/**
* 
*/
class ChangeNumber
{
	public $conn;
	public function __construct()
	{
		$this->conn = mysqli_connect("localhost","root","","ark");
	}
}

$cont = new ChangeNumber;
if (isset($_POST['changepassword'])) {
	# code...
}
?>