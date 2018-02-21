<?php session_start();
  if ($_SESSION['id'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "admin") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php
  
  include '../admin/functions/barangayFunctions.php';
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

                      <form method="post" action="evacuationCenter.php">
                        <div class="form-inline">
                          Meters:&nbsp;<input type="number" name="meter">&nbsp;<input type="submit" name="submitmeter" class="btn btn-primary">&nbsp;<label><i>Default geofence radius is 2500 meters</i></label>
                        </div>
                      </form>
                      <br>

                      <form method="post" action="evacuationCenter.php">
                        <button type="submit" name="showAll" class="btn btn-success">Show All</button>
                      </form>
                      <div id="map"></div>
                      
                      


                      
                  </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->


    <footer class="footer">
        <p>Project Ark © 2018 All Rights Reserved</p>
      </footer>


<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script>
  function initMap() {
    var nearby = "None";
      var lat;
      var lng;
      var options;
      var map;
      var pos;
      var radius = 2500;
      var showAll = false;
      var geofence;


      <?php

        if (isset($_POST['submitmeter'])) {
          echo "radius = ".$_POST['meter'];
        }
      ?>


      <?php
        if (isset($_POST['showAll'])) {
          echo "showAll = true;";
        }

      ?>

       
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
          } else {
              alert("Geolocation is not supported by this browser.");
          }


      function showPosition(position) {
          lat = position.coords.latitude; 
          lng = position.coords.longitude;

          pos = new google.maps.LatLng(lat,lng);

          options = {
            zoom:14,
            center: pos,
            mapTypeId: google.maps.MapTypeId.HYBRID,
          }

          map = new google.maps.Map(document.getElementById('map'),options);

          var mark = new google.maps.Marker({
            position:pos,
            map:map,
            animation:google.maps.Animation.BOUNCE,
            size: new google.maps.Size(20, 32),
            icon: '../images/mymarker.png'

            //icon: 'http://maps.gstatic.com/mapfiles/ms2/micons/blue-pushpin.png',
          });

          google.maps.event.addListener(map, 'bounds_changed', function(event) {
              if(map.getBounds().contains(mark.position)){
                  mark.setAnimation(google.maps.Animation.BOUNCE);
              };
          });

          google.maps.event.addListener(map, 'dblclick', function(){ 
            map.setZoom(14); 
            map.panTo(pos);
            google.maps.event.removeListener(map, 'dblclick');
            google.maps.event.removeListener(map, 'click');
          });

        if(!showAll) {

          geofence = new google.maps.Circle({

              strokeColor: '#FF0000',
              strokeOpacity: 0.3,
              strokeWeight: 2,
              fillColor: '#0000FF',
              fillOpacity: 0.1,
              map: map,
              center: pos,
              radius: radius //meters
          }); 
        }

        var j = 0;
        var evaccenter = [];
        var minDist = -1;

          <?php
            $myrow = $evac->retrieveEvacuationCenter();
            foreach ($myrow as $row) {
              $evac_id = $row['evac_id'];
              $location = $row['location_name'];
              $population = $row['population'];
              $capacity = $row['capacity'];
              $house_no = $row['house_no'];
              $street = $row['street'];
              $brgy_name = $row['brgy_name'];
              $brgy_id = $row['brgy_id'];
              $city = $row['city'];
              $province = $row['province'];
      
        
              $address = $house_no.", ".$street.", ".$brgy_name.", ".$city.", ".$province;


              $shape = $evac->retrieveEvacuationShape($evac_id);
              $lat = 0;
              $lng = 0;
              echo "var coords = [];";

              for($i = 0; $i < sizeof($shape); $i++) {
                $lat += $shape[$i]["latitude"];
                $lng += $shape[$i]["longitude"];
                echo "
                  latLng = { lat: ".$shape[$i]['latitude'].", lng: ".$shape[$i]['longitude']." };
                  coords.push(latLng);
                ";
              }

              if(sizeof($shape) != 0) {
                $lat /= sizeof($shape);
                $lng /= sizeof($shape);
                // Construct the polygon.

                echo "
            
                  var distance = calculateDistance(
                    ".$lat.",
                    ".$lng.",
                    lat,
                    lng
                  );
                  if (showAll || distance * 1000 < radius) {  // radius is in meter; distance in km
                    dist = calculateDistance(lat, lng, $lat, $lng) * 1000;
                  //  dist = Math.sqrt(Math.pow(lat - $lat, 2) + Math.pow(lng - $lng, 2));
                    addMarker(new google.maps.LatLng(".$lat.",".$lng."),map,'$location','$population','$capacity','$address', dist, '$brgy_id');
                
                evaccenter[j] = new google.maps.Polygon({
                  paths: coords,
                  strokeColor: '#FF0000',
                  strokeOpacity: 0.8,
                  strokeWeight: 2,
                  fillColor: '#FF0000',
                  fillOpacity: 0.35
                });


                evaccenter[j].setMap(map);
                j++;
                  }
        

                ";
                
              }
              
            }

            /*echo "console.log('Closest: ' + nearby);";*/

            ?>
      }

       function calculateDistance(lat1, lon1, lat2, lon2) {
          var radlat1 = Math.PI * lat1/180;
          var radlat2 = Math.PI * lat2/180;
          var radlon1 = Math.PI * lon1/180;
          var radlon2 = Math.PI * lon2/180;
          var theta = lon1-lon2;
          var radtheta = Math.PI * theta/180;
          var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
          dist = Math.acos(dist);
          dist = dist * 180/Math.PI;
          dist = dist * 60 * 1.1515;
          dist = dist * 1.609344;
          return dist;
    }


  //latitude, longitude, population, capacity, location_name, house_no, street, barangay, city, province
    var allMarkers = [];
   function addMarker(latLng, map,location, population, capacity, address, distance, brgy_id){

      var full = (capacity == population);

      var marker = new google.maps.Marker({
        position: latLng,
        map:map,
        animation: google.maps.Animation.DROP,
        location: location,
        distance: distance,
        brgy_id: brgy_id,
        full: full
      });

      var contentString = "<label><b>"+location+"</b></label>"+"<br>"+"<label>Address: "+address+"</label>"+"<br>"+"<label>Current Population: "+population+" / "+capacity+"</label><br><label>Distance: "+distance.toFixed(2)+"m</label>";

      var infoWindow = new google.maps.InfoWindow({
        content: contentString
      });

      marker.infoWindow = infoWindow;

      google.maps.event.addListener(marker, 'click', function(){
        map.panTo(marker.position); //pan to marker position
        map.setZoom(20); // zoom in
        infoWindow.open(map, marker); //show infoWindow

        
        google.maps.event.addListener(map, 'click', function(){ //addListener on click on map
          infoWindow.close(); //close infoWindow
          google.maps.event.removeListener(map, 'dblclick');
          google.maps.event.removeListener(map, 'click');
        });
        //addListener on double click on map// google.maps.event.addListener(targetmap,'event', function(){
        //zoom out
        //pan to center of barangay
        //})
        google.maps.event.addListener(map, 'dblclick', function(){ 
         map.setZoom(14); 
         pos = new google.maps.LatLng(lat,lng);
          map.panTo(pos);
          google.maps.event.removeListener(map, 'dblclick');
          google.maps.event.removeListener(map, 'click');
        });

      });
      
      allMarkers.push(marker);
   }

   /*$('#showNearby').click(function() {
=======

   $('#showNearby').click(function() {
>>>>>>> 780c504e806cd607becaef0fae372d9eb3b57562
    var brgy = $("#brgy").val();
    var distance = 99999999;
    var minNdx = -1;

    for(ndx = 0; ndx < allMarkers.length; ndx++) {
      if((brgy == "" || allMarkers[ndx].brgy_id == brgy) && allMarkers[ndx].distance < distance && !allMarkers[ndx].full) {
        minNdx = ndx;
        distance = allMarkers[ndx].distance;
      }
    }

    if(minNdx != -1) {
      map.panTo(allMarkers[minNdx].position);
      map.setZoom(20);
      allMarkers[minNdx].infoWindow.open(map, allMarkers[minNdx]);      
    } else {
      alert("There is no nearest evacuation center!");      
    }


   });*/

 
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGBBcJjSDydVZGt54C64CgpXy82xLtpWM&callback=initMap"
    async defer></script>

</body>
</html>
