
<?php 

include '../login.php';?>
<div class="col-md-3">
    <!--START of LEFT COLUMN-->
    <div class="card" id="profile" style="margin-top: 25px;">
        <img src="../images/user.png">
        <center>
            <label class="name"><b><?php 
                      $myrow = $obj->retrieveUserInfo($_SESSION['username']);
                      foreach ($myrow as $row) {
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $mname = $row['mname'];
                        $bday = $row['bdate'];
                      }

                      echo $fname." ".$mname." ".$lname;

                  ?>

                  </b></label>
            <br>
            <label>
                <?php echo date_format(new DateTime($bday), 'M d Y');?>
            </label>
            <br>
        </center>
        <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="viewProfile.php"><i class="material-icons">edit</i>  Manage Profile</a>
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
                <a class="nav-link" href="evacuationCenter.php"><i class="material-icons">place</i>  Evacuation Centers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewDemographics.php"><i class="material-icons">person</i>  View Demographics</a>
            </li>

        </ul>
    </div>
</div>
<!--end of left column-->