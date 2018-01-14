<?php

include 'functions/barangayFunctions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Barangay</title>
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
                      <center><h6>List of Registered Barangays</h6></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <h4>ADD BARANGAY &nbsp;<a href="barangayRegistration.php" class="btn btn-success"><i class="material-icons">add</i></a></h4>
                          <table class="table table-hovered" id="registerBarangay">
                              <thead>
                                <tr>
                                  <th>Barangay Name</th>
                                  <th>City</th>
                                  <th>Province</th>
                                  <th>&nbsp;</th>
                                </tr>
                              </thead>
                             <?php
                              $myrow = $Functions->retrieve_barangayData();
                              foreach ($myrow as $row) {
                                ?>
                                   <tr>
                                     <td><?php echo $row['brgy_name']?></td>
                                     <td><?php echo $row['city'];?></td>
                                     <td><?php echo $row['province'];?></td>
                                     <td><a href="barangayProfile.php?brgy_id=<?php echo $row['brgy_id'];?>" class="btn btn-info">View Barangay</td>
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
