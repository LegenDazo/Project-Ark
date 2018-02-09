<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php
include 'functions/retrieveDisease.php';
?>
<html lang="en">
<head>
  <title>ARK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">

</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="#" style="color: white">Log Out</a>
    </nav>

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

        <?php include '../adminNavbar.php'; ?>

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                    <center><h4>Update Disease</h4></center>
                      <?php
                       if (isset($_GET['disease_id'])) {
                          $disease_id = $_GET['disease_id'];
                        }
                      ?>

                      <?php
                        if (isset($_GET['disease_id'])) {
                            $disease_id = $_GET['disease_id'];
                            $process = $_GET['process'];

                            if($process == 'update'){

                          $myrow = $obj->retrieveDisease2($disease_id);

                          foreach ($myrow as $row) {
                            $disease_name = $row['disease_name'];
                          }
                        }
                      }
                      ?> 

                      <center><form method="post" action="functions/retrieveDisease.php" style="margin-top: 5%;">
                                <input type="hidden" name="disease_id" value="<?php echo $disease_id?>">
                                  <div class="form-group col-md-3">
                                      <label>Disease Name</label>
                                      <input type="text" name="disease_name" class="form-control" value="<?php echo $disease_name;?>">
                                  </div>
                                  <div class="form-group col-md-12">
                                    <a href="disease.php" class="btn btn-warning">Cancel</a>&nbsp;
                                    <button class="btn btn-primary" type="submit" name="updateDisease">Update</button>
                                  </div>

                      </form></center>
                </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->

      <footer class="footer">
        <p>Project Ark © 2017 All Rights Reserved</p>
      </footer>


<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>

</body>
</html>
