<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "Codeusctc", "ark");
$output = '';
$query = "SELECT * FROM resident ORDER BY household_id DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
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
  <td>'.$row["age"].'</td>
  <td>'.$row["house_memship"].'</td>
 </tr>
 ';
}
$output .= '</table>';
//echo $output;
?>