<?php
  session_start();
?>
<html>
<?php include'verify.php';?>
<head>
  <link rel="icon" type="image/gif/png" href="logo.png">
	<title>Project Ark</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form method="post" action="verify.php">
        <div class="form-group">
          <?php 
            if (isset($_GET['username'])) {
              $username = mysqli_real_escape_string($verify->conn, $_GET['username']);
              $myrow = $verify->retrieveUserInfo($username);
            }
          ?>
          <label><b>Are you <?php echo $myrow['fname']."?";?></b></label>
          <?php 
            $cont = substr($myrow['contact_no'],2,6);
            $contact = str_replace($cont,'xxxxxx',$myrow['contact_no']);
            ?>
          <label>We will send a code to your contact number: <?php echo $contact;?></label>
          <label>Please click the button below to send the code.</label>
          <input type="hidden" name="contact_no" value="<?php echo $myrow['contact_no'];?>">
          <input type="hidden" name="username" value="<?php echo $username;?>">
          <input type="submit" name="sendCode" class="btn btn-block btn-primary" value="Send">
        </div>
        

      </form>
    </div>
    <div class="col-md-4"></div>
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