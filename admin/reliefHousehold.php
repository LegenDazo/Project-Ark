<!DOCTYPE html>
<?php include 'functions/householdFunctions.php';
include 'functions/itemResidentsFunctions.php'; 
?>
<html lang="en">
<head>
  <title>ARK</title>
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
                <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h4>Relief/Household Distribution</h4></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                          <div class="container" align="center">
                              <table class="table table-hovered" id="regStudent">
                                  <thead>
                                    <tr>
                                      <th>Household ID</th>
                                      <th>Household Head</th>
                                      <th>Head Spouse</th>
                                      <th>Relief Package Name</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>

                                  <?php
                                    $myrow  = $obj->retrieveHouseholdData();
                                    foreach($myrow as $row ){ ?>
                                      <tr id="<?php echo $row['household_id']; ?>">        

                               <td data-target="household_id"><?php echo $row['household_id']; ?></td>         
                               <td><?php 
                                $result = mysqli_query($obj->conn, "SELECT * FROM resident WHERE household_id = ".$row['household_id']." AND house_memship = 'head'");
                                $rowH = mysqli_fetch_assoc($result);
                                if($rowH['house_memship'] == 'head'){
                                echo $rowH['fname']; 
                                echo " "; 
                                echo $rowH['mname']; 
                                echo " "; 
                                echo $rowH['lname'];
                                }?>
                             </td>
                             <td>
                               <?php 
                                $result = mysqli_query($obj->conn, "SELECT * FROM resident WHERE household_id = ".$row['household_id']." AND house_memship = 'head\'s spouse'");
                                $rowH = mysqli_fetch_assoc($result);

                               if($rowH['house_memship'] == "head's spouse"){
                                echo $rowH['fname']; 
                                echo " "; 
                                echo $rowH['mname']; 
                                echo " "; 
                                echo $rowH['lname'];
                              }
                               ?>
                             </td>
                               <td> 
                                <div class="form-group col-md-11">
                                  <select class="form-control" id="sel1" name="reliefPackage">
                                  <option></option>
                                    <?php
                                        $myrow = $function->retrieveReliefPackage();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['package_id'];?>"><?php echo $row['package_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>
                                </td>
                               <td><button class="btn btn-success" type="submit" name="recieved">Received</button>
                              <button class="btn btn-danger" type="submit" name="cancelAttendance">Cancel</button></td>                                   
                                </tr>

                                  <?php }
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



<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      type: "GET",
      data: 
    })
  })
</script>

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
