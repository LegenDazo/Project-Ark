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
		$sql="SELECT a.date_dist, b.package_name, d.operation_name, COUNT(DISTINCT(a.household_id)) as householdnumber FROM packagedistribution as a JOIN reliefpackage as b ON a.package_id = b.package_id JOIN household as c ON a.household_id = c.household_id JOIN reliefoperation as d ON b.operation_id = d.operation_id JOIN evacuationcenter as e ON d.evac_id = e.evac_id WHERE e.evac_id ='".$evac_id."'";

		if($time != "showAll") {
			$period = explode(",", $time);
			$sql .= " AND a.date_dist >= '".$period[0]."'";
			if($period[1] != "") {
				$sql .= " AND a.date_dist <= '".$period[1]."'";
			}
		}

		$sql .= " GROUP BY b.package_name";

		$query = mysqli_query($this->conn, $sql);
		$itemArray = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$itemArray[] = $row;
		}
		 return $itemArray;
	}

}

$dist = new ReliefDistribution;



?>