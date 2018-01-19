<!DOCTYPE html>
<?php include 'functions/messageFunctions.php'; 
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
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="#" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
         <?php include '../adminNavbar.php'; ?>

          <?php
            if(isset($_GET['message_id'])) {
               $message_id = $_GET['message_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->             
                  <div class="container" style="margin-top: 5%;">
                      <center><h5>Message Details</h5></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          
                          <table class="table table-hovered" id="">

                                                
                                                <tr>
                                                  <td>Message</td>
                                                  <td><b></b></td>
                                                </tr>
                                                <tr>
                                                  <td>Date</td>
                                                  <td><b></b></td>
                                                </tr>
                                                <tr>
                                                  <th><a class="btn btn-info btn-block">POST</a></th>
                                                  <th><a href="updateMessage.php" class="btn btn-success btn-block">UPDATE</a></th>
                                                  <th><a href="adminMessageFunctions.php" class="btn btn-danger btn-block">DELETE</a></th>
                                                  <th><a href="message.php" class="btn btn-warning btn-block">BACK</a></th>
                                                </tr>  

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


</body>
</html>
