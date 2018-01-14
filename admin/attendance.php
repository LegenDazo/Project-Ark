<?php

include 'functions/attendanceFunctions.php';
include 'functions/retrieveEvacuationCenterFunction.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="./jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="#" style="color: white">Log Out</a>
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
          </div><!--end of left column-->
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px;">
                      <center><h3>Attendance</h3></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <table class="table table-striped" id="residents">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Evacuation Center</th>
                                <th>Check-In</th>
                                <th>&nbsp;</th>
                              </tr>
                            </thead>
                            
                            <?php
                              $myrow = $Functions->retrieve_residentData();
                              foreach ($myrow as $row) {
                                $resident_id = $row['resident_id'];
                                $status = $Functions->retrieve_AttendanceData($resident_id);
                                $location_name = $Functions->retrieve_EvacuationCenter($resident_id);
                                $checkin = $Functions->retrieve_CheckinDate($resident_id);
                                //$evac_id = $row['evac_id'];
                            ?>
                            <tr>
                            <td><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']?></td>
                            <td><?php echo $row['brgy_id']; echo ", "; echo $row['house_no']; echo ", "; echo $row['street']?></td>
                            
                            <form method="GET" action="functions/attendanceFunctions.php">
                              <input type="hidden" name="resident_id" value="<?php echo $resident_id;?>">
                            <td> 
                                <div class="form-group col-md-12">
                                  <select class="form-control" id="<?php echo 'res'.$resident_id;?>" name="evac_id" required <?php if($status){echo "disabled=true";}?>>
                                  <option><?php if($status){echo $location_name;}?></option>
                                    <?php
                                        $myrow = $obj->retrieveEvacuationCenter();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['evac_id'];?>"><?php echo $row['location_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>
                                </td>
                                <td>
                                  <?php 
                                      if(!$status){ 
                                  ?>
                                  <button class="btn btn-success checkin" type="submit" name="checkin" value='<?php echo $resident_id;?>'>Present</button></td>
                                  <?php
                                    }else echo $checkin;
                                  ?>
                                <td><button class="btn btn-danger" type="submit" name="cancelAttendance">Cancel</button></td>
                              </form>
                            </tr>
                              <?php
                                }
                              ?>
                          </table>
                        </div>
                      </div>
                    </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->






<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
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

    $('.checkin').click(function(){
        var resident_id = $(this).attr("value");
        var select_id = '#res'+resident_id;
        var value = $(select_id).val();

        if(value != "") {

          $.post('functions/attendanceFunctions.php',"resident_id="+resident_id+"&evac_id="+value,function(response){
            $(select_id).attr("disabled",true);
          });
        }
    });

    $('#residents').DataTable();
} );
</script>


</body>
</html>
