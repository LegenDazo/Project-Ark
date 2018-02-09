<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/announceFunctions.php'; 
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
        <div class="col-md-3"><!--START of LEFT COLUMN-->
                <div class="card" id="profile" style="margin-top: 25px;">
                  <img src="../images/user.png">
                  <center><label  class="name" >John Kent I. Virtudazo</label><br>
                  <label >Admin</label></center>
                    <ul class="navbar-nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="#"><i class="material-icons">edit</i>  Manage Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"><i class="material-icons">settings</i>  Change Password</a>
                      </li>
                    </ul>
                </div>
              
            <div class="card" style="margin-top: 10px;">
            <ul class="navbar-nav flex-column" id="sidenav">
              <li class="nav-item">
                <a class="nav-link active" href="home.php"><i class="material-icons">home</i>  Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="residents.php"><i class="material-icons">people</i>  Residents</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="evacuationCenter.php"><i class="material-icons">place</i>  Evacuation Centers</a>
              </li>
              <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="material-icons">healing</i>  Announcements & Messages</a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link py-0" href="">Announcement</a></li>
                                  <li class="nav-item"><a class="nav-link py-0" href="message.php">Messages</a></li>
                              </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu2" data-toggle="collapse" data-target="#submenu2"><i class="material-icons">email</i>  Relief Operation</a>
                      <div class="collapse" id="submenu2" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link py-0" href="reliefOperation.php">Operation</a></li>
                                  <li class="nav-item"><a class="nav-link py-0" href="reliefHousehold.php">Relief/Household</a></li>
                                  <li class="nav-item"><a class="nav-link py-0" href="itemResidents.php">Item/Residents</a></li>
                              </ul>
                      </div>
                    </li>                 
            </ul>
            </div>
          </div> <!--end of left column-->

          
            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->                 
                  <div class="container" style="margin-top: 25px;">
                      <center><h6>Announcement Details</h6></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">

                        <div class="panel panel-default">
                          <div class="panel-heading"><h2 align="center">Announcement Successfully Posted!</h2></div>               
                        </div><!-- end of .panel .panel-default-->
                        
                        <div class="text-right">
                            <a href="announcement.php" class="btn btn-warning">BACK</a>
                        </div>  
    
                      </div>
                    </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
            </div>
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->


    <footer class="footer">
        <p>Project Ark © 2017 All Rights Reserved</p>
    </footer>





<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>



</body>
</html>
