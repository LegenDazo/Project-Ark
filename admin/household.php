<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/householdFunctions.php'; 
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
                      <center><h4>List of Households</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <div class="container" align="center">
                              <h5>Add Household &nbsp;<a href="addHousehold.php" class="btn btn-success"><i class="material-icons">add</i></a></h5>
                              <table class="table table-hovered" id="resident">
                                  <thead>
                                    <tr>
                                      <th>Household ID</th>
                                      <th>Household Head</th>
                                      <th>Head Spouse</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>

                                  <?php
                                    $myrow  = $house->retrieveHouseholdData();
                                    foreach($myrow as $row ){ ?>
                                      <tr id="<?php echo $row['household_id']; ?>">        

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

                               if($rowH['house_memship'] == "head's spouse"){
                                echo $rowH['fname']; 
                                echo " "; 
                                echo $rowH['mname']; 
                                echo " "; 
                                echo $rowH['lname'];
                              }
                               ?>
                             </td>
                               <td><a href="updateHousehold.php?household_id=<?php echo $row['household_id'];?>" class="btn btn-info">View Details</a>&nbsp;&nbsp;&nbsp;</td>
                                                            
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
        <p>Project Ark © 2017 All Rights Reserved</p>
      </footer>

<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="../datatables/datatables-jquery.js"></script>    
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
    $('#resident').DataTable();

} );
</script>
</body>
</html>
