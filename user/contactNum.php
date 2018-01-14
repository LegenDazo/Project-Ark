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

          <div class="col-md-3"><!--START of LEFT COLUMN-->
                <div class="card" id="profile" style="margin-top: 25px;">
                <img src="../images/user.png">
                  <center><label  class="name" >Mylene D. Pepito</label><br>
                  <label >Residents</label></center>
                </div>

                <div class="card" style="margin-top: 10px;">
                  <ul class="navbar-nav flex-column" id="sidenav">
                    <li class="nav-item">
                      <a class="nav-link active" href="home.php"><i class="material-icons">home</i>  Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="evacutionCenter.php"><i class="material-icons">place</i>  Evacuation Centers</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="viewProfile.php"><i class="material-icons">person</i>  View Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="material-icons">settings</i>  Manage Account</a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link py-0" href="#">Change Contact Number</a></li>
                                  <li class="nav-item"><a class="nav-link py-0" href="changePassword.php">Change Password</a></li>
                              </ul>
                        </div>
                    </li>               
                  </ul>
              </div> 
          </div><!--end of left column-->


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->    
              <div class="container" style="margin-top: 25px;">
              <center><h5>Change Contact Number</h5></center>

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
