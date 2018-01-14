<!DOCTYPE html>
<?php include 'functions/announceFunctions.php'; 
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
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
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
            if(isset($_GET['announcement_id'])) {
               $announcement_id = $_GET['announcement_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->                
                  <div class="container" style="margin-top: 25px;">
                          <center><h6>Announcement Details</h6></center>
                          <div class="container" style="margin-top: 5%">
                              <div class="col-md-12">
                                  <form method="post" action="functions/announceFunctions.php">
                                     <div class="panel-body">  
                                        <div class="text-left">
                                          <a href="announcement.php" class="btn btn-warning">Cancel</a>
                                        </div><br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                              <label for="an_what">WHAT</label>
                                              <input type="text" class="form-control" id="an_what" name="an_what">
                                            </div>

                                            <div class="form-group col-md-6">
                                              <label for="an_who">WHO</label>
                                              <input type="text" class="form-control" id="an_who" name="an_who">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                              <label for="an_when">WHEN /format: YYYY-MM-DD HH:MM:SS/</label>
                                              <input type="text" class="form-control" id="an_when" name="an_when">
                                            </div>

                                            <div class="form-group col-md-6">
                                              <label for="an_where">WHERE</label>
                                              <input type="text" class="form-control" id="an_where" name="an_where">
                                            </div>
                                        </div>
                                    </div>  <!--End of .panel-body-->     
                                        <div class="panel-footer">
                                          <div class="text-right">
                                          <button type="submit" class="btn btn-primary" name="submitannounce">Post</button>
                                          </div>
                                        </div>
                                  </form>
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
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>     



</body>
</html>
