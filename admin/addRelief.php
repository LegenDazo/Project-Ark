<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php 
include 'functions/operationFunctions.php';
include 'functions/reliefSponsorsFunctions.php';
?>
<html lang="en">
<head>
  <link rel="icon" type="image/gif/png" href="../logo.png">
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">

</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Logout</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
        
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h6>Add Relief Details</h6></center>
                      <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
                            <form method="post" action="functions/reliefpackageFunctions.php">   
                                <div class="row">        
                              <!--    <div class="form-group col-md-2">
                                    <label for="relief_id">Package ID</label>
                                    <input  data-target="relief_id" type="text" class="form-control" id="relief_id" name="relief_id"> 
                                  </div>
                                  -->                 
                                  <div class="form-group col-md-5">
                                    <label for="relief_name">Relief Name</label>
                                    <input data-target="relief_name" type="text" class="form-control" id="relief_name" name="relief_name"> 
                                  </div>
                                
                                <div class="form-group col-md-4">
                                  <label for="sponsor_id">Sponsor Name</label>
                                  <select id="sponsor_id" name="sponsor_id" class="form-control" required>
                                    <option value="">Select a Sponsor</option>
                                    <option value="annonymous">Annonymous</option>
                                    <?php
                                      $sponsor = $dataOperation->retrieveSponsorData();
                                      foreach($sponsor as $bar) {
                                        echo "<option value='".$bar["sponsor_id"]."'>";
                                        echo $bar["sponsor_name"];
                                        echo "</option>";
                                      }
                                    ?>
                                  </select>
                                </div>

                                <div class="form-group col-md-4">
                                <label for="operation_id">Operation Name</label>
                                <select id="operation_id" name="operation_id" class="form-control" required>
                                  <option value="">Select a Operation</option>
                                  <?php
                                    $operation = $obj->retrieveOperationData();
                                    foreach($operation as $bar) {
                                      echo "<option value='".$bar["operation_id"]."'>";
                                      echo $bar["operation_name"];
                                      echo "</option>";
                                    }
                                  ?>
                                </select>
                                </div>
                              </div><br><br>

                                <center>
                                  <a href="reliefpackage.php" class="btn btn-warning">Cancel</a>&nbsp;
                                  <button class="btn btn-primary" name="addRelief">Add Relief</button></center>
                            </form>
                      </div>
              </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->


    <footer class="footer">
        <p>Project Ark © 2017 All Rights Reserved</p>
    </footer>



<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
     
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

    $('#regStudent').DataTable();
} );
</script>


</body>
</html>
