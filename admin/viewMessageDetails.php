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
         <?php include '../adminNavbar.php'; ?>

          <?php
            if(isset($_GET['sms_id'])) {
               $sms_id = $_GET['sms_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->             
                  <div class="container" style="margin-top: 5%;">
                      <center><h5>Message Details</h5></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          
                          <table class="table table-hovered" id="">
                              <?php
                                $myrow = $obj->retrieveMessageItems($sms_id);
                                foreach ($myrow as $row) {
                                  $message = $row['content'];
                                  $date = $row['datesent'];
                                  $recipient = $row['username'];
                                }
                              ?>
                                                
                                                <tr>
                                                  <td>Message</td>
                                                  <td><?php echo $message;?></td>
                                                </tr>
                                                <tr>
                                                  <td>Date</td>
                                                  <td><?php echo $date;?></td>
                                                </tr>
                                                <tr>
                                                  <td>Recipient</td>
                                                  <td><?php echo $recipient;?></td>
                                                </tr>
                                                <tr>                                                  
                                                  <th><a href="functions/messageFunctions.php?deletemessage=1&sms_id=<?php echo $sms_id;?>" class="btn btn-danger">DELETE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="message.php" class="btn btn-warning">BACK</a></th>
                                                </tr>  

                          </table>
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


</body>
</html>
