<!DOCTYPE html>
<?php 
include 'functions/registrationFunctions.php';
include 'functions/itemResidentsFunctions.php';
?>
<html lang="en">
<head>
  <title>Item Distribution</title>
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
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD--> 

                  <div class="container" style="margin-top: 25px;">
                      <center><h4>Item/Residents</h4></center>
                      <div class="container" style="margin-top: 5%; margin-bottom: 5%;">
                        <div class="col-md-12">
                          <table class="table table-hovered" id="residents">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Age</th>
                                  <th>Gender</th>
                                  <th>Relief Package Name</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                     <?php
                      $myrow = $Functions->retrieve_residentData();
                      foreach ($myrow as $row) {
                        ?>
                           <tr>
                             <td><?php echo $row['fname']; echo " "; echo $row['mname']; echo " "; echo $row['lname']?></td>
                             <td><?php echo $row['age'];?></td>
                             <td><?php echo $row['gender'];?></td>
                             <td> 
                                <div class="form-group col-md-11">
                                  <select class="form-control" id="sel1" name="reliefPackage">
                                  <option></option>
                                    <?php
                                        $myrow = $obj->retrieveReliefPackage();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['package_id'];?>"><?php echo $row['package_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>
                                </td>
                              <td><button class="btn btn-success" type="submit" name="recieved">Received</button></td>
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