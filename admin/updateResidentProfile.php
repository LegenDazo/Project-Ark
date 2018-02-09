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
  <link rel="icon" type="image/gif/png" href="../logo.png">
  <title>Project Ark</title>
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

<?php
 if (isset($_GET['resident_id'])) {
    $resident_id = $_GET['resident_id'];
  }
?>
  <h2>Update Resident Record &nbsp;<a href="residentProfile.php?resident_id=<?php echo $resident_id;?>" class="btn btn-warning">Cancel</a></h2>
</button>

<?php
  if (isset($_GET['resident_id'])) {
      $resident_id = $_GET['resident_id'];
      $process = $_GET['process'];

      if($process == 'update'){

    $myrow = $Functions->retrieve_residentItemData2($resident_id);

    foreach ($myrow as $row) {
      $resident_id = $row['resident_id'];
      $fname = $row['fname'];
      $mname = $row['mname'];
      $lname = $row['lname'];
      $gender = $row['gender'];
      $bday = $row['bday'];
      $street = $row['street'];
    $house_no = $row['house_no'];
    }
  }
}
?> 

<form method="post" action="functions/registrationFunctions.php?process=update&resident_id=<?php echo $resident_id?>">
              <div class="form-group col-md-3">
                <label>Resident's ID Number</label>
                <p class='form-control'><?php echo $resident_id;?></p>
                <input type="hidden" name="resident_id" class="form-control" value="<?php echo $resident_id;?>" >
            </div>
            <div class="form-group col-md-3">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $fname;?>">
            </div>
            <div class="form-group col-md-3">
                <label>Midlle Name</label>
                <input type="text" name="mname" class="form-control" value="<?php echo $mname;?>">
            </div>
            <div class="form-group col-md-3">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $lname;?>">
            </div>
            <div class="clearfix"></div>
                <div class="form-group col-md-3">
                <label>Gender</label>
                <input type="text" name="gender" class="form-control" value="<?php echo $gender;?>">
            </div>
                <div class="form-group col-md-3">
                <label>Birth Date</label>
                <input type="date" name="bday" class="form-control" value="<?php echo $bday;?>">
            </div>
                <div class="form-group col-md-3">
                <label>Street</label>
                <input type="text" name="street" class="form-control" value="<?php echo $street;?>">
            </div>
                <div class="form-group col-md-3">
                <label>House Number</label>
                <input type="text" name="house_no" class="form-control" value="<?php echo $house_no;?>">
            </div>

            <div class="clearfix"></div>

            <div class="form-group col-md-12">
              <button class="btn btn-primary" type="submit" name="updateRes">Update</button>
            </div>

</form>


</body>
</html>
