<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Refistration</title>
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

    <div class="container-fluid">
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
          </div <!--end of left column-->



            <div class="col-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 20px;"><!--START OF RIGHTCARD-->              
                    <center><form method="post" action="functions/registrationFunctions.php">
                    <h4 style="font-weight: bold;">Registration Form</h4><br>
                      <table>
                        <tr>
                          <td>First Name</td>
                          <td><input type="text" name="fname"></td>
                        </tr>
                        <tr>
                          <td>Middle Name</td>
                          <td><input type="text" name="mname"></td>
                        </tr>
                        <tr>
                          <td>Last Name</td>
                          <td><input type="text" name="lname"></td>
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td><input type="text" name="gender"></td>
                        </tr>
                        <tr>
                          <td>Birthdate</td>
                          <td><input type="date" name="bday"></td>
                        </tr>
                        <tr>
                          <td>Street</td>
                          <td><input type="text" name="street"></td>
                        </tr>
						<tr>
                          <td>House Number</td>
                          <td><input type="int" name="house_no"></td>
                        </tr>
                      </table><br>
                    <button class="btn btn-primary" name="Register">Register</button></center>
                    <br>
                    <br>
                  </form>

              </div><!--END OF RIGHTCARD--> 
          </div><!-- END of RIGHT COLUMN-->
     
    </div><!--end of row-->
    </div>


<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
