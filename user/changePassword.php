<!DOCTYPE html>
<html lang="en">
<head>
  <title>ARK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="#" style="color: white">Log Out</a>
    </nav>

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

         <?php include 'userNavbar.php';?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->    
              <div class="container" style="margin-top: 25px;">
              <center><h5>Change Password</h5></center>
              <form method="post" action="functions/updateProfile.php">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Current Password</label>
                    <input type="type" name="fname" class="form-control">
                  </div>
                </div> 
                <div class="col-md-5">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="type" name="mname" class="form-control">
                  </div>
                </div> 
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="type" name="mname" class="form-control">
                  </div>
                </div> 
                
                <button class="btn btn-primary" name="changePassword">Change</button>  
                </form>

              </div>
              </div><!--END OF RIGHTCARD--> 
          </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->



<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
