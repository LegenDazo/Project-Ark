<?php
/**
* 
*/
class Demographics
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
	public function retrieveNumberOfFamiliesEvacuated($evac_id, $time)
	{
		$sql = "SELECT COUNT(DISTINCT(a.household_id)) as totalFamiliesEvacuated FROM resident as a JOIN attendance as b ON a.resident_id = b.resident_id WHERE b.evac_id = '".$evac_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND b.date >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND b.date <= '".$period[1]."'";
			}
		}

		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalFamiliesEvacuated'];
	}
	public function retrieveFamiliesEvacuated($evac_id, $time)
	{
		$sql = "SELECT DISTINCT(CONCAT(a.lname, ', ', a.fname, ' ')) as household_name  FROM resident as a JOIN attendance as b ON a.resident_id = b.resident_id WHERE b.evac_id = '".$evac_id."' AND a.household_id IS NOT NULL";
		$itemArray = array();
		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND b.date >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND b.date <= '".$period[1]."'";
			}
		}
		$sql .=" GROUP BY a.household_id ORDER BY a.house_memship = 'head'";
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		
		return $itemArray;
	}
	public function retrieveNumberOfEvacueesInSpecificEvac($evac_id, $time)
	{
		$sql = "SELECT COUNT(*) as totalEvacuees FROM attendance WHERE evac_id='".$evac_id."'";
		
		// "SELECT COUNT(*) AS totalEvacuees FROM attendance WHERE evac_id = $evac_id"
		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND date >= '".$period[0]."'";
			// "SELECT COUNT(*) AS totalEvacuees FROM attendance WHERE evac_id = $evac_id AND DATE >= $start_date"
			if($period[1] != "") {
				// "SELECT COUNT(*) AS totalEvacuees FROM attendance WHERE evac_id = $evac_id AND date >= $start_date AND date <= $end_date"
				$sql .= " AND date <= '".$period[1]."'";
			}
		}

		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalEvacuees'];
	}
	public function retrieveEvacueesInSpecificEvac1($evac_id, $time)
	{
		$sql = "SELECT * FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id WHERE evac_id='".$evac_id."'";
		$itemArray = array();
		// "SELECT COUNT(*) AS totalEvacuees FROM attendance WHERE evac_id = $evac_id"
		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND date >= '".$period[0]."'";
			// "SELECT COUNT(*) AS totalEvacuees FROM attendance WHERE evac_id = $evac_id AND DATE >= $start_date"
			if($period[1] != "") {
				// "SELECT COUNT(*) AS totalEvacuees FROM attendance WHERE evac_id = $evac_id AND date >= $start_date AND date <= $end_date"
				$sql .= " AND date <= '".$period[1]."'";
			}
		}

		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		return $itemArray;
	}
	public function retrieveNumberOfFemaleEvacueesInSpecificEvac($evac_id, $time)
	{
		$sql = "SELECT count(*) as totalFemaleEvacuees FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id WHERE b.gender = 'Female' AND a.evac_id='".$evac_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date <= '".$period[1]."'";
			}
		}

		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalFemaleEvacuees'];
	}
	public function retrieveFemaleEvacueesInSpecificEvac1($evac_id, $time)
	{
		$sql = "SELECT * FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id WHERE b.gender = 'Female' AND a.evac_id='".$evac_id."'";
		$itemArray = array();
		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date <= '".$period[1]."'";
			}
		}

		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		
		return $itemArray;
	}
	public function retrieveNumberOfMaleEvacueesInSpecificEvac($evac_id, $time)
	{
		$sql = "SELECT count(*) as totalMaleEvacuees FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id WHERE b.gender = 'Male' AND a.evac_id='".$evac_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date <= '".$period[1]."'";
			}
		}

		$query = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($query);
		return $result['totalMaleEvacuees'];
	}
	public function retrieveMaleEvacueesInSpecificEvac1($evac_id, $time)
	{
		$sql = "SELECT * FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id WHERE b.gender = 'Male' AND a.evac_id='".$evac_id."'";
		$itemArray = array();
		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date <= '".$period[1]."'";
			}
		}

		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		
		return $itemArray;
	}
	public function retrieveNumberOfInfected($evac_id, $time)
	{
		$sql = "SELECT COUNT(a.resident_id) as infected, b.disease_name , a.disease_id FROM diseaseacquired as a JOIN disease as b ON a.disease_id = b.disease_id JOIN resident as c ON a.resident_id = c.resident_id JOIN attendance as d ON c.resident_id = d.resident_id WHERE d.evac_id ='".$evac_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date_acquired >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date_acquired <= '".$period[1]."'";
			}
		}

		$sql .= " GROUP BY b.disease_name";

		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}		
		return $itemArray;
	}
	public function retrieveInfected($evac_id, $time, $disease_id)
	{
		$sql = "SELECT CONCAT(c.lname, ', ', c.fname, ' ') as resident_name, b.disease_name, a.date_acquired, a.date_cured FROM diseaseacquired as a JOIN disease as b ON a.disease_id = b.disease_id JOIN resident as c ON a.resident_id = c.resident_id JOIN attendance as d ON c.resident_id = d.resident_id WHERE d.evac_id ='".$evac_id."' AND b.disease_id = '".$disease_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date_acquired >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date_acquired <= '".$period[1]."'";
			}
		}

		//$sql .= " GROUP BY b.disease_name";

		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}		
		return $itemArray;
	}

	public function retrieveInfected1($evac_id, $time)
	{
		$sql = "SELECT CONCAT(c.lname, ', ', c.fname, ' ') as resident_name, b.disease_name, a.date_acquired, a.date_cured FROM diseaseacquired as a JOIN disease as b ON a.disease_id = b.disease_id JOIN resident as c ON a.resident_id = c.resident_id JOIN attendance as d ON c.resident_id = d.resident_id WHERE d.evac_id ='".$evac_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date_acquired >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date_acquired <= '".$period[1]."'";
			}
		}

		//$sql .= " ORDER BY b.disease_name";

		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}		
		return $itemArray;
	}
	public function retrieveNumberOfInfected2()
	{
		$sql = "SELECT COUNT(a.resident_id) as infected, b.disease_name FROM diseaseacquired as a JOIN disease as b ON a.disease_id = b.disease_id JOIN resident as c ON a.resident_id = c.resident_id JOIN attendance as d ON c.resident_id = d.resident_id GROUP BY b.disease_name";
		$itemArray = array();
		$query = mysqli_query($this->conn, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}		
		return $itemArray;
	}


}

$demog = new Demographics;


if(isset($_POST["healthStat"])) {
	$itemArray = $demog->retrieveInfected($_POST["evac_id"], $_POST["time"], $_POST["disease_id"]);	

	echo json_encode($itemArray);
}
?>