<?php
//fetchMember.php
$connect = mysqli_connect("localhost", "root", "", "ark");
$output = '';
$query = "SELECT * FROM resident ORDER BY household_id DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Household Members</h3>
<table class="table table-bordered">
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["fname"].'</td>
  <td>'.$row["mname"].'</td>
  <td>'.$row["lname"].'</td>
  <td>'.$row["gender"].'</td>
  <td>'.$row["bday"].'</td>  
  <td>'.$row["house_memship"].'</td>
 </tr>
 ';
}

//$output .= '</table>';
//echo $output;
?>