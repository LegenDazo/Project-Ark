<!DOCTYPE html>
<?php
  include 'functions/demographicsFunction.php';

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

              


              <div class="container" style="margin-top: 25px;">
                <div class="row">
                        
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-block">
                                <h6 class="card3-text" style="text-align: center;">Total Number of Residents</h6>
                                <h1 class="card-text" style="text-align: center;"><?php echo $total = $demog->retrieveNumberOfResidents();?></h1>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                              <div class="card">
                                <div class="card-block">
                                  <h6 class="card-text" style="text-align: center">Total Number of Evacuees</h6>
                                  <h1 class="card-text" style="text-align: center"><?php echo $total = $demog->retrieveNumberOfEvacuees();?></h1>
                                </div>
                              </div>
                          </div>
         
                          <div class="col-md-3">
                            <div class="card">
                              <div class="card-block">
                                <h6 class="card-text" style="text-align: center">Total Female Evacuees</h6>
                                <h1 class="card-text" style="text-align: center"><?php echo $total = $demog->retrieveNumberOfFemaleEvacuees();?></h1>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                              <div class="card">
                                <div class="card-block">
                                  <h6 class="card-text" style="text-align: center">Total Male Evacuees</h6>
                                  <h1 class="card-text" style="text-align: center"><?php echo $total = $demog->retrieveNumberOfMaleEvacuees();?></h1>
                                </div>
                              </div>
                          </div>
                          
                        </div> 
              </div>
              <center>
                <div id="chartContainer" style="height: 350px; width: 78%; margin-top: 20px;">                       
                    <script src="../js/chart.js"></script>
                </div>
              </center>



              </div><!--END OF RIGHTCARD--> 
          </div><!-- END of RIGHT COLUMN-->
     
      </div><!--END OF ROW-->
      </div><!--END OF CONTAINER FLUID-->



<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script type="text/javascript">

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer", {
    title:{
      text: "Demographics"              
    },
    data: [              
    {
      // Change type to "doughnut", "line", "splineArea", etc.
      type: "column",
      dataPoints: [
        { label: "Total Residents",  y: <?php echo $total = $demog->retrieveNumberOfResidents();?>  },
        { label: "Total Evacuees",  y: <?php echo $total = $demog->retrieveNumberOfEvacuees();?>  },
        { label: "Female Evacuees", y: <?php echo $total = $demog->retrieveNumberOfFemaleEvacuees();?>  },
        { label: "Male Evacuees", y: <?php echo $total = $demog->retrieveNumberOfMaleEvacuees();?>  }
        
        
      ]
    }
    ]
  });
  chart.render();
}
</script>
</body>
</html>
