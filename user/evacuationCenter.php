<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "admin") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php
  
  include 'functions/retrieveEvacuationCenterFunction.php';

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
          <?php include 'userNavbar.php';?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;"><!--START OF RIGHTCARD--> 

                  <div class="container" style="margin-top: 15px; padding-bottom: 20px;">
                      <center><h3>Evacuation Center</h3></center>
                      
                      <div id="map"></div>
                      
                      


                      
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
      zoom:16,
      center: {lat:10.3693,lng:123.9168},
      mapTypeId: google.maps.MapTypeId.HYBRID
    }

    var map = new google.maps.Map(document.getElementById('map'),options);


    <?php
        $myrow = $evac->retrieveEvacuationCenter();
        foreach ($myrow as $row) {
          $location = $row['location_name'];
          $population = $row['population'];
          $capacity = $row['capacity'];
          $house_no = $row['house_no'];
          $street = $row['street'];
          $brgy_name = $row['brgy_name'];
          $city = $row['city'];
          $province = $row['province'];
          
    
          $address = $house_no.", ".$street.", ".$brgy_name.", ".$city.", ".$province;


          echo "addMarker(new google.maps.LatLng(".$row['latitude'].",".$row['longitude']."),map,'$location','$population','$capacity','$address');";
        }

    ?>




  //latitude, longitude, population, capacity, location_name, house_no, street, barangay, city, province

   function addMarker(latLng, map,location, population, capacity, address){
    
      var marker = new google.maps.Marker({
        position: latLng,
        map:map,
        animation: google.maps.Animation.DROP
      });

      var contentString = "<label><b>"+location+"</b></label>"+"<br>"+"<label>Address: "+address+"</label>"+"<br>"+"<label>Current Population: "+population+" / "+capacity+"</label>";

      var infoWindow = new google.maps.InfoWindow({
        content: contentString
      });

      google.maps.event.addListener(marker, 'click', function(){
        map.panTo(marker.position); //pan to marker position
        map.setZoom(20); // zoom in
        infoWindow.open(map, marker); //show infoWindow

        
        google.maps.event.addListener(map, 'click', function(){ //addListener on click on map
          infoWindow.close(); //close infoWindow
        });

        google.maps.event.addListener(map, 'dblclick', function(){ //addListener on double click on map
         map.setZoom(15); //zoom out
         map.panTo(map.position); //pan to center of barangay

        });

      });
      
      return marker;
   }

 
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGBBcJjSDydVZGt54C64CgpXy82xLtpWM&callback=initMap"
    async defer></script>

</body>
</html>
