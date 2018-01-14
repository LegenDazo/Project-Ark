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
                        <div class="col-md-12">
                          <div class="container">
                          <h2>Barangay Profile</h2>
                        </button>
                        <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12"></div>
                        <?php
                         if (isset($_GET['brgy_id'])) {
                            $brgy_id = $_GET['brgy_id'];
                          }
                        ?>
                          <a href="updateBarangayProfile.php?process=update&brgy_id=<?php echo $brgy_id?>" class="btn btn-success btn-block">Update Record</a>
                          <button id='delete' class='btn btn-danger btn-block'>Delete Record</button>
                          <a href="barangay.php" class="btn btn-warning btn-block">Back</a>
                        </div>
                        <div class="col-md-9 col-lg-9"> 
                        <?php
                          if (isset($_GET['brgy_id'])) {
                            $brgy_id = $_GET['brgy_id'];

                            $myrow = $Functions->retrieve_barangayItemData2($brgy_id);

                            foreach ($myrow as $row) {
                              $brgy_id = $row['brgy_id'];
                              $brgy_name = $row['brgy_name'];
                              $city = $row['city'];
                              $province = $row['province'];
                            }
                          }
                        ?>
                                          <table class="table table-user-information">
                                            <tbody>
                                              <tr>
                                                <td>Barangay ID</td>
                                                <td><?php echo $brgy_id;?></td>
                                              </tr>
                                              <tr>
                                                <td>Barangay Name</td>
                                                <td><?php echo $brgy_name;?></td>
                                              </tr>
                                              <tr>
                                                <td>City</td>
                                                <td><?php echo $city;?></td>
                                              </tr>
                                              <tr>
                                                <td>Province</td>
                                                <td><?php echo $province;?></td>
                                              </tr>
                                            </tbody>
                                          </table>

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
                                          <h3>Updated Barangay data successfully</h3>
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
            window.location.href="barangayProfile.php?brgy_id="+<?php echo $brgy_id;?>;
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/barangayFunctions.php?process=delete&brgy_id=<?php echo $brgy_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
</script>


</body>
</html>
