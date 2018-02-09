<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php

include 'functions/barangayFunctions.php';
include 'functions/retrieveEvacuationCenterFunction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/gif/png" href="../logo.png">
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">   
</head>


<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;"><!--START OF RIGHTCARD--> 

                  <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h3>Evacuation Center</h3></center>
                    
                      <br>


                      <form method="post" action="functions/insertEvacuationCenter.php">
                        <?php
                          if (isset($_GET['evac_id'])) {
                            $evac_id = $_GET['evac_id'];
                          
                          $myrow = $obj->retrieveEvacuationCenter3($evac_id);
                          foreach ($myrow as $key => $row) {
                            $location_name = $row['location_name'];
                            $capacity = $row['capacity'];
                            $latitude = $row['latitude'];
                            $longitude = $row['longitude'];
                            $brgy_id = $row['brgy_id'];
                            $brgy_name = $row['brgy_name'];
                            $house_no = $row['house_no'];
                            $street = $row['street'];
                            $status = $row['status'];
                          }
                          }
                        ?>
                        <div class="row">
                          <div class="col-md-8">
                          <div class="form-group">
                          <label for="location">Location Name:</label>
                          <input type="text" class="form-control" id="location" name="location" value="<?php echo $location_name;?>">
                          </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                          <label for="evac_id">Evacuation ID</label>
                          <input type="text" class="form-control" id="evac_id" name="evac_id" value="<?php echo $evac_id;?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" id="status" name="status" value="<?php echo $status;?>" readonly>
                          </div>
                        </div>
                        </div>
                        
                        

                        <div class="row">
                           
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="capacity" class="form-control" id="capacity" name="capacity" value="<?php echo $capacity;?>">
                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="lat" class="form-control" id="lat" name="lat" value="<?php echo $latitude;?>" readonly>
                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="lng">Longitude</label>
                            <input type="lng" class="form-control" id="lng" name="lng" value="<?php echo $longitude;?>" readonly>
                          </div>
                        </div>
                                 
                        </div>


                        <div class="row">
                           <div class="col-md-2">
                           <div class="form-group">
                            <label for="houseno">House #</label>
                            <input type="houseno" class="form-control" id="houseno" name="houseno" value="<?php echo $house_no;?>">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="street">Street</label>
                            <input type="street" class="form-control" id="street" name="street" value="<?php echo $street;?>">
                          </div>
                        </div>
                        <div class="form-group col-md-5">
                                  <label for="barangay">Barangay</label>
                                  <select class="form-control" id="sel1" name="brgy">
                                  <option value="<?php echo $brgy_id;?>"><?php echo $brgy_name;?></option>
                                  <option></option>
                                    <?php
                                        $myrow = $Functions->retrieve_barangayData();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['brgy_id'];?>"><?php echo $row['brgy_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>            
                        </div>

                     

                          <br>
                       
                        
                        
                          <center>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-block" name="updateevac">Update Evacuation Center</button>
                          </div>
                          </center>
                      
                        
                      </form>
                  </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->


<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>



</body>
</html>
