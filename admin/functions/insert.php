<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "ark");

if(isset($_POST["fname"]))
{
 $fname = $_POST["fname"];
 $mname = $_POST["mname"];
 $lname = $_POST["lname"];
 $gender = $_POST["gender"];
 $bday = $_POST["bday"];
// $age = $_POST["age"];
 $house_memship = $_POST["house_memship"];

 $house_no = mysqli_real_escape_string($connect, $_POST["house_no"]);
 $street = mysqli_real_escape_string($connect,$_POST["street"]);
 $brgy_id = mysqli_real_escape_string($connect,$_POST["brgy_id"]);
 $query = '';

    $result = mysqli_query($connect, "
    SHOW TABLE STATUS LIKE 'household'");
    $data = mysqli_fetch_assoc($result);
    $next_increment = $data['Auto_increment'];
 
for($count = 0; $count<count($fname); $count++)
 {
  $fname_clean = mysqli_real_escape_string($connect, $fname[$count]);
  $mname_clean = mysqli_real_escape_string($connect, $mname[$count]);
  $lname_clean = mysqli_real_escape_string($connect, $lname[$count]);
  $gender_clean = mysqli_real_escape_string($connect, $gender[$count]);
  $bday_clean = $bday[$count];
 // $age_clean = mysqli_real_escape_string($connect, $age[$count]);
  $house_memship_clean = mysqli_real_escape_string($connect, $house_memship[$count]);
  echo $fname_clean." ".$mname_clean." ".$lname_clean." ".$gender_clean." ".$bday_clean." ".$house_memship_clean;
  if($fname_clean != '' && $mname_clean != '' && $lname_clean != '' && $gender_clean != '' && $bday_clean != '' /* && $age_clean != '' */ && $house_memship_clean != '')
  {
   $query .= '
   INSERT INTO resident(fname, mname, lname, gender, bday, house_memship, house_no, street, brgy_id, household_id) 
   VALUES("'.$fname_clean.'", "'.$mname_clean.'", "'.$lname_clean.'", "'.$gender_clean.'", "'.$bday_clean.'", "'.$house_memship_clean.'", "'.$house_no.'", "'.$street.'", "'.$brgy_id.'", "'.$next_increment.'");
   ';
  }
 }
 if($query != '')
 {
    mysqli_query($connect, "INSERT INTO household (household_id) VALUES (null)");
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>
