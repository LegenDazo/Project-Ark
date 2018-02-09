<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php

include 'functions/registrationFunctions.php';

?>
<html lang="en">
<head>
  <title>Residents</title>
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
        <div class="col-3"><!--START of LEFT COLUMN-->
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
                                  <li class="nav-item"><a class="nav-link py-0" href="announcement.php">Announcement</a></li>
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
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="material-icons">account_balance</i>  Barangay</a>
                    </li>                
                  </ul>
              </div> 
          </div> <!--end of left column-->



            <div class="col-9"><!-- START of RIGHT COLUMN-->
              <div class="card" id="rightCard"><!--START OF RIGHTCARD-->              
                      <div class="container" style="margin-top: 2%">
                        <div class="col-md-12">
                          <div class="container">
  <h2>Resident Profile</h2>
</button>
<div class="col-md-3 col-lg-3">
<div class="col-md-12 col-lg-12"></div>
<?php
 if (isset($_GET['resident_id'])) {
    $resident_id = $_GET['resident_id'];
  }
?>
  <a href="updateResidentProfile.php?process=update&resident_id=<?php echo $resident_id?>" class="btn btn-success btn-block">Update Record</a>
  <button id='delete' class='btn btn-danger btn-block'>Delete Record</button>
  <a href="residents.php" class="btn btn-warning btn-block">Back</a>
</div>
<div class="col-md-9 col-lg-9"> 
<?php
  if (isset($_GET['resident_id'])) {
    $resident_id = $_GET['resident_id'];

    $myrow = $Functions->retrieve_residentItemData2($resident_id);

    foreach ($myrow as $row) {
      $resident_id = $row['resident_id'];
      $fname = $row['fname'];
      $mname = $row['mname'];
      $lname = $row['lname'];
      $bday = $row['bday'];
      $gender = $row['gender'];
      $street = $row['street'];
	  $house_no = $row['house_no'];
    }
  }
?>
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Resident's ID Number</td>
                        <td><?php echo $resident_id;?></td>
                      </tr>
                      <tr>
                        <td>Name</td>
                        <td><?php echo $fname." ".$mname." ".$lname;?></td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $gender;?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $bday;?></td>
                      </tr>
                      <tr>
                        <td>Street</td>
                        <td><?php echo $street;?></td>  
                      </tr>
					  <tr>
                        <td>House Number</td>
                        <td><?php echo $house_no;?></td>  
                      </tr>
                    </tbody>
                  </table>

</div>
</div>
  <div class="modal" id="viewkey" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class='modal-header'>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><h6>Close</h6></button>
                  <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
              </div>
              <div class="modal-body">
                  <h3>Updated Resident data successfully</h3>
              </div>
              <div class="modal-footer"></div>
            </div>
        </div>
  </div>
  <div class="modal" id="viewConfirm" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class='modal-header'>
                  <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
              </div>
              <div class="modal-body">
                  <h4>Are you sure you want to delete this record?</h4>
              </div>
              <div class="modal-footer">
                  <button id='confirm' class='btn btn-danger btn-md'>Confirm</button>
                  <button id='cancel' class='btn btn-warning btn-md'>Cancel</button>
              </div>
            </div>
        </div>
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





<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>     
<script>
   $(document).ready(function(){
        <?php 
          if(isset($_GET['msg'])){
            echo "$('#viewkey').show();";
          }
        ?>
        $('.close').click(function(){
            $('#viewkey').hide();
            window.location.href="residentProfile.php?resident_id="+<?php echo $resident_id;?>;
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/registrationFunctions.php?process=delete&resident_id=<?php echo $resident_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
</script>


</body>
</html>
