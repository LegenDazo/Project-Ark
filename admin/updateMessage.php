<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/messageFunctions.php'; 
?>
<html lang="en">
<head>
  <title>Residents</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="b../ootstrap/css/bootstrap.min.css">
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
                <a class="nav-link active" href="#"><i class="material-icons">home</i>  Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="material-icons">people</i>  Residents</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="material-icons">place</i>  Evacuation Centers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="material-icons">healing</i>  Announcements & Messages</a>
                <div class="collapse" id="submenu1" aria-expanded="false">
                          <ul class="flex-column pl-2 nav">
                              <li class="nav-item"><a class="nav-link py-0" href="">Announcement</a></li>
                              <li class="nav-item"><a class="nav-link py-0" href="#submenu1sub1">Messages</a></li>
                          </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#submenu2" data-toggle="collapse" data-target="#submenu2"><i class="material-icons">email</i>  Relief Operation</a>
                <div class="collapse" id="submenu2" aria-expanded="false">
                          <ul class="flex-column pl-2 nav">
                              <li class="nav-item"><a class="nav-link py-0" href="">Tracker</a></li>
                              <li class="nav-item"><a class="nav-link py-0" href="#submenu1sub1">Operation</a></li>
                          </ul>
                </div>
              </li>                
            </ul>
            </div>
          </div> <!--end of left column-->

          <?php
            if (isset($_GET['message_id'])) {
              $message_id = $_GET['message_id'];
              $myrow = $obj->retrieveMessageItems($message_id);
              foreach ($myrow as $row) {
                $message_id = $row['message_id'];
                $message_name = $row['message_name'];
                $message_date = $row['message_date'];
                

              }
            }
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->              
                  <div class="container" style="margin-top: 25px;">
                      <center><h6>Update Message Details</h6></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                        <div class="panel-body"> 
                        <form method="post" action="functions.php?message_id=<?php echo $message_id;?>">
                          <div class="form-group">
                            <label for="message_name">Message</label>
                            <input type="text" class="form-control" value="<?php echo $message_name;?>" id="message_name" name="message_name">
                          </div>
                           <div class="form-group">
                            <label for="message_date">Date</label>
                            <input type="text" class="form-control" value="<?php echo $message_date;?>" id="message_date" name="message_date">
                          </div>
                          </div>  <!--End of .panel-body-->     
                          <div class="panel-footer">
                            <div class="text-right">
                            <a href="viewMessageDetails.php?message_id=<?php echo $message_id;?>" class="btn btn-warning">Cancel</a>&nbsp;<button type="submit" class="btn btn-primary" name="updatemessage">Update</button>
                          </div>
                          </div>
                      </form>
                  </div>  
                         
                        </div>

                      </div>
                    </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->



    <footer class="footer">
        <p>Project Ark © 2017 All Rights Reserved</p>
      </footer>






<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>     
<script>
  $(document).ready( function () {
  <?php 
    if(isset($_GET['inserted'])){
      echo "$('#viewkey').show();";
    }

    if(isset($_GET['deleted'])){
      echo "$('#viewkeydel').show();";
    }
  ?>

    $('.close').click(function(){
        $('#viewkey').hide();
        window.location.href='registerStudent.php';
    });

    $('.close').click(function(){
        $('#viewkeydel').hide();
        window.location.href='registerStudent.php';
    });

    $('#regStudent').DataTable();
} );
</script>


</body>
</html>
