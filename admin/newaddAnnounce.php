<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/newannounceFunctions.php'; 
      include 'functions/retrieveEvacuationCenterFunction.php';
?>
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
                          <center><h5>Announcement Details</h5></center>
                          <div class="container" style="margin-top: 5%">
                              
                                  <form method="POST" action="functions/newannounceFunctions.php">
                                     <div class="panel-body">  

                                            <div class="form-group col-md-12">
                                              <label for="an_about"><h6>About:</h6></label>
                                              <textarea class="form-control" rows="2" id="an_about" name="an_about" required></textarea>                        
                                            </div>

                                            <div class="form-group col-md-12">
                                              <label for="an_what"><h6>Input Announcements Below:</h6></label>
                                              <textarea class="form-control" rows="9" id="an_what" name="an_what" required></textarea>                        
                                            </div>

                                    </div>  <!--End of .panel-body-->
                                    <br>     
                                    
                                        <div class="panel-footer">
                                          <div class="text-right">
                                          <a href="newannouncement.php" class="btn btn-warning">Cancel</a>  
                                          <button type="submit" class="btn btn-primary" name="submitannounce">Post</button>
                                          </div>
                                        </div>

                                  </form>

                              
                          </div>
                  </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->






<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>



</body>
</html>
