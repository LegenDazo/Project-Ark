<?php
class Functions
{
	public $con;

	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "", "ark");
	}


		public function register($fname, $mname, $lname, $gender, $bday, $street, $house_no)
		{

			$sql = "INSERT INTO resident (fname, mname, lname, gender, bday, street, house_no) VALUES ('".$fname."','".$mname."','".$lname."','".$gender."','".$bday."','".$street."','".$house_no."')";
				$query = mysqli_query($this->con, $sql);
				if ($query) {
					return true;
				} else {
					echo mysqli_error($this->con);
				}
		}

		public function retrieve_residentData()
		{
			$sql = "SELECT TIMESTAMPDIFF (year, bday, NOW()) as age, fname,lname, gender, mname FROM resident";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function retrieve_attendanceStatus()
		{
			$sql = "SELECT * FROM attendance";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

			public function retrieve_residentItemData2($resident_id)
		{
			$sql = "SELECT * FROM resident WHERE resident_id ='".$resident_id."'";
			$itemArray = array();
			$query = mysqli_query($this->con, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
				$itemArray[] = $row;
			}
			return $itemArray;
		}

		public function deleteResidentRecord($resident_id)
		{
			$sql = "DELETE FROM resident WHERE resident_id='".$resident_id."'";
			$query = mysqli_query($this->con, $sql);
			if($query){
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}

		public function updateResidentRecord($resident_id, $fname, $mname, $lname, $gender, $bday, $street, $house_no)
		{
			$sql = "UPDATE resident SET fname='".$fname."',mname='".$mname."',lname='".$lname."',gender='".$gender."',bday='".$bday."',street='".$street."',house_no='".$house_no."' WHERE resident_id='".$resident_id."'";
			$query = mysqli_query($this->con, $sql);
			if ($query) {
				return true;
			} else {
				echo mysqli_error($this->con);
			}
		}
}

$Functions = new Functions;

if(isset($_POST['Register'])){

	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$bday = $_POST['bday'];
	$street = $_POST['street'];
	$house_no = $_POST['house_no'];

		$Functions->register($fname, $mname, $lname, $gender, $bday, $street, $house_no);
				header("location:../residents.php?inserted=1");
}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$resident_id = $_GET['resident_id'];

		if($process == 'delete'){
			if($Functions->deleteResidentRecord($resident_id)){
				header("location:../residents.php?deleted=1");
			}
		} 
	}

if(isset($_GET['process'])){
		$process = $_GET['process'];
		$resident_id = $_GET['resident_id'];

		if($process == 'update'){
			if(isset($_POST['updateRes'])){
				$resident_id = mysqli_real_escape_string($Functions->con, $_POST['resident_id']);
				$fname = mysqli_real_escape_string($Functions->con, $_POST['fname']);
				$mname = mysqli_real_escape_string($Functions->con, $_POST['mname']);
				$lname = mysqli_real_escape_string($Functions->con, $_POST['lname']);
				$gender = mysqli_real_escape_string($Functions->con, $_POST['gender']);
				$bday = mysqli_real_escape_string($Functions->con, $_POST['bday']);
				$street = mysqli_real_escape_string($Functions->con, $_POST['street']);
				$house_no = mysqli_real_escape_string($Functions->con, $_POST['house_no']);
				

				if($Functions->updateResidentRecord($resident_id, $fname, $mname, $lname, $gender, $bday, $street, $house_no )){
					header("location:../residents.php?resident_id=$resident_id&msg=updated");
				}
			}
		}
	}

?>