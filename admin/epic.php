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
  <link rel="icon" type="image/gif/png" href="../logo.png">
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="./jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Logout</a>
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


                            <th>Relief Package Name</th><br>
                             <div class="form-group col-md-5">
                                <form id="packageForm" method="POST" action="reliefHousehold.php">

                                    <?php
                                          $myrow = $function->retrieveReliefPackage();
                                          foreach ($myrow as $row) {
                                      ?>
                                      <input type="checkbox" name="package" value="<?php echo $row['package_id'];?>" 
                                          <?php 
                                            if(isset($_POST["package_id"]) && $_POST["package_id"] == $row["package_id"]) { 
                                              echo "selected"; 
                                            } ?>><?php echo $row['package_name'];?>
                                      <?php }?>

                                </form>
                              </div>


                              <table class="display responsive nowrap" id="household">
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
                                    $myrow  = $house->retrieveHouseholdData();
                                    foreach($myrow as $row ) { ?>

                                      <tr id="<?php echo $row['household_id']; ?>"> 
                                   <!--   <form method="POST" action="functions/distributionFunction.php">
                                      <input type="hidden" name="package_id" value="<?php echo $package_id; ?>">       
-->
                               <td data-target="household_id"><?php echo $row['household_id']; ?></td>         
                               <td><?php 
                                $result = mysqli_query($house->conn, "SELECT * FROM resident WHERE household_id = ".$row['household_id']." AND house_memship = 'head'");
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
                                $result = mysqli_query($house->conn, "SELECT * FROM resident WHERE household_id = ".$row['household_id']." AND house_memship = 'head\'s spouse'");
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
                                    $result = mysqli_query($house->conn, "SELECT * FROM packagedistribution WHERE household_id = ".$row['household_id']." AND package_id = ".$package_id."");

                                  if(mysqli_num_rows($result) == 0) {
                                    echo '<input type="hidden" name="household_id" value="'.$household_id.'">';
                                    echo '<button class="btn btn-success received" type="submit" name="received" value="'.$household_id.'">Received</button>';
                                  } else {
                                    $rowNew = mysqli_fetch_assoc($result);
                                    echo $rowNew["date_dist"];
                                  }
                                }
                                
                                ?>
                              </td>   <!--</form> -->                      
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


      <footer class="footer">
        <p>Project Ark © 2018 All Rights Reserved</p>
      </footer>


<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="../datatables/datatables-jquery.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>




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

  });

  $(".received").click(function(){
    household_id = $(this).val();
    packages = $('input:checkbox:checked').map(function() {
      return this.value;
    }).get();

    console.log(household_id);
    console.log(packages);
  });
  


    $('#household').DataTable();
});
</script>
</body>
</html>
