<?php
  session_start();
?>
<html>
<head>
  <link rel="icon" type="image/gif/png" href="logo.png">
	<title>Project Ark</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #007489;">
  <a class="navbar-brand" href="index.html">
    <h1 class="text-white">PROJECT ARK</h1>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <form class="form-inline" method="post" action="login.php">
        <input type="text" class="form-control mr-sm-2" type="text" placeholder="Username" name="username">&nbsp;
        <input type="password" class="form-control mr-sm-2" type="password" placeholder="Password" name="password">&nbsp;<br>
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="login">LOGIN</button>
      </form>
    </ul>
   
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8" style="background: #ffffff;">
      <center><img src="logo.png" height="400" width="550" class="img-responsive"></center>
      <div class="container">
        <div class="col-md-12">       
          <br>
          <h5>Get updated with the latest announcements.</h5>
          <br>
          <h5>Receive sms notifications from the administrators.</h5>
          <br>
          <h5>View the active evacuation centers.</h5>
          <br>
          <h5>See the demographics of the evacuation centers.</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4 bg-info text-white">
      <form method="post" action="signup.php" style="margin-top: 20px;">
        <?php if(isset($_SESSION['error'])){
                echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error']."</div>";
                unset($_SESSION['error']);
              }
                ?>
              <h4 style="font-weight: bold;">Join Our Community</h4>

              <div class="form-group">
                  <label for="First Name">First Name</label>
                      <input  type="text" class="form-control" placeholder="ex: Jon" name="fname" value="<?php if (isset($_SESSION['fname'])){
                        echo $_SESSION['fname']; 
                        unset($_SESSION['fname']);
                      }
                      ?>" maxlength="25" minlength="2">         
                  </div>
                  <div class="form-group">
                  <label for="Middle Name">Middle Name</label>
                      <input  type="text" class="form-control" placeholder="ex: Stark" name="mname" maxlength="25" minlength="2" value="<?php if (isset($_SESSION['mname'])){
                        echo $_SESSION['mname']; 
                        unset($_SESSION['mname']);
                      }
                      ?>">         
                  </div>
                  <div class="form-group">
                  <label for="Last Name">Last Name</label>
                      <input  type="text" class="form-control" placeholder="ex: Targaryen" name="lname" maxlength="25" minlength="2" value="<?php if (isset($_SESSION['lname'])){
                        echo $_SESSION['lname']; 
                        unset($_SESSION['lname']);
                      }
                      ?>">         
                  </div>
                  <div class="form-group">
                  <label for="Birthdate">Birthdate</label>
                      <input  type="date" class="form-control" name="bdate" value="<?php if (isset($_SESSION['bdate'])){
                        echo $_SESSION['bdate']; 
                        unset($_SESSION['bdate']);
                      }
                      ?>">         
                  </div>
                  <div class="form-group">
                  <label for="contact_no">Contact Number</label>
                      <input  type="text" class="form-control" placeholder="ex: 0922xxxxxxx" name="contact_no" maxlength="11" minlength="11" value="<?php if (isset($_SESSION['contact_no'])){
                        echo $_SESSION['contact_no']; 
                        unset($_SESSION['contact_no']);
                      }
                      ?>">         
                  </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="ex: KingInTheNorth" name="username" maxlength="25" minlength="6" value="<?php if (isset($_SESSION['username'])){
                        echo $_SESSION['username']; 
                        unset($_SESSION['username']);
                      }
                      ?>">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" maxlength="50" minlength="8">
              </div>      
                  <div class="form-group">
                  <label for="password">Confirm Password</label>
                      <input  type="password" class="form-control" name="confirmpassword">         
                  </div>
              <button class="btn btn-outline-warning btn-block btn-lg" name="signup">SUBMIT</button>
              <br>

            </form>
    </div>
  </div>

  <div class="row text-white bg-dark" style="padding: 20px;">
    <div class="col-md-4" align="center">
      <p>A WEB-BASED AND MOBILE RESPONSIVE EVACUATION CENTER MANAGEMENT SYSTEM WITH SMS NOTIFICATION.</p>
          
    </div>
    <div class="col-md-4" align="center">
      <p>IMPROVISE<br>ADAPT<br>OVERCOME</p>     
    </div>
    <div class="col-md-4" align="center">
       <p>Project Ark © 2017<br>All Rights Reserved</p>
    </div>
  </div>
</div>


</body>
</html>