<?php session_start();
  if ($_SESSION['id'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "admin") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/gif/png" href="../logo.png">
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Logout</a>
    </nav>


      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

         <?php include 'userNavbar.php';?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->    
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
              <center><h5>Change Password</h5></center>
              <label><?php
                if(isset($_SESSION['Error'])){
                  echo "<div class='alert alert-danger' role='alert'>".$_SESSION['Error']."</div>";
                  unset($_SESSION['Error']);
                }
                else if(isset($_SESSION['Success'])){
                  echo "<div class='alert alert-success' role='alert'>".$_SESSION['Success']."</div>";
                  unset($_SESSION['Success']);
                }
              ?>
              </label>
              <center><form method="post" action="functions/changePasswordFunction.php">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" name="curPassword" class="form-control" required>
                  </div>
                </div> 
                <div class="col-md-5">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="newPassword" class="form-control" required>
                  </div>
                </div> 
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" name="conPassword" class="form-control" required>
                  </div>
                </div> 
                
                <button class="btn btn-primary" name="changePassword">Change</button>  
                </form></center>

              </div>
              </div><!--END OF RIGHTCARD--> 
          </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->

      <footer class="footer">
        <p>Project Ark © 2017 All Rights Reserved</p>
      </footer>

<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
</body>
</html>
