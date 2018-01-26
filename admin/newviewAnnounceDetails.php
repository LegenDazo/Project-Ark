<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/newannounceFunctions.php'; 
      include 'functions/retrieveEvacuationCenterFunction.php';
      include 'functions/retrieveEvacIdFunction.php';


?>
<html lang="en">
<head>
  <title>Residents</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">

</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
        
        <?php include '../adminNavbar.php'; ?>

          <?php
            if(isset($_GET['announce_id'])) {
               $announce_id = $_GET['announce_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->             
                  <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <div class="col-md-12">
                      <div class="container">  
                      <center><h5>Announcement Details</h5></center>
                      <div class="col-md3 col-lg-3">  
                      <div class="col-md-12 col-lg-12"></div>
                        <?php
                         if (isset($_GET['announce_id'])) {
                            $announce_id = $_GET['announce_id'];
                          }
                        ?>  

                        <a href="newupdateAnnounce.php?announce_id=<?php echo $announce_id?>" class="btn btn-success btn-block">UPDATE</a>
                        <button id='delete' class='btn btn-danger btn-block'>DELETE</button>
                        <a href="announcement.php" class="btn btn-warning btn-block">BACK</a>
                      </div>
                      <div class="col-md-9 col-lg-9">
                                <table class="table table-hovered" id="">
                                <?php                              
                                    $myrow = $func->retrieveAnnounceItems($announce_id);
                                    foreach ($myrow as $row) {
                                        ?>
                                              <tr>
                                                <td>About</td>
                                                <td><b><?php echo $row['an_about']?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Content</td>
                                                <td><b><?php echo $row['an_what']?></b></td>
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
                  </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->






<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>

<script>
   $(document).ready(function(){
        <?php 
          if(isset($_GET['msg'])){
            echo "$('#viewkey').show();";
          }
        ?>
        $('.close').click(function(){
            $('#viewkey').hide();
            window.location.href="newviewAnnounceDetails.php?announce_id="+<?php echo $announce_id;?>;
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
