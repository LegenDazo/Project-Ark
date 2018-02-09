<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/messageFunctions.php'; 
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

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

          <?php include '../adminNavbar.php'; ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->    

              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h4>List of Messages</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <div class="container" align="center">
                          <h5>Add Message &nbsp;<a href="addMessage.php" class="btn btn-success"><i class="material-icons">add</i></a></h5>
                          <table class="table table-hovered" id="messageTable">
                              <thead>
                                <tr>
                                  <th>Message</th>
                                  <th>Sent To</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                  <th></th> 

                                </tr>
                              </thead>

                              <?php
                                  $myrow = $obj->retrieveMessageData();
                                  foreach ($myrow as $row) {
                                    ?>

                                      <tr>
                                        <td><?php echo $row['content'];?></td>
                                        <td><?php echo $row['user_id'];?></td>
                                        <td><?php echo date_format(new DateTime($row['datesent']), "M d Y")?></td>
                                        <td><a href="viewMessageDetails.php?sms_id=<?php echo $row['sms_id'];?>" class="btn btn-info">View Details</a></td><td><a href="adminMessage.php?op_id=<?php echo $row['op_id'];?>" class="btn btn-danger">DELETE</a></td>
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
    $('#messageTable').DataTable();
} );
</script>
</body>
</html>
