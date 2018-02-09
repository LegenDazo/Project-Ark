<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
  ?>
<!DOCTYPE html>
<?php include 'functions/retrieveEvacuationCenterFunction.php'; 
  ?>
<html lang="en">
  <head>
    <title>Project Ark</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
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
    <div class="container-fluid">
      <!--START OF CONTAINER FLUID-->
      <div class="row">
        <!--start of row-->
        <?php include '../adminNavbar.php'; ?>
        <div class="col-md-9">
          <!-- START of RIGHT COLUMN-->
          <div class="card" style="margin-top: 25px; margin-bottom: 25px;">
            <!--START OF RIGHTCARD-->    
            <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
              <center>
                <h4>List of Evacuation Centers</h4>
              </center>
              <div class="container" style="margin-top: 5%">
                <div class="col-md-12">
                  <div class="container" align="center">
                    <h5>Create Evacuation Center &nbsp;<a href="evacuationCenter.php" class="btn btn-success"><i class="material-icons">add</i></a></h5>
                    <table class="table table-hovered" id="regStudent">
                      <thead>
                        <tr>
                          <th>Evacuation Center</th>
                          <th>Barangay</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                        $myrow = $obj->retrieveEvacuationCenterAll();
                        foreach ($myrow as $row) {
                          $status = $row['status'];
                          $evac_id = $row['evac_id'];
                          ?>
                      <tr>
                        <td><?php echo $row['location_name'];?></td>
                        <td><?php echo $row['brgy_name'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td>
                          <?php
                            if($status === 'active'){?>
                          <a href='functions/retrieveEvacuationCenterFunction.php?inactive=1&evac_id=<?php echo $row['evac_id'];?>' class='btn btn-danger'>Set to Inactive</a>
                        
                        
                        <?php
                          } else if ($row['status'] == 'inactive') {?>

                        <a href='functions/retrieveEvacuationCenterFunction.php?active=1&evac_id=<?php echo $row['evac_id'];?>' class='btn btn-success'>Set to Active</a>

<!--                        <td><a href='functions/retrieveEvacuationCenterFunction.php?active=1&evac_id=<?php// echo $row['evac_id'];?>' class='btn btn-success'>Set to Active</a></td> -->

                        <?php
                          }
                          ?>
                          &nbsp;<a href="updateEvacCenter.php?evac_id=<?php echo $evac_id;?>" class="btn btn-info">Update</a></td>
                      </tr>
                      <?php    
                        }
                        ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--END OF RIGHTCARD--> 
        </div>
        <!-- END of RIGHT COLUMN-->
      </div>
      <!--END OF ROW-->
    </div>
    <!--END OF CONTAINER FLUID-->
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
    <script src="../datatables/datatables-bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>    
    <script>
      $(document).ready( function () {
      
        $('#regStudent').DataTable();
      } );
    </script>
  </body>
</html>