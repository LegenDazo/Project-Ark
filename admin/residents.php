<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/registrationFunctions.php';?>
<html lang="en">
<head>
  <title>Community</title>
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
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD--> 

                  <div class="container" style="margin-top: 25px;">
                      <center><h4>List of Registered Residents</h4></center>
                      <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
                        <div class="col-md-12">
                          <h5>Add Household &nbsp;<a href="addHousehold.php" class="btn btn-success"><i class="material-icons">add</i></a></h5>
                          <br>
                          <table class="table table-hovered" id="residents">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Age</th>
                                  <th>Gender</th>
                                  <th>Street</th>
                                  <th>House Number</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                     <?php
                      $myrow = $Functions->retrieve_residentData();
                      foreach ($myrow as $row) {
                        ?>
                           <tr>
                             <td><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']?></td>
                          
                             <td><?php echo $row['gender'];?></td>
                             <td><?php echo $row['street'];?></td>
                         <td><?php echo $row['house_no'];?></td>
                             <td><a href="residentProfile.php?resident_id=<?php echo $row['resident_id'];?>" class="btn btn-info">View Profile</td>
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






<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
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

    $('#residents').DataTable();
} );
</script>


</body>
</html>
