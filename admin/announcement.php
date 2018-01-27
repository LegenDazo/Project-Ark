<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/newannounceFunctions.php'; 
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
                <center><h4>List of Announcements</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <div class="container" align="center">
                          <h5>Add Announcement &nbsp;<a href="newaddAnnounce.php" class="btn btn-success"><i class="material-icons">add</i></a></h5>
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
                                        <td><a href="newviewAnnounceDetails.php?announce_id=<?php echo $row['announce_id'];?>" class="btn btn-info">View Details</a>&nbsp;&nbsp;&nbsp;
                                            <a href="announcement.php?delfromhome=delete&announce_id=<?php echo $row['announce_id'];?>" class="btn btn-danger">DELETE</a>
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
                                          <h3>Announcement Posted!</h3>
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
                                          <h4>Are you sure you want to delete this announcement?</h4>
                                      </div>
                                      <div class="modal-footer">
                                          <button id='confirm' class='btn btn-danger btn-md'>Confirm</button>
                                          <button id='cancel' class='btn btn-warning btn-md'>Cancel</button>
                                      </div>
                                    </div>
                                </div>
                          </div>
                          <div class="modal" id="viewkey" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                      <div class='modal-header'>
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><h6>Close</h6></button>                                          
                                      </div>
                                      <div class="modal-body">
                                          <h3>Announcement Deleted!</h3>
                                      </div>
                                      <div class="modal-footer"></div>
                                    </div>
                                </div>
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
        window.location.href='announcement.php';
    });

    $('.close').click(function(){
        $('#viewkeydel').hide();
        window.location.href='announcement.php';
    });

    $('.close').click(function(){
        $('#viewkeydel').hide();
        window.location.href='announcement.php';
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
            window.location.href="announcement.php";
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/newannounceFunctions.php?deleteannounce=delete&announce_id=<?php echo $announce_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
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
            window.location.href="announcement.php";
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/newannounceFunctions.php?deleteannounce=delete&announce_id=<?php echo $announce_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
</script>

</body>
</html>
