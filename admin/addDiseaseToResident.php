<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php

include 'functions/diseaseFunctions.php';

?>

<!DOCTYPE html>
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
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h6>Add Disease to Resident</h6></center>
                      <div class="container" style="margin-top: 5%;">
                        <div class="col-md-12">
                          <?php
                          if (isset($_GET['resident_id'])) {
                            $resident_id = $_GET['resident_id'];

                            $myrow = $func->retrieveDiseaseItemData2($resident_id);

                            foreach ($myrow as $row) {
                              //$acquired_id = $row['acquired_id'];
                             $resident_id = $row['resident_id']; 
                             $fname = $row['fname'];
                             $mname = $row['mname'];
                             $lname = $row['lname'];                             
                              //$disease_id = $row['disease_id'];
   
                            }
                          }
                        ?>  <center>
                            <form method="POST" action="functions/diseaseAcquiredFunctions.php">                                 
                                  <h6>Resident's ID Number:  <?php echo $resident_id;?></p>
                                      <input type="hidden" name="resident_id" class="form-control" value="<?php echo $resident_id;?>" >
                                  
                                  <div class="form-group col-md-9">
                                      <h6>Resident's Name:
                                      <?php echo $fname." ".$mname." ".$lname;?>
                                  </div>
                        <div class="col-md-6">
                        <center>
                          <?php if(isset($_SESSION['error'])){
                            echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error']."</div>";
                            unset($_SESSION['error']);
                          }
                            ?>
                        </center>
                      </div>
                                  <h6>Add Disease: </h6>  
                                  <div class="form-group col-md-3">
                                    <select class="form-control" id="sel1" name="disease_id">
                                  <option value=""></option>
                                    <?php
                                        $myrow = $func->retrieveDiseaseData();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['disease_id'];?>"><?php echo $row['disease_name'];?></option>
                                    <?php }?>
                                  </select></td>
                                    </tr>
                                    </div>
                                    <h6>Date Acquired: </h6>  
                                    <div>
                                      <input type="date" name="date_acquired" value="<?php if (isset($_SESSION['date_acquired'])){
                                        echo $_SESSION['date_acquired']; 
                                        unset($_SESSION['date_acquired']);
                                      }
                                      ?>">
                                    </div>

                                <div style="margin-top: 7%;">
                                  <a href="diseaseAcquired.php" class="btn btn-warning">Cancel</a>&nbsp;
                                  <button class="btn btn-primary" name="submitdisease">Add Disease</button>
                                </div>
                             </form>
                             </center>
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
     
<script>
  $(document).ready( function () {
  <?php 
    if(isset($_GET['inserted'])){
      echo "$('#viewkey').show();";
    }

    if(isset($_GET['deleted'])){
      echo "$('#viewkeydel').show();";
    }
  ?>

    $('.close').click(function(){
        $('#viewkey').hide();
        window.location.href='registerStudent.php';
    });

    $('.close').click(function(){
        $('#viewkeydel').hide();
        window.location.href='registerStudent.php';
    });

    $('#regStudent').DataTable();
} );
</script>


</body>
</html>
