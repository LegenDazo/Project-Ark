<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php
  
  include 'functions/diseaseFunctions.php';
  include 'functions/retrieveDisease.php'

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
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h4>Add Disease</h4></center>
                      <div class="container" style="margin-top: 5%; margin-bottom: 5%; ">
                        <div class="col-md-12">
                            <form method="post" action="functions/diseaseFunctions.php">
                                <center>
                                 <div class="form-group col-md-6"> 
                                <?php if(isset($_SESSION['error'])){
                                  echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error']."</div>";
                                  unset($_SESSION['error']);
                                }
                                  ?>
                                </div>
                                  <div class="form-group col-md-6">
                                    <label for="disease_name">Disease Name</label>
                                    <input data-target="disease_name" type="text" class="form-control" id="disease_name" name="disease_name" value="<?php if (isset($_SESSION['disease_name'])){
                                      echo $_SESSION['disease_name']; 
                                      unset($_SESSION['disease_name']);
                                    }
                                    ?>" maxlength="50" minlength="2"> 
                                  </div>
                                  <div style="margin-top: 7%;">
                                  <a href="disease.php" class="btn btn-warning">Cancel</a>&nbsp;
                                  <button class="btn btn-primary" name="submitdisease">Add Disease</button>
                                  </div>
                                </center>
                             </form>
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

