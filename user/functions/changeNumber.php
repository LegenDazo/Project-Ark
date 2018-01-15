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

$obj = new ChangeNumber;
?>