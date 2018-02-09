<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php

include 'functions/barangayFunctions.php';
?>

<!DOCTYPE html>
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
<style>
#map{
  height: 70vh;

}
</style>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Logout</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;"><!--START OF RIGHTCARD--> 

                  <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h3>Evacuation Center</h3></center>
                      
                      <div id="map"></div>
                      <br>


                      <form method="post" action="functions/insertEvacuationCenter.php">
                        <div class="form-group">
                          <label for="location">Location Name:</label>
                          <input type="text" class="form-control" id="location" name="location">
                        </div>

                        <div class="row">
                           
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="capacity" class="form-control" id="capacity" name="capacity">
                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="lat" class="form-control" id="lat" name="lat">
                          </div>
                        </div>

                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="lng">Longitude</label>
                            <input type="lng" class="form-control" id="lng" name="lng">
                          </div>
                        </div>
                                 
                        </div>


                        <div class="row">
                           <div class="col-md-2">
                           <div class="form-group">
                            <label for="houseno">House #</label>
                            <input type="houseno" class="form-control" id="houseno" name="houseno">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="street">Street</label>
                            <input type="street" class="form-control" id="street" name="street">
                          </div>
                        </div>
                        <div class="form-group col-md-5">
                                  <label for="barangay">Barangay</label>
                                  <select class="form-control" id="sel1" name="brgy">
                                  <option></option>
                                    <?php
                                        $myrow = $Functions->retrieve_barangayData();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['brgy_id'];?>"><?php echo $row['brgy_name'];?></option>
                                    <?php }?>
                                  </select>
                                </div>            
                        </div>
                          <br>
                          <center>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-block" name="submitevac">Set as Evacuation Center</button>
                          </div>
                          </center>
                      
                        
                      </form>
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
  function initMap(){
    var options = {
      zoom:19,
      center: {lat:10.3693,lng:123.9168},
      mapTypeId: google.maps.MapTypeId.HYBRID
    }

    var map = new google.maps.Map(document.getElementById('map'),options);

    var marker = new google.maps.Marker({
      position:{
        lat: 10.3693,
        lng: 123.9168
      },
      map:map,
      draggable:true,
      animation: google.maps.Animation.DROP
    });

    google.maps.event.addListener(marker, 'dragend', function(event){
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();

      $('#lat').val(lat);
      $('#lng').val(lng);
    });


 
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGBBcJjSDydVZGt54C64CgpXy82xLtpWM&callback=initMap"
    async defer></script>

</body>
</html>
