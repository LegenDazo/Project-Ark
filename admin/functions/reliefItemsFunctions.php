<?php
	/**
	* 
	*/
	class Functions
	{
		public $conn;
		public function __construct()
		{
			$this->conn = mysqli_connect("localhost","root","","ark");
		}

		public function insertItem ($item_name, $qty, $item_type, $package_id)
		{
			$sql = "INSERT INTO item (item_name, qty, item_type, package_id) VALUES ('".$item_name."','".$qty."','".$item_type."','".$package_id."')";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveItemData()
		{
			$sql = "SELECT * FROM item";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function deleteItem($item_no)
		{
			$sql = "DELETE FROM item WHERE item_no='".$item_no."'";
			$query = mysqli_query($this->conn, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->conn);
			}
		}

		public function retrieveItemData3()
		{
			$sql = "SELECT * FROM item as a JOIN reliefpackage as b ON a.package_id = b.package_id";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}
	}

$Functions = new Functions;

if (isset($_POST['insertItem'])) {
	
	$item_name = mysqli_real_escape_string($Functions->conn, $_POST['item_name']);
	$qty = mysqli_real_escape_string($Functions->conn, $_POST['qty']);
	$item_type = mysqli_real_escape_string($Functions->conn, $_POST['item_type']);
	$package_id = mysqli_real_escape_string($Functions->conn, $_POST['package_id']);

	$Functions->insertItem($item_name, $qty, $item_type, $package_id );
			header("location:../reliefItems.php?inserted=1");	
}	
//}else{

if (isset($_GET['deleteItem'])) {
		$item_no = mysqli_real_escape_string($Functions->conn, $_GET['item_no']);

		
			$Functions->deleteItem($item_no);
			header("location:reliefItems.php?deleted=1");
				
	}
?>