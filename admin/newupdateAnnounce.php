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
  <link rel="icon" type="image/gif/png" href="../logo.png">
  <title>Project Ark</title>
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
            if (isset($_GET['announce_id'])) {
              $announce_id = $_GET['announce_id'];
              $myrow = $func->retrieveAnnounceItems($announce_id);
              foreach ($myrow as $row) {
                $announce_id = $row['announce_id'];
                $an_about = $row['an_about'];
                $an_what = $row['an_what'];
                

              }
            }
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->              
                  <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h5>Update Announcement Details</h5></center>
                      <div class="container" style="margin-top: 5%">
                        <center>
                          <div class="form-group col-md-6"> 
                            <?php if(isset($_SESSION['error'])){
                              echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error']."</div>";
                              unset($_SESSION['error']);
                            }
                              ?>
                            </div> 
                        </center>
                        <div class="col-md-12">
                              <form method="post" action="functions/newannounceFunctions.php?announce_id=<?php echo $announce_id;?>">
                                <div class="panel-body"> 

                                  <div class="form-group col-md-12">
                                    <label for="an_about">About</label>
                                    <input type="text" class="form-control" id="an_about" name="an_about" value="<?php echo $an_about;?>" maxlength="500">
                                  </div>
                                    
                                  <div class="form-group col-md-12">
                                    <label for="an_what">What</label>
                                    <textarea class="form-control" rows="9" maxlength="1000" name="an_what"><?php echo $an_what;?></textarea>  
                                  </div>

                                </div>  <!--End of .panel-body--> 

                                  <div class="panel-footer">
                                    <div class="text-right">
                                    <a href="newviewAnnounceDetails.php?announce_id=<?php echo $announce_id;?>" class="btn btn-warning">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="updateannounce">Update</button>
                                    </div>
                                  </div>
                              </form>
                        </div> <!--END-->                         
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



</body>
</html>
