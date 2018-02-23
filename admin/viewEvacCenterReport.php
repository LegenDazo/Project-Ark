<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }

  if(isset($_POST["period"])) {
    $period = $_POST["period"];
  } else if(isset($_POST["showAll"])) {
    $showAll = $_POST["showAll"];
  }
?>
<!DOCTYPE html>
<?php

  include 'functions/retrieveEvacuationCenterFunction.php';
  include 'functions/demographicsFunction.php';
  include 'functions/reliefDistributionFunction.php';

?>
<html lang="en">
<head>
  <link rel="icon" type="image/gif/png" href="../logo.png">
  <title>Project Ark</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">

</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Logout</a>
    </nav>

      <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->

        <?php include '../adminNavbar.php'; ?>

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                  <table>                   
                      <?php
                    if (isset($_GET['evac_id'])) {
                      $evac_id = $_GET['evac_id'];
                      $myrow = $obj->retrieveEvacuationCenter3($evac_id);

                      foreach ($myrow as $row) {
                        ?>
                        <tr><td>Evacuation Center:</td> <td><b><?php echo $row['location_name'];?></b></td></tr>
                        <tr><td>Street:</td> <td><b><?php echo $row['street'];?></b></td></tr>
                        <tr><td>Barangay:</td> <td><b><?php echo $row['brgy_name'];?></b></td></tr>
                       
                        <?php
                      }
                    }
                    
                  ?>

                  </table>
                  <br>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                      <form method="POST" action="viewEvacCenterReport.php?evac_id=<?php echo $evac_id; ?>" id="period">
                        <select class="form-control" name="period" id="date" required>
                          <option value="">Select a Date...</option>
                          <?php
                            $dates = $obj->getEvacDates($evac_id);
                            foreach($dates as $date) {
                              $time = strtotime($date["date_start"]);
                              $start = date("M d, Y (h:iA)", $time);
                              echo "<option value='".$date["date_start"].",".$date["date_end"]."' ";
                              
                              if(isset($period) && strpos($period, $date["date_start"]) !== false) {
                                echo "selected";
                              }

                              echo ">";

                              echo $start." to ";
                              if(isset($date["date_end"])) {
                                
                                $time = strtotime($date["date_end"]);
                                $end = date("M d, Y (h:iA)", $time);
                                echo $end;

                              } else {
                                echo "present";
                              }
                              echo "</option>";
                            }
                          ?>
                        </select>
                      </form>
                    </div>
                    <?php
                      if(isset($showAll) || isset($period)) {
                        $time = (isset($showAll)) ? $showAll : $period;
                      } else {
                        $time = 'showAll';
                      }
                    ?>
                    <form method="POST" action= "viewEvacCenterReport.php?evac_id=<?php echo $evac_id; ?>">
                      <button type="submit" name="showAll" value="showAll" class="btn btn-primary">Show All</button>
                      &nbsp;
                      <a href="demographicsReportPdf.php?evac_id=<?php echo $evac_id;?>&time=<?php echo $time; ?>" target="_blank" class="btn btn-success">Generate PDF</a>
                    </form>
                  </div>
                  <br>

                  <?php
                    if(isset($showAll) || isset($period)) {

                      $time = (isset($showAll)) ? $showAll : $period;

                      $totalEvacs = $demog->retrieveNumberOfEvacueesInSpecificEvac($evac_id, $time);
                      $totalFam = $demog->retrieveNumberOfFamiliesEvacuated($evac_id, $time);
                      $totalFem = $demog->retrieveNumberOfFemaleEvacueesInSpecificEvac($evac_id, $time);
                      $totalMal = $demog->retrieveNumberOfMaleEvacueesInSpecificEvac($evac_id, $time);
                      $myrow = $dist->retrieveDistributionList($evac_id, $time);

                      echo '<h3>Demographics</h3>
                        <table class="table">
                          <tr id="noEvacuees"><td>Total No. of Evacuees:</td><td><b>'.$totalEvacs.'</b></td></tr>
                          <tr><td>Total No. of Families Evacuated:</td><td><b>'.$totalFam.'</b></td></tr>
                          <tr id="noFemaleEvacuees"><td>Total No. of Female Evacuees:<td><b>'.$totalFem.'</b></td></tr>
                          <tr id="noMaleEvacuees"><td>Total No. of Male Evacuees:</td><td><b>'.$totalMal.'</b></td></tr>
                        </table>
                      <h3>Package Distribution</h3>
                        <table class="table">
                          <tr>
                            <th>Package ID</th>
                            <th>Package Name</th>
                            <th>Date Received</th>
                            <th>Relief Operation</th>
                            <th>No. of Families</th>
                          </tr>';
          
                        
                      foreach ($myrow as $row) {
                          
                        echo '
                        <tr id="distList">
                          <td>'.$row['package_id'].'</td>
                          <td>'.$row['package_name'].'</td>
                          <td>'.date_format(new DateTime($row['date_dist']), 'M d Y').'</td>
                          <td>'.$row['operation_name'].'</td>
                          <td>'.$row['householdnumber'].'</td>
                        </tr>';
                        }

                      $myrow = $demog->retrieveNumberOfInfected($evac_id, $time);
                      
                      echo '</table>
                      <h3>Health Status</h3>
                      <table class="table">
                        <tr>
                          <th>Disease Name</th>
                          <th>Infected</th>
                        </tr>';
                          foreach ($myrow as $row) {
                            echo '
                            <tr>
                              <td>'.$row['disease_name'].'</td>
                              <td>'.$row['infected'].'</td>
                            </tr>';
                          }

                      echo '</table>';
                    }
                  ?>
                  <center><a href="evacCenterReport.php" class="btn btn-warning col-md-3">Back</a></center>
                  
                </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->





<!-- Modal All Evacuees-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <h1>List of Evacuees</h1>
      <table class="table table-striped table-hover" id="myTable">
        <thead>
        <tr>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
        </tr>
      </thead>

      </table>
    </div>
  </div>
</div>

<!-- Modal Female Evacuees-->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <h1>List of Female Evacuees</h1>
      <table class="table table-striped table-hover" id="myTable2">
        <thead>
        <tr>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
        </tr>
      </thead>

      </table>
    </div>
  </div>
</div>

<!-- Modal Male Evacuees-->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <h1>List of Male Evacuees</h1>
      <table class="table table-striped table-hover" id="myTable3">
        <thead>
        <tr>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
        </tr>
      </thead>

      </table>
    </div>
  </div>
</div>


<!-- Modal Male Evacuees-->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <h1>Distribution List</h1>
      <table class="table table-striped table-hover" id="myTable4">
        <thead>
        <tr>
          <th>Package Name</th>
          <th>Date Received</th>
          <th>Relief Operation</th>
          <th>Household</th>
        </tr>
      </thead>

      </table>
    </div>
  </div>
</div>

      <footer class="footer">
        <p>Project Ark © 2018 All Rights Reserved</p>
      </footer>


<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>



</body>
</html>
<script>
$(document).ready(function(){

  $("#date").change(function() {
    if($("#date").val() != "") {
      $("#period").submit();
    }
  });

//ALL
//EVACUEES
  $('#noEvacuees').click(function() {

    <?php

      $myrow = $demog->retrieveEvacueesInSpecificEvac1($evac_id, $time);
      foreach ($myrow as $row) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];

         echo "
         var html_code = '<tr>';
          html_code += '<td>".$fname."</td>';
          html_code += '<td>".$mname."</td>';
          html_code += '<td>".$lname."</td>';
          html_code += '</tr>';

          $('#myTable').append(html_code);

         ";

      }
    ?>

    $('#myModal').modal('toggle');
   
    
    });


//FEMALE 
//EVACUEES
    $('#noFemaleEvacuees').click(function() {
    <?php
      $myrow = $demog->retrieveFemaleEvacueesInSpecificEvac1($evac_id, $time);
      foreach ($myrow as $row) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];

         echo "
         var html_code = '<tr>';
          html_code += '<td>".$fname."</td>';
          html_code += '<td>".$mname."</td>';
          html_code += '<td>".$lname."</td>';
          html_code += '</tr>';
          $('#myTable2').append(html_code);
         ";
      }
    ?>

    $('#myModal2').modal('toggle');
    
    });

//MALE
//EVACUEES
    $('#noMaleEvacuees').click(function() {
    <?php
      $myrow = $demog->retrieveMaleEvacueesInSpecificEvac1($evac_id, $time);
      foreach ($myrow as $row) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];

         echo "
         var html_code = '<tr>';
          html_code += '<td>".$fname."</td>';
          html_code += '<td>".$mname."</td>';
          html_code += '<td>".$lname."</td>';
          html_code += '</tr>';
          $('#myTable3').append(html_code);
         ";
      }
    ?>

    $('#myModal3').modal('toggle');
    
    });
//DISTRIBUTION
//LIST
    $('#distList').click(function() {
    <?php
      $myrow = $dist->retrieveDistributionList1($evac_id, $time, $package_id);
      foreach ($myrow as $row) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mname = $row['mname'];

         echo "
         var html_code = '<tr>';
          html_code += '<td>".$fname."</td>';
          html_code += '<td>".$mname."</td>';
          html_code += '<td>".$lname."</td>';
          html_code += '</tr>';
          $('#myTable4').append(html_code);
         ";
      }
    ?>

    $('#myModal4').modal('toggle');
    
    });

});

</script>