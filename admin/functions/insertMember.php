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

 
 $query = '';

    
 
for($count = 0; $count<count($fname); $count++)
 {
  $fname_clean = mysqli_real_escape_string($connect, $fname[$count]);
  $mname_clean = mysqli_real_escape_string($connect, $mname[$count]);
  $lname_clean = mysqli_real_escape_string($connect, $lname[$count]);
  $gender_clean = mysqli_real_escape_string($connect, $gender[$count]);
  $bday_clean = $bday[$count]; 
  $house_memship_clean = mysqli_real_escape_string($connect, $house_memship[$count]);  
  {
   $query .= '
   INSERT INTO resident(fname, mname, lname, gender, bday, house_memship) 
   VALUES("'.$fname_clean.'", "'.$mname_clean.'", "'.$lname_clean.'", "'.$gender_clean.'", "'.$bday_clean.'", "'.$house_memship_clean.'");
   ';
  }
 }
 if($query != '')
 {
    
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
