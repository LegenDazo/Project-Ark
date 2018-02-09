<?php
//insertMember.php
$connect = mysqli_connect("localhost", "root", "", "ark");

if(isset($_POST["fname"]))
{
 $fname = $_POST["fname"];
 $mname = $_POST["mname"];
 $lname = $_POST["lname"];
 $gender = $_POST["gender"];
 $bday = $_POST["bday"];
 $house_memship = $_POST["house_memship"];
 $household_id = $_POST["household_id"];
 $admin_id = $_POST["admin_id"];


$fname_clean = mysqli_real_escape_string($connect, $fname);
$mname_clean = mysqli_real_escape_string($connect, $mname);
$lname_clean = mysqli_real_escape_string($connect, $lname);
$gender_clean = mysqli_real_escape_string($connect, $gender);
$bday_clean = $bday; 
$house_memship_clean = mysqli_real_escape_string($connect, $house_memship);
$admin_id = mysqli_real_escape_string($connect, $admin_id);

    if($mname_clean == "") {
      $mname_clean = NULL;
    }
    
    $query = 'INSERT INTO resident(fname, mname, lname, gender, bday, house_memship, household_id, admin_id) VALUES("'.$fname_clean.'", "'.$mname_clean.'", "'.$lname_clean.'", "'.$gender_clean.'", "'.$bday_clean.'", "'.$house_memship_clean.'", '.$household_id.', '.$admin_id.')';
    
  if(mysqli_query($connect, $query)) {
    $id = $connect->insert_id;
    $result = mysqli_query($connect, "SELECT * FROM RESIDENT WHERE resident_id = $id");
    $arr = mysqli_fetch_assoc($result);

    echo json_encode($arr);
  } else {
   echo 'Error';
  }
}
?>
