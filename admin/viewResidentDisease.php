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
                          <h2>Resident Disease</h2>
                        </button>
                        <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12"></div>
                        <?php
                         if (isset($_GET['resident_id'])) {
                            $resident_id = $_GET['resident_id'];
                          }
                        ?>
                          <a href="updateResidentDisease.php?process=update&resident_id=<?php echo $resident_id?>" class="btn btn-success btn-block">Update Record</a>
                          <button id='delete' class='btn btn-danger btn-block'>Delete Record</button>
                          <a href="diseaseAcquired.php" class="btn btn-warning btn-block">Back</a>
                        </div>
                        <div class="col-md-9 col-lg-9"> 
                        <?php
                          if (isset($_GET['resident_id'])) {
                            $resident_id = $_GET['resident_id'];

                            $myrow = $func->retrieveDiseaseItemData2($resident_id);

                            foreach ($myrow as $row) {
                              //$acquired_id = $row['acquired_id'];
                             // $resident_id = $row['resident_id'];                              
                              //$disease_id = $row['disease_id'];
   
                            }
                          }
                        ?>
                                <table class="table table-user-information">
                                  <tbody>
                                    <tr>
                                      <td>Resident ID</td>
                                      <td><?php echo $resident_id;?></td>
                                    </tr>                                    

                                    <tr>                                      
                                      <?php
                                        $myrow = $func->retrieve_residentData();
                                        foreach ($myrow as $row) {
                                          //$resident_id = $row['resident_id'];
                                        ?>
                                      <td>Resident Name</td>
                                      <td><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']?></td>
                                    </tr>

                                    <tr>
                                      <?php
                                        $myrow = $func->retrieveDiseaseData();
                                        foreach ($myrow as $row) {

                                        ?>
                                      <td>Disease</td>
                                      <td><?php echo $row['disease_name'];?></td>
                                      <?php }?>

                                    </tr>


                                    <?php
                                    }
                                  ?>                           
                            
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
