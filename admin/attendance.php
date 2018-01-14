<?php

include 'functions/registrationFunctions.php';
include 'functions/retrieveEvacuationCenterFunction.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
    <a href="#" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px;">
                      <center><h3>Attendance</h3></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <table class="table table-striped" id="residents">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Evacuation Center</th>
                                <th>Check-In</th>
                              </tr>
                            </thead>
                            
                            <?php
                              $myrow = $Functions->retrieve_residentData();
                              foreach ($myrow as $row) {
                                $resident_id = $row['resident_id'];
                            ?>
                            <tr>
                            <td><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']?></td>
                            <td><?php echo $row['brgy_id']; echo ", "; echo $row['house_no']; echo ", "; echo $row['street']?></td>
                            
                            <form method="GET" action="functions/newAttendanceFunctions.php">
                              <input type="hidden" name="resident_id" value="<?php echo $resident_id;?>">
                            <td> 
                                <div class="form-group col-md-12">
                                  <select class="form-control" id="sel1" name="evac_id">
                                  <option></option>
                                    <?php
                                        $myrow = $obj->retrieveEvacuationCenter();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['evac_id'];?>"><?php echo $row['location_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>
                                </td>
                                <td><button class="btn btn-success" type="submit" name="checkin">Present</button></td>
                              </form>
                            </tr>
                              <?php
                                }
                              ?>
                          </table>
                        </div>
                      </div>
                    </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->






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


    $('#residents').DataTable();
} );
</script>


</body>
</html>
