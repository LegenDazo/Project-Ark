<?php
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

	public function retrieveNumberOfResidents()
	{
		$sql = "SELECT count(*) as totalResidents FROM resident";
		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalResidents'];
	}

	public function retrieveNumberOfMaleEvacuees()
	{
		$sql = "SELECT count(*) as totalMaleEvacuees FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id WHERE b.gender = 'Male'";
		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalMaleEvacuees'];
	} 
	public function retrieveNumberOfFemaleEvacuees()
	{
		$sql = "SELECT count(*) as totalFemaleEvacuees FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id WHERE b.gender = 'Female'";
		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalFemaleEvacuees'];
	} 

	public function retrieveNumberOfEvacuees()
	{
		$sql = "SELECT count(*) as totalEvacuees FROM attendance";
		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalEvacuees'];
	}


}

$demog = new DataOperation;

?>