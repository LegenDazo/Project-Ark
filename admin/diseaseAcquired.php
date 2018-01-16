<?php

//include 'functions/attendanceFunctions.php';
include 'functions/residentDiseaseFunctions.php';
//include 'functions/diseaseAcquiredFunctions.php';
include 'functions/retrieveEvacuationCenterFunction.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resident Disease</title>
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
                      <center><h6>List of Disease Acquired</h6></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <h4>Add Disease To Resident &nbsp;<a href="addDiseaseToResident.php" class="btn btn-success"><i class="material-icons">add</i></a></h4>
                          <table class="table table-hovered" id="insertDisease">
                              <thead>
                                <tr>
                                  <th>Resident ID</th>
                                  <th>Resident</th>
                                  <th>Disease</th>
                                  <th>&nbsp;</th>
                                </tr>
                              </thead>


                           



                             <?php
                              $myrow = $func->retrieve_residentData();
                              foreach ($myrow as $row) {
                                $resident_id = $row['resident_id'];
                                //$status = $func->retrieve_resident($resident_id);                                
                                ?>


                                   <tr>
                                    <td><?php echo $row['resident_id'];?></td>
                                    <td><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']?></td>
                                     
                                     
                                        <?php
                                        $myrow = $func->retrieveDiseaseData();
                                        foreach ($myrow as $row) {

                                        ?>
                                        <td><?php echo $row['disease_name'];?></td>
                                        <?php }?>

                                     
                                     <td><a href="viewResidentDisease.php?resident_id=<?php echo $resident_id;?>" class="btn btn-info">View Details</a></td>

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