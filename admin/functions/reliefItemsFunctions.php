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

		public function retrieveNonZeroItems()
		{
			$sql = "SELECT * FROM item WHERE qty > 0 ORDER BY item_name";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retriveItemsInPackage($package_id)
		{
			$sql = "SELECT * FROM packageditems as a JOIN item as b on a.item_id = b.item_no WHERE a.package_id =".$package_id." ORDER BY b.item_name";
			$itemArray = array();
			$query = mysqli_query($this->conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function addItemToPackage($package_id, $item, $qty)
		{
			$sql = "SELECT * FROM packageditems WHERE package_id = ".$package_id." AND item_id = ".$item;

			$status = false;
			$query = mysqli_query($this->conn, $sql);
			if(mysqli_num_rows($query) == 1) {
				$sql = "UPDATE packageditems SET qty_item = qty_item + ".$qty." WHERE item_id = ".$item." AND package_id = ".$package_id;
			} else {
				$sql = "INSERT INTO packageditems (package_id, item_id, qty_item) VALUES (".$package_id.", ".$item.", ".$qty.")";
			}


			$sql .= "; UPDATE item SET qty = qty - ".$qty." WHERE item_no = ".$item;

			$query = mysqli_multi_query($this->conn, $sql);
			if($query) {
				$status = true;
			}

			return $status;
		}

		public function removeItemFromPackage($packagedItems_id, $item_id, $qty_item)
		{
			$status = false;
			$sql = "DELETE FROM packageditems WHERE packagedItems_id = ".$packagedItems_id."; UPDATE item SET qty  = qty + ".$qty_item." WHERE item_no = ".$item_id;

			$query = mysqli_multi_query($this->conn, $sql);
			if($query) {
				$status = true;
			}

			return $status;
		}
	}

$Functions = new Functions;

if (isset($_POST['insertItem'])) {
	
	$item_name = mysqli_real_escape_string($Functions->conn, $_POST['item_name']);
	$qty = mysqli_real_escape_string($Functions->conn, $_POST['qty']);
	$item_type = mysqli_real_escape_string($Functions->conn, $_POST['item_type']);
	$package_id = mysqli_real_escape_string($Functions->conn, $_POST['package_id']);

	$Functions->insertItem($item_name, $qty, $item_type, $package_id );
	//		header("location:../reliefItems.php?inserted=1");	
}	
//}else{

if (isset($_GET['deleteItem'])) {
		$item_no = mysqli_real_escape_string($Functions->conn, $_GET['item_no']);

		
			$Functions->deleteItem($item_no);
			header("location:reliefItems.php?deleted=1");
					
}

if(isset($_POST["addItem"])) {
	$package_id = mysqli_real_escape_string($Functions->conn, $_POST['package_id']);
	$item = mysqli_real_escape_string($Functions->conn, $_POST['item']);
	$qty = mysqli_real_escape_string($Functions->conn, $_POST['qty']);

	if($Functions->addItemToPackage($package_id, $item, $qty)) {
		sleep(1);
		header("location:../viewPackageDetails.php?package_id=".$package_id);	
	} else {
		
	}
}

if(isset($_POST["removeItem"])) {
	$packagedItems_id = mysqli_real_escape_string($Functions->conn, $_POST["packagedItems_id"]);
	$item_id = mysqli_real_escape_string($Functions->conn, $_POST["item_id"]);
	$qty_item = mysqli_real_escape_string($Functions->conn, $_POST["qty_item"]);
	$package_id = mysqli_real_escape_string($Functions->conn, $_POST["package_id"]);

	if($Functions->removeItemFromPackage($packagedItems_id, $item_id, $qty_item)) {
		sleep(1);
		header("location:../viewPackageDetails.php?package_id=".$package_id);
	} else {
		echo "Something went wrong, please contact an admin";
	}
}
?>