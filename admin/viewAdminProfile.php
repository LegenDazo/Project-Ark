<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
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
    <a href="../logout.php" style="color: white">Log Out</a>
    </nav>

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

         <?php include '../adminNavbar.php';?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->    
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
              <center><h4>Profile</h4></center>
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
              <?php
                $myrow = $login->retrieveAdminInfo($_SESSION['username']);
                foreach ($myrow as $row) {
                  $fname = $row['fname'];
                  $lname = $row['lname'];
                  $mname = $row['mname'];
                  $bdate = $row['bday'];
          
                }
              ?>
              <center><form method="post" action="functions/updateAdmin.php">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="type" name="fname" class="form-control" value="<?php echo $fname;?>">
                  </div>
                </div> 
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Middle Name</label>
                    <input type="type" name="mname" class="form-control" value="<?php echo $mname;?>">
                  </div>
                </div> 
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="type" name="lname" class="form-control" value="<?php echo $lname;?>">
                  </div>
                </div> 
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Birthdate</label>
                    <input type="date" name="bdate" class="form-control" value="<?php echo $bdate;?>">
                  </div>
                </div>  
                        <a href="home.php" class="btn btn-warning">Cancel</a>&nbsp;
                       <button class="btn btn-primary" name="updateadmin">Change</button>  
                </form></center>

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