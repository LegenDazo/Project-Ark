<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php

  include 'functions/retrieveEvacuationCenterFunction.php';
  include 'functions/demographicsFunction.php';

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
                    <tr>
                      <th>Disease Name</th>
                      <th>Infected</th>
                    </tr>
                    <?php
                      $myrow = $demog->retrieveNumberOfInfected($evac_id);
                      foreach ($myrow as $row) {
                        ?>
                         <tr>
                          <td><?php echo $row['disease_name'];?></td>
                          <td><?php echo $row['infected'];?></td>
                        </tr>

                        <?php
                      }
                    ?>
                   
                  </table>
                  
                  

                  
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
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>
  $(document).ready(function(){
    $('#evacReport').DataTable();
  });
</script>

</body>
</html>
