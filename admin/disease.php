<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php

include 'functions/diseaseFunctions.php';
include 'functions/retrieveDisease.php'


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
    <a href="../logout.php" style="color: white">Logout</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->
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

                                     <td>
                                      <div class="row">
                                      <a href="disease.php?deleteDisease=1&disease_id=<?php echo $row['disease_id'];?>" class="btn btn-danger col-md-5">DELETE</a>&nbsp;
                                      <a href="updateDiseases.php?process=update&disease_id=<?php echo $disease_id?>" class="btn btn-success btn-block col-md-5">Update</a>
                                      </div>
                                      </td>
                                   </tr>
                                    

                                <?php
                              }
                            ?>                             
                          </table>
                        </div>

                        <div class="modal" id="viewkey" role="dialog">
                              <div class="modal-dialog modal-md">
                                  <div class="modal-content">
                                    <div class='modal-header'>
                                      <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><h6>Close</h6></button>                                          
                                    </div>
                                    <div class="modal-body">
                                        <h3>Disease Added!</h3>
                                    </div>
                                    <div class="modal-footer"></div>
                                  </div>
                              </div>
                        </div>

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
        window.location.href='disease.php';
    });

    $('.close').click(function(){
        $('#viewkeydel').hide();
        window.location.href='disease.php';
    });

    $('#regStudent').DataTable();
} );
</script>

<script>
   $(document).ready(function(){
        <?php 
          if(isset($_GET['msg'])){
            echo "$('#viewkey').show();";
          }
        ?>
        $('.close').click(function(){
            $('#viewkey').hide();
            window.location.href="disease.php?disease_id="+<?php echo $disease_id;?>;
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/diseaseFunctions.php?deleteDisease=1&disease_id=<?php echo $disease_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
</script>

<script>
$(document).ready(function(){

$('.submit').click(function(){
    validateForm();   
});

function validateForm(){
  
</script>


</body>
</html>
