<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>



<?php

  include 'functions/retrieveEvacuationCenterFunction.php';
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


                  



                  <center><h3>Reports</h3></center>
                  <table class="table table-hovered" id="evacReport">

                    <thead>
                      <tr>
                        <th>Evacuation Center</th>
                        <th>Barangay</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                      $myrow = $obj->retrieveEvacuationCenter2();
                        foreach ($myrow as $row) {
                          ?>

                          <tr>
                            <td><?php echo $row['location_name'];?></td>
                            <td><?php echo $row['brgy_name'];?></td>
                            <td><a href="viewEvacCenterReport.php?evac_id=<?php echo $row['evac_id'];?>" class="btn btn-info">View Report</a></td>
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

      <footer id="footer" style="background-color: #2C3E50; height: 40px; bottom: 0; position: relative; width: 100%;">
        <p>All Rights Reserved</p>
      </footer>


<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
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
    $('#evacReport').DataTable();
} );

</script>

</body>
</html>
