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
                <div class="container" style="margin-top: 25px;"><!--new container-->
                    <center><h2>Resident Disease</h2></center>
                        <?php
                         if (isset($_GET['resident_id'])) {
                            $resident_id = $_GET['resident_id'];
                          }
                        ?>
                        <a href="diseaseAcquired.php" class="btn btn-warning btn-block col-md-2">Back</a>

                        

                          <table class="table table-hovered" id="regStudent">
                              <thead>
                                <tr>
                                  <th>Diseases</th>
                                  <th>Date Acquired</th>
                                  <th>Date Cured</th>
                                </tr>
                              </thead>                           
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
                                   $date = $row["date_acquired"];                       
                                    //$disease_id = $row['disease_id'];

                                   ?>
                                   <tr>
                                     <td><?php echo $disease_name ?></td>
                                     <td><?php echo $date; if(!$date) { echo "NULL"; } ?></td>
                                     <td><button class="btn btn-primary">CURE NOW!</button></td>
                                  </tr>
                                <?php
                              }
                            ?>       
                          </table>
                        <?php   
                            }
                        ?>


                                  <div class="form-group col-md-9">
                                      <h6>Resident's ID Number: <?php echo $resident_id;?></p></h6>
                                      <input type="hidden" name="resident_id" class="form-control" value="<?php echo $resident_id;?>" >
                                  </div>
                                  <div class="form-group col-md-9">
                                      <h6>Resident's Name: <?php echo $fname." ".$mname." ".$lname;?></h6>
                                  </div>

                                            </div><!--new container-->
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
