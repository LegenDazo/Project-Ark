<?php session_start();
  if ($_SESSION['id'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "admin") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include '../admin/functions/announceFunctions.php'; 
      include '../admin/functions/retrieveEvacuationCenterFunction.php';
      include '../admin/functions/retrieveEvacIdFunction.php';


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
        
        <?php include 'userNavbar.php'; ?>

          <?php
            if(isset($_GET['announcement_id'])) {
               $announcement_id = $_GET['announcement_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->             
                  <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h5>Announcement Details</h5></center>
                        <div class="container" style="margin-top: 5%">
                          <div class="col-md-12">
                                <table class="table table-hovered" id="">
                                <?php                              
                                    $myrow = $func->retrieveAnnounceItems($announcement_id);
                                    foreach ($myrow as $row) {
                                        ?>
                                              
                                              <tr>
                                                <td>What</td>
                                                <td><b><?php echo $row['an_what']?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Who</td>
                                                <td><b><?php echo $row['to_whom'];?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Date Start</td>
                                                <td><b><?php echo $row['date_start'];?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Date End</td>
                                                <td><b><?php echo $row['date_end'];?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Time Start</td>
                                                <td><b><?php echo $row['time_start'];?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Time End</td>
                                                <td><b><?php echo $row['time_end'];?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Message</td>
                                                <td><b><?php echo $row['description'];?></b></td>
                                              </tr>

                                              <tr>
                                                <td>Location</td>
                                                <td><b><?php echo $row['location'];?></b>
                                                </td>
                                              </tr>
                                              
                                              <tr>
                                                

                                                <th><a href="home.php" class="btn btn-warning btn-block">BACK</a></th>
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






<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>



</body>
</html>
