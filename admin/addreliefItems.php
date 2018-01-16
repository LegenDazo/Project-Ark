<!DOCTYPE html>
<?php

include 'functions/reliefSponsorsFunctions.php';
include 'functions/reliefpackageFunctions.php';

?>
<html lang="en">
<head>
  <title>PROJECT ARK</title>
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
    <a href="#" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
        
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px;">
                      <center><h4>Inout Item Details</h4></center>
                      <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
                            <form method="post" action="functions/reliefItemsFunctions.php">    
                              <div class="row">                                                      
                              <div class="form-group col-md-5">
                                <label for="item_name">Item Name</label>
                                <input data-target="item_name" type="text" class="form-control" id="item_name" name="item_name"> 
                              </div>

                              <div class="form-group col-md-3">
                                <label for="qty">Quantity</label>
                                <input  data-target="qty" type="text" class="form-control" id="qty" name="qty"> 
                              </div>

                              <div class="form-group col-md-3">
                                <label for="item_type">Item Type</label>
                                <input  data-target="item_type" type="text" class="form-control" id="item_type" name="item_type"> 
                              </div>
                                       
                              </div>

                              <div class="row"> 

                              <div class="form-group col-md-4">
                                <label for="sponsor_id">Sponsor</label>
                                <select id="sponsor" name="sponsor_id" class="form-control" required>
                                  <option value="">Select a Sponsor</option>
                                  <?php
                                    $sponsor = $dataOperations->retrieveSponsorData();
                                    foreach($sponsor as $bar) {
                                      echo "<option value='".$bar["sponsor_id"]."'>";
                                      echo $bar["sponsor_name"];
                                      echo "</option>";
                                    }
                                  ?>
                                </select>
                              </div>

                              <div class="form-group col-md-4">
                                <label for="package_id">Package</label>
                                <select id="package" name="package_id" class="form-control" required>
                                  <option value="">Select a Package</option>
                                  <?php
                                    $package = $obj->retrieveReliefData();
                                    foreach($package as $bar) {
                                      echo "<option value='".$bar["package_id"]."'>";
                                      echo $bar["package_name"];
                                      echo "</option>";
                                    }
                                  ?>
                                </select>
                              </div>       
                                               
                              </div><br>

                                <center><a class="btn btn-primary" href="reliefItems.php">Cancel</a>&nbsp;&nbsp;&nbsp;
                                        <button class="btn btn-primary" name="insertItem">Add Item</button></center>
                            </form>
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

    $('.close').click(function(){
        $('#viewkey').hide();
        window.location.href='registerStudent.php';
    });

    $('.close').click(function(){
        $('#viewkeydel').hide();
        window.location.href='registerStudent.php';
    });

    $('#regStudent').DataTable();
} );
</script>


</body>
</html>