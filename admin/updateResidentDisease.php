<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php

include 'functions/residentDiseaseFunctions.php';

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
    <a href="../logout.php" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px;">
                        <div class="col-md-12">
                          <div class="container">
                          <h2>Resident Disease</h2>
                        <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12"></div>
                        <?php
                         if (isset($_GET['resident_id'])) {
                            $resident_id = $_GET['resident_id'];
                          }
                        ?>
                          <a href="viewResidentDisease.php?resident_id=<?php echo $resident_id;?>" class="btn btn-warning btn-block">Back</a>
                        </div>
                        <div class="col-md-9 col-lg-9"> 
                        <?php
                          if (isset($_GET['resident_id'])) {
                            $resident_id = $_GET['resident_id'];

                            $myrow = $func->retrieve_residentData2($resident_id);

                            foreach ($myrow as $row) {
                              //$acquired_id = $row['acquired_id'];
                             $resident_id = $row['resident_id']; 
                             $fname = $row['fname'];
                             $mname = $row['mname'];
                             $lname = $row['lname'];   
                             $disease_name = $row['disease_name'];                          
                              //$disease_id = $row['disease_id'];

                             ?>
                                <div class="form-group col-md-9">
                                      <h6>Disease Acquired:</h6> <br>
                                      <?php echo $disease_name ?>
                                  </div>
                             <?php
   
                            }
                          }
                        ?>
                                    <div class="form-group col-md-9">
                                      <br><h6>Resident's ID Number:</h6> <br>
                                      <?php echo $resident_id;?></p>
                                      <input type="hidden" name="resident_id" class="form-control" value="<?php echo $resident_id;?>" >
                                  </div>
                                  <div class="form-group col-md-9">
                                      <h6>Resident's Name:</h6> <br>
                                      <?php echo $fname." ".$mname." ".$lname;?>
                                  </div><br>
                        </div>
                        </div>
                          <div class="modal" id="viewkey" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                      <div class='modal-header'>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><h6>Close</h6></button>
                                          <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
                                      </div>
                                      <div class="modal-body">
                                          <h3>Updated data successfully</h3>
                                      </div>
                                      <div class="modal-footer"></div>
                                    </div>
                                </div>
                          </div>
                          <div class="modal" id="viewConfirm" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                      <div class='modal-header'>
                                          <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
                                      </div>
                                      <div class="modal-body">
                                          <h4>Are you sure you want to delete this record?</h4>
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


    <footer class="footer">
        <p>Project Ark © 2017 All Rights Reserved</p>
    </footer>




<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>     
<script>
   $(document).ready(function(){
        <?php 
          if(isset($_GET['msg'])){
            echo "$('#viewkey').show();";
          }
        ?>
        $('.close').click(function(){
            $('#viewkey').hide();
            window.location.href="viewResidentDisease.php?resident_id="+<?php echo $resident_id;?>;
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/diseaseFunctions.php?process=delete&resident_id=<?php echo $resident_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
</script>


</body>
</html>
