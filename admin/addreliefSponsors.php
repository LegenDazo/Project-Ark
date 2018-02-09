<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
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
  <script type="text/javascript">
    function validate(){
      var num = $("#sponsor_contNum").val();
      var stat = !num.match("[A-Za-z]+");

      if(stat == false) {
        alert("Contact number must only have numbers");
      }


      return stat;
    }
  </script>

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
                      <center><h4>Input Sponsor Details</h4></center>
                      <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
                            <form onsubmit="return validate()" method="post" action="functions/reliefSponsorsFunctions.php">    
                              <div class="row">                                                      
                              <div class="form-group col-md-6">
                                <label for="sponsor_name">Sponsor Name</label>
                                <input data-target="sponsor_name" type="text" class="form-control" id="sponsor_name" name="sponsor_name" required> 
                              </div>
                              
                              <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="sponsor_type">Sponsor Type</label>
                                <select class="custom-select col-md-6" id="sponsor_type" name="sponsor_type" required>
                                  <option selected value="">Choose...</option>
                                  <option  name="sponsor_type" value="Govenment Organization">Govenment Organization</option>
                                  <option  name="sponsor_type" value="Volunteer">Volunteer</option>
                                  <option  name="sponsor_type" value="Annonymous">Annonymous</option>
                                </select>
                              </div>          
                              </div>

                              <div class="row">        
                              <div class="form-group col-md-6">
                                <label for="sponsor_address">Address</label>
                                <input  data-target="sponsor_address" type="text" class="form-control" id="sponsor_address" name="sponsor_address" required> 
                              </div>
                                               
                              <div class="form-group col-md-4">
                                <label for="sponsor_contNum">Contact Number</label>
                                <input data-target="sponsor_contNum" type="text" class="form-control" id="sponsor_contNum" name="sponsor_contNum" required> 
                              </div>
                              </div><br>

                                <center><a href="reliefSponsors.php" class="btn btn-warning">Cancel</a>&nbsp;
                                  <button class="btn btn-primary" name="addSponsor">Add Sponsor</button></center>
                            </form>
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
