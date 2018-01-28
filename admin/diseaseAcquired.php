<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php

//include 'functions/attendanceFunctions.php';
include 'functions/residentDiseaseFunctions.php';
//include 'functions/diseaseAcquiredFunctions.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h5>Resident's List of Disease Acquired</h5></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <table class="table table-hovered" id="insertDisease">
                              <thead>
                                <tr>
                                  <th>Resident ID</th>
                                  <th>Resident</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>

                             <?php
                              $myrow = $func->retrieve_residentData();
                              foreach ($myrow as $row) {
                                $resident_id = $row['resident_id'];                              
                                ?>
                                  <tr>
                                    <td><?php echo $row['resident_id'];?></td>
                                    <td><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']?></td>
                                     
                                     
                                        <?php
                                        $myrow = $func->retrieve_residentData2($resident_id);
                                        foreach ($myrow as $row) {

                                        ?>
                                      
                                        <?php }?>

                                     
                                     <td><a href="addDiseaseToResident.php?resident_id=<?php echo $resident_id;?>" class="btn btn-success">Add Disease</a>&nbsp;<a href="viewResidentDisease.php?resident_id=<?php echo $resident_id;?>" class="btn btn-info">View Details</a></td>

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

    $('#insertDisease').DataTable();
} );
</script>


</body>
</html>
