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
    <a href="../logout.php" style="color: white">Logout</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->

             <?php include '../adminNavbar.php'; ?>



            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->            
                  <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h5>Create Message</h5></center>

                      <div class="container" style="margin-top: 5%">
                          <div class="col-md-12">
                              <div class="container" align="center">
                                  <div class="col-md-8">   
                                    <div class="panel-body"> 

                                      <form method="post" action="semaphore.php">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
                                          <div class="form-group">
                                          <label for="message">Message</label>
                                          <textarea class="form-control" rows="5" id="message" name="message" maxlength="140"></textarea>                            
                                          </div>
                                         </div>  <!--End of .panel-body-->  
                                         <div class="panel-footer">
                                        <div class="text-right">
                                          <a href="message.php" class="btn btn-warning">Cancel</a>&nbsp;<button type="submit" class="btn btn-primary" name="sendmessage">SEND</button>
                                        </div>
                                    </div>   
                                      </form>
                                      
                                    
                                
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



</body>
</html>
