<?php
include 'login.php';;

?>

<div class="col-md-3"><!--START of LEFT COLUMN-->
                <div class="card" id="profile" style="margin-top: 25px;">
                <img src="../images/user.png">
                  <center>
                      <label class="name"><b><?php 
                                $myrow = $login->retrieveAdminInfo($_SESSION['username']);
                                foreach ($myrow as $row) {
                                  $fname = $row['fname'];
                                  $lname = $row['lname'];
                                  $mname = $row['mname'];
                                }

                                echo $fname." ".$mname." ".$lname;

                            ?>

                            </b></label>
                      <br>
                      <label>
                          <?php
                            if (isset($_SESSION['type'])) {
                              echo $_SESSION['type'];
                            }
                          ?>
                      </label>
                      <br>
                  </center>
                    <ul class="navbar-nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="viewAdminProfile.php"><i class="material-icons">edit</i>  Manage Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="changePassword.php"><i class="material-icons">settings</i>  Change Password</a>
                      </li>
                    </ul>
                </div>

                <div class="card" style="margin-top: 10px;">
                  <ul class="navbar-nav flex-column" id="sidenav">
                    <li class="nav-item">
                      <a class="nav-link active" href="home.php"><i class="material-icons">home</i>  Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="household.php"><i class="material-icons">people</i>  Community</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="evacCenterReport.php"><i class="material-icons">insert_chart</i>  Reports</a>
                        
                    </li> 
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="material-icons">visibility</i>  Monitor</a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link pt-1" href="attendance.php">Attendance Checker</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="diseaseAcquired.php">Health status</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="reliefHousehold.php">Relief Distribution</a></li>
                              </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu2" data-toggle="collapse" data-target="#submenu2"><i class="material-icons">build</i>  Services</a>
                        <div class="collapse" id="submenu2" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link pt-1" href="newannouncement.php">Announcements</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="listOfEvacCenters.php">Evacuation Centers</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="message.php">Messages</a></li>
                              </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu3" data-toggle="collapse" data-target="#submenu4"><i class="material-icons">content_paste</i>  Manage</a>
                        <div class="collapse" id="submenu4" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link pt-1" href="barangay.php">Barangay</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="disease.php">Diseases</a></li>
                              </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu3" data-toggle="collapse" data-target="#submenu5"><i class="material-icons">tune</i>  Set Relief</a>
                        <div class="collapse" id="submenu5" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link pt-1" href="reliefSponsors.php">Sponsors</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="reliefOperation.php">Operations</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="reliefpackage.php">Packages</a></li>
                                  <li class="nav-item"><a class="nav-link pt-1" href="reliefItems.php">Items</a></li>
                              </ul>
                        </div>
                    </li>              
                  </ul>
              </div> 
          </div><!--end of left column-->
