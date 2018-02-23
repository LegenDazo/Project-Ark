<?php
/**
* 
*/
class ReliefDistribution
{
	public $conn;
	public function __construct()
	{
		$this->conn = mysqli_connect("localhost","root","","ark") or die("Connection failed!");
	}

	public function retrieveDistributionList($evac_id, $time)
	{
		/*$sql="SELECT a.date_dist, b.package_name, d.operation_name, COUNT(DISTINCT(a.household_id)) as householdnumber FROM packagedistribution as a JOIN reliefpackage as b ON a.package_id = b.package_id JOIN household as c ON a.household_id = c.household_id JOIN reliefoperation as d ON b.operation_id = d.operation_id JOIN resident as e ON c.household_id = e.household_id WHERE e.evac_id ='".$evac_id."'";*/

		$sql ="SELECT e.package_id, d.date_dist, e.package_name, f.operation_name, COUNT(DISTINCT(c.household_id)) as householdnumber FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id JOIN household as c ON b.household_id = c.household_id JOIN packagedistribution as d ON c.household_id = d.household_id JOIN reliefpackage as e ON d.package_id = e.package_id JOIN reliefoperation as f ON e.operation_id = f.operation_id JOIN evacuationcenter as g ON a.evac_id = g.evac_id WHERE g.evac_id ='".$evac_id."' AND b.house_memship = 'head'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND d.date_dist >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND d.date_dist <= '".$period[1]."'";
			}
		}

		$sql .= " GROUP BY e.package_name";

		$query = mysqli_query($this->conn, $sql);
		$itemArray = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		 return $itemArray;
	}

	public function retrieveDistributionList1($evac_id, $time, $package_id)
	{
		/*$sql="SELECT a.date_dist, b.package_name, d.operation_name, COUNT(DISTINCT(a.household_id)) as householdnumber FROM packagedistribution as a JOIN reliefpackage as b ON a.package_id = b.package_id JOIN household as c ON a.household_id = c.household_id JOIN reliefoperation as d ON b.operation_id = d.operation_id JOIN resident as e ON c.household_id = e.household_id WHERE e.evac_id ='".$evac_id."'";*/

		$sql ="SELECT DISTINCT(CONCAT(b.lname, ', ', b.fname, ' ')) as household_name, d.date_dist, e.package_name, f.operation_name FROM attendance as a JOIN resident as b ON a.resident_id = b.resident_id JOIN household as c ON b.household_id = c.household_id JOIN packagedistribution as d ON c.household_id = d.household_id JOIN reliefpackage as e ON d.package_id = e.package_id JOIN reliefoperation as f ON e.operation_id = f.operation_id JOIN evacuationcenter as g ON a.evac_id = g.evac_id WHERE g.evac_id ='".$evac_id."' AND b.house_memship = 'head' AND e.package_id ='".$package_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND d.date_dist >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND d.date_dist <= '".$period[1]."'";
			}
		}

		//$sql .= " GROUP BY e.package_name";

		$query = mysqli_query($this->conn, $sql);
		$itemArray = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		
		return $itemArray;
	}

}

$dist = new ReliefDistribution;

if(isset($_POST["packageList"])) {
	$itemArray = $dist->retrieveDistributionList1($_POST["evac_id"], $_POST["time"], $_POST["package_id"]);	

	echo json_encode($itemArray);
}



?>