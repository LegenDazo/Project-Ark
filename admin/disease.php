<?php

include 'functions/diseaseFunctions.php';
include 'functions/retrieveDisease.php'


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Disease</title>
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
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h4>List of Diseases</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <h5><center>ADD DISEASE &nbsp;<a href="addDisease.php" class="btn btn-success"><i class="material-icons">add</i></a></center></h5>
                          <table class="table table-hovered" id="regStudent">
                              <thead>
                                <tr>
                                  <th>Disease ID</th>
                                  <th>Disease Name</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                             <?php
                              $myrow = $obj->retrieveDisease();
                              foreach ($myrow as $row) {
                                $disease_id = $row['disease_id'];

                                ?>
                                   <tr>
                                     <td><?php echo $row['disease_id']?></td>
                                     <td><?php echo $row['disease_name'];?></td>
                                     <td><a href="disease.php?deleteDisease=1&disease_id=<?php echo $row['disease_id'];?>" class="btn btn-danger">DELETE</a>
                                         </td>
                                   </tr>
                                <?php
                              }
                            ?>                             
                          </table>

                           <div class="modal" id="viewConfirm" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                      <div class='modal-header'>
                                          <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
                                      </div>
                                      <div class="modal-body">
                                          <h4>Are you sure you want to delete this disease?</h4>
                                      </div>
                                      <div class="modal-footer">
                                          <button id='confirm' class='btn btn-danger btn-md'>Confirm</button>
                                          <button id='cancel' class='btn btn-warning btn-md'>Cancel</button>
                                      </div>
                                    </div>
                                </div>
                          </div>

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

    $('#delete').click(function(){
        $('#viewConfirm').show();
        $('#confirm').click(function(){
            window.location.href="disease.php?process=delete&disease_id=<?php echo $disease_id;?>";         
        });
        $('#cancel').click(function(){
            $('#viewConfirm').hide();
        });
    });

    $('#regStudent').DataTable();
} );
</script>


</body>
</html>
