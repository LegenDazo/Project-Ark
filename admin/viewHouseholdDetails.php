<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'adminHouseholdFunctions.php'; 
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
            if(isset($_GET['house_id'])) {
               $house_id = $_GET['house_id']; 
          } 
          ?>


            <div class="col-9"><!-- START of RIGHT COLUMN-->
              <div class="card" id="rightCard"><!--START OF RIGHTCARD-->              
                  <div class="container" style="margin-top: 5%;">
                      <center><h6>Household Details</h6></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          
                          <table class="table table-hovered" id="">
                          <?php                   
                                      
                                      $myrow = $obj->retrieveHouseholdItems($house_id);
                                      foreach ($myrow as $row) {
                                          ?>
                                                
                                                <tr>
                                                  <td>ID</td>
                                                  <td><b><?php echo $row['house_id']?></b></td>
                                                </tr>
                                                <tr>
                                                  <td>House Head</td>
                                                  <td><b><?php echo $row['house_head']?></b></td>
                                                </tr>
                                                <tr>
                                                  <td>Head Spouse</td>
                                                  <td><b><?php echo $row['head_spouse'];?></b></td>
                                                </tr>
                                                <tr>                                                  
                                                  <td><a href="updateHousehold.php?house_id=<?php echo $row['house_id'];?>" class="btn btn-success btn-block">UPDATE</a></td>
                                                  <td><a href="functions.php?deletehousehold=1&house_id=<?php echo $house_id;?>" class="btn btn-danger btn-block">DELETE</a></td>
                                                  <td><a href="adminHousehold.php" class="btn btn-warning btn-block">BACK</a></td>
                                                </tr>  


                   
                                          <?php
                                      }                   
                              ?>  


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



<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>     
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
