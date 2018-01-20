<!DOCTYPE html>
<?php

  include 'functions/retrieveEvacuationCenterFunction.php';
  include 'functions/demographicsFunction.php';

?>
<html lang="en">
<head>
  <title>ARK</title>
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
    <a href="#" style="color: white">Log Out</a>
    </nav>

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

        <?php include '../adminNavbar.php'; ?>

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                  <table>                   
                      <?php
                    if (isset($_GET['evac_id'])) {
                      $evac_id = $_GET['evac_id'];
                      $myrow = $obj->retrieveEvacuationCenter3($evac_id);

                      foreach ($myrow as $row) {
                        ?>
                        <tr><td>Evacuation Center:</td> <td><b><?php echo $row['location_name'];?></b></td></tr>
                        <tr><td>Street:</td> <td><b><?php echo $row['street'];?></b></td></tr>
                        <tr><td>Barangay:</td> <td><b><?php echo $row['brgy_name'];?></b></td></tr>
                       
                        <?php
                      }
                    }
                    
                  ?>                   
                  </table>
                  
                  <table class="table">
                    <tr><td>Total No. of Evacuees:</td><td><b><?php $evac_id = $_GET['evac_id']; echo $total = $demog->retrieveNumberOfEvacueesInSpecificEvac($evac_id);?></b></td></tr>
                    <tr><td>Total No. of Families Evacuated:</td><td><b><?php $evac_id = $_GET['evac_id']; echo $total = $demog->retrieveNumberOfFamiliesEvacuated($evac_id);?></b></td></tr>
                     <tr><td>Total No. of Female Evacuees:<td><b><?php $evac_id = $_GET['evac_id']; echo $total = $demog->retrieveNumberOfFemaleEvacueesInSpecificEvac($evac_id);?></b></td></tr>
                     <tr><td>Total No. of Male Evacuees:</td><td><b><?php $evac_id = $_GET['evac_id']; echo $total = $demog->retrieveNumberOfMaleEvacueesInSpecificEvac($evac_id);?></b></td></tr>
                  </table>

                  
                </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->



<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>
  $(document).ready(function(){
    $('#evacReport').DataTable();
  });
</script>

</body>
</html>
