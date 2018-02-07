<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/householdFunctions.php';
include 'functions/itemResidentsFunctions.php'; 
?>
<html lang="en">
<head>
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="./jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Log Out</a>
    </nav>

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->
          <?php include '../adminNavbar.php'; ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;"><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h4>Relief/Household Distribution</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <div class="container" align="center">


                            <th>Relief Package Name</th>
                             <div class="form-group col-md-5">
                                <form id="packageForm" method="POST" action="reliefHousehold.php">
                                  <select class="form-control" id="package" name="package_id">
                                    <option value="">Please select a package...</option>
                                      <?php
                                          $myrow = $function->retrieveReliefPackage();
                                          foreach ($myrow as $row) {
                                      ?>
                                      <option value="<?php echo $row['package_id'];?>" 
                                          <?php 
                                            if(isset($_POST["package_id"]) && $_POST["package_id"] == $row["package_id"]) { 
                                              echo "selected"; 
                                            } ?>><?php echo $row['package_name'];?></option>
                                      <?php }?>
                                    </select>
                                </form>
                              </div>


                              <table class="table table-hovered" id="household">
                                  <thead>
                                    <tr>
                                      <th>HH ID</th>
                                      <th>Household Head</th>
                                      <th>Head Spouse</th>
                                      
                                      <th>Action</th>
                                    </tr>
                                  </thead>

                                  <?php
                                    $package_id = isset($_POST["package_id"]) ? $_POST["package_id"] : -1;
                                    $myrow  = $obj->retrieveHouseholdData();
                                    foreach($myrow as $row ) { ?>

                                      <tr id="<?php echo $row['household_id']; ?>"> 
                                      <form method="POST" action="functions/distributionFunction.php">
                                      <input type="hidden" name="package_id" value="<?php echo $package_id; ?>">       

                               <td data-target="household_id"><?php echo $row['household_id']; ?></td>         
                               <td><?php 
                                $result = mysqli_query($obj->conn, "SELECT * FROM resident WHERE household_id = ".$row['household_id']." AND house_memship = 'head'");
                                $rowH = mysqli_fetch_assoc($result);
                                if($rowH['house_memship'] == 'head'){
                                echo $rowH['fname'];
                                echo " "; 
                                echo $rowH['mname'];
                                echo " "; 
                                echo $rowH['lname'];
                                }?>
                             </td>
                             <td>
                               <?php 
                                $result = mysqli_query($obj->conn, "SELECT * FROM resident WHERE household_id = ".$row['household_id']." AND house_memship = 'head\'s spouse'");
                                $rowH = mysqli_fetch_assoc($result);
                                $household_id = $row["household_id"];

                               if($rowH['house_memship'] == "head's spouse"){
                                echo $rowH['fname']; 
                                echo " "; 
                                echo $rowH['mname']; 
                                echo " "; 
                                echo $rowH['lname'];
                              }
                               ?>
                             </td>


                               <td>
                                <?php

                                  if(!isset($_POST["package_id"]) || $_POST["package_id"] == "") {
                                    //echo "No Package Selected";
                                  } else {
                                    $package_id = $_POST["package_id"];
                                    $result = mysqli_query($obj->conn, "SELECT * FROM packagedistribution WHERE household_id = ".$row['household_id']." AND package_id = ".$package_id."");

                                  if(mysqli_num_rows($result) == 0) {
                                    echo '<input type="hidden" name="household_id" value="'.$household_id.'">';
                                    echo '<button class="btn btn-success received" type="submit" name="received" value="'.$household_id.'">Received</button>';
                                  } else {
                                    $rowNew = mysqli_fetch_assoc($result);
                                    echo $rowNew["date_dist"];
                                  }
                                }
                                
                                ?>
                              </td>   </form>                       
                                </tr>
                              
                                  <?php }
                                    ?> 

                            </table>
                          </div>
                        </div>
                      </div>      
                </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->



<script type="text/javascript">
  /*$(document).ready(function(){
    $.ajax({
      type: "GET",
      data: 
    })
  }) */
</script>

<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>    
<script>
  $(document).ready( function () {
  <?php 
    if(isset($_GET['inserted'])){
      echo "$('#viewkey').show();";
    }

    if(isset($_GET['deleted'])){
      echo "$('#viewkeydel').show();";
    }
  ?>

  $("#package").change(function() {

    $("#packageForm").submit();
    

//    $.post("reliefHousehold.php", {package_id: package_id }, function(response, status) {
//      console.log(status);
//    });

  //  console.log(package_id);
  });

 // $('.received').click(function() {
  //    var package_id = $("#package").val();
  //    var household_id = $(this).attr("value");
      //  var select_id = '#pack'+household_id;
      //  var value = $(select_id).val();

//      $.post('functions/distributionFunction.php',"household_id="+household_id+"&package_id="+package_id+"&received='received'",function(response) {
 //       console.log(response);
//      });

//    });

    $('#household').DataTable();
});
</script>
</body>
</html>
