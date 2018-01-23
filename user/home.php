<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "admin") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include '../admin/functions/announceFunctions.php'; 
?>
<html lang="en">
<head>
  <title>ARK</title>
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

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

          <?php include 'userNavbar.php'; ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->    

              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                <center><h4>List of Announcements</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <div class="container" align="center">
                         
                          <table class="table table-hovered" id="regStudent">
                              <thead>
                                <tr>                                  
                                  <th>Admin ID</th>
                                  <th>Date Posted</th>
                                  <th>What</th>
                                  <th>Action</th>  
                                </tr>
                              </thead>

                              <?php
                                  $myrow = $func->retrieveAnnounceData();
                                  foreach ($myrow as $row) {
                                    ?>

                                      <tr>
                                        <td><?php echo $row['admin_id']?></td>
                                        <td><?php echo date_format(new DateTime($row['datepost']), 'F d, Y h:i A');?></td>                       
                                        <td><?php echo $row['an_what']?></td>
                                        <td><a href="viewAnnouncement.php?announcement_id=<?php echo $row['announcement_id'];?>" class="btn btn-info">View Details</a>&nbsp;&nbsp;&nbsp;
                                          </td>
                                          
                                        
                                      </tr>
                                    <?php    
                                  }
                              ?>
                          </table>
                        </div>
                        </div>
                      </div>
              </div>


              </div><!--END OF RIGHTCARD--> 
          </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->



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
