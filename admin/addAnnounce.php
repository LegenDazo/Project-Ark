<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/announceFunctions.php'; 
      include 'functions/retrieveEvacuationCenterFunction.php';
?>
<html lang="en">
<head>
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

       <?php include '../adminNavbar.php'; ?>
        
          <?php
            if(isset($_GET['announcement_id'])) {
               $announcement_id = $_GET['announcement_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->                
                  <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                          <center><h6>Announcement Details</h6></center>
                          <div class="container" style="margin-top: 5%">
                              
                                  <form method="POST" action="functions/announceFunctions.php">
                                     <div class="panel-body">  
                                        <div class="text-left">
                                          <a href="announcement.php" class="btn btn-warning">Cancel</a>
                                        </div><br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                              <label for="an_what">What</label>
                                              <input type="text" class="form-control" id="an_what" name="an_what" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                              <label for="to_whom">Who</label>
                                              <input type="text" class="form-control" id="to_whom" name="to_whom" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                              <label for="date_start">Date start</label>
                                              <input type="date" class="form-control" id="date_start" name="date_start" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                              <label for="date_end">Date end</label>
                                              <input type="date" class="form-control" id="date_end" name="date_end" required>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-3">
                                              <!--<span class="col-md-2">-->
                                              <label for="time_start">Time start</label><br>
                                              <input type="time" class="form-control" id="time_start" name="time_start" required>
                                                                     
                                              <!--</span>-->
                                            </div>                                                                     
                                            

                                            <div class="form-group col-md-3">
                                              <label for="time_end">Time end</label><br>
                                              <input type="time" class="form-control" id="time_end" name="time_end" required>
                                              </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                              <label for="description">Description</label>
                                              <input type="text" class="form-control" id="description" name="description" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                              <!--<label for="an_where">Location</label>
                                              <input type="text" class="form-control" id="an_where" name="an_where">
                                            -->
                                              <label for="location_name">Location</label>
                                              <select class="form-control" id="sel1" name="location">
                                              <option>Please Select Evacuation Center...</option>
                                              <?php
                                                    $myrow = $obj->retrieveEvacuationCenter();
                                                    foreach ($myrow as $row) {
                                                ?>
                                                <option required value="<?php echo $row['location_name'];?>"><?php echo $row['location_name'];?></option>
                                                <?php }?>
                                              </select>
                                            </div> 

                                        </div> 

                                        <div>                                          
                                            
                                        </div>    

                                    </div>  <!--End of .panel-body-->
                                    <br>     
                                    
                                        <div class="panel-footer">
                                          <div class="text-right">
                                          <button type="submit" class="btn btn-primary" name="submitannounce">Post</button>
                                          </div>
                                        </div>

                                  </form>

                              
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



</body>
</html>
