<!DOCTYPE html>
<?php include 'functions/operationFunctions.php'; 
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
            if(isset($_GET['operation_id'])) {
               $operation_id = $_GET['operation_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px;">
                      <center><h6>Create Operation</h6></center>
                      <div class="container" style="margin-top: 5%">
                          <div class="col-md-12">
                              <div class="container" align="center">
                                <div class="col-md-6">
                                    <div class="panel-body"> 
                                      <form method="post" action="adminOperationFunctions.php">
                                        <div class="form-group">
                                          <label for="operation_name">Operation Name</label>
                                          <textarea class="form-control" rows="1" id="operation_name" name="operation_name" ></textarea>
                                        </div>
                                      </form>
                                    </div>  <!--End of .panel-body-->     
                                    <div class="panel-footer">
                                      <div class="text-right">
                                        <a href="reliefOperation.php" class="btn btn-warning">Cancel</a>&nbsp;<button type="submit" class="btn btn-primary" name="submitoperation">Submit</button>
                                      </div>
                                    </div>  
                                </div>
                              </div>
                          </div>
                      </div>
                </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->






<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap_alpha6.min.js"></script>


</body>
</html>