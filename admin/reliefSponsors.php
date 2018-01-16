<!DOCTYPE html>
<?php include 'functions/reliefSponsorsFunctions.php'; 
?>
<html lang="en">
<head>
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
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

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

          <?php include '../adminNavbar.php'; ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->    

              <div class="container" style="margin-top: 25px;">
                <center><h4>List of Sponsors</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <div class="container" align="center">
                          <h6>Add Relief Sponsor &nbsp;<a href="addreliefSponsors.php" class="btn btn-success"><i class="material-icons">add</i></a></h6>
                          <table class="table table-hovered" id="regStudent">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Type</th>
                                  <th>Address</th>
                                  <th>Contact Number</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <?php
                              $myrow = $dataOperations->retrieveSponsorData();
                              foreach ($myrow as $row) {
                                ?>
                                   <tr>
                                     <td><?php echo $row['sponsor_id']?></td>
                                     <td><?php echo $row['sponsor_name'];?></td>
                                     <td><?php echo $row['sponsor_type'];?></td>
                                     <td><?php echo $row['address'];?></td>
                                     <td><?php echo $row['contact_no'];?></td>
                                     <td><a href="reliefSponsors.php?deletesponsor=1&sponsor_id=<?php echo $row['sponsor_id'];?>" class="btn btn-danger">DELETE</a></td>
                                  </tr>
                                <?php
                              }
                            ?> 
                              
                          </table>
                        </div>
                        </div>
                      </div>
              </div>


              </div><!--END OF RIGHTCARD--> 
          </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->



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


    $('#regStudent').DataTable();
} );
</script>
</body>
</html>