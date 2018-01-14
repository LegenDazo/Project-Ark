
<!DOCTYPE html>
<?php
  include 'functions/retrieveEvacuationCenterFunction.php';
?>
<html lang="en">
<head>
  <title>ARK</title>
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
    <a href="#" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
           <div class="col-md-3"><!--START of LEFT COLUMN-->
                <div class="card" id="profile" style="margin-top: 25px;">
                <img src="../images/user.png">
                  <center><label  class="name" >Mylene D. Pepito</label><br>
                  <label >Residents</label></center>
                </div>

                <div class="card" style="margin-top: 10px;">
                  <ul class="navbar-nav flex-column" id="sidenav">
                    <li class="nav-item">
                      <a class="nav-link active" href="home.php"><i class="material-icons">home</i>  Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="material-icons">place</i>  Evacuation Centers</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="viewProfile.php"><i class="material-icons">person</i>  View Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="material-icons">settings</i>  Manage Account</a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                              <ul class="flex-column pl-2 nav">
                                  <li class="nav-item"><a class="nav-link py-0" href="contactNum.php">Change Contact Number</a></li>
                                  <li class="nav-item"><a class="nav-link py-0" href="changePassword.php">Change Password</a></li>
                              </ul>
                        </div>
                    </li>               
                  </ul>
              </div> 
          </div><!--end of left column-->
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD--> 

                  <div class="container" style="margin-top: 15px; padding-bottom: 20px;">
                      <center><h3>Evacuation Center</h3></center>
                      
                      <div id="map"></div>
                      <div class="row" style="margin-top: 10px;">
                        <div class="container-fluid">
                          <h2 align="center">Demographics</h2>
                          <h5>Building Name: </h5>
                          <h5>Building Name: </h5>
                          <h5>Building Name: </h5>
                          <h5>Building Name: </h5>
                          <h5>Building Name: </h5>
                        </div>
                      </div>
                      <br>


                      
                  </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->


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


    <?php
        $myrow = $obj->retrieveEvacuationCenter();
        foreach ($myrow as $row) {
          $location = $row['location_name'];
          $population = $row['population'];
          $capacity = $row['capacity'];
          $house_no = $row['house_no'];
          $street = $row['street'];
          $barangay = $row['barangay'];
          $city = $row['city'];
          $province = $row['province'];
    
          $address = $house_no.", ".$street.", ".$barangay.", ".$city.", ".$province;


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
        infoWindow.open(map, marker);
      });
      

      return marker;
   }

 
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGBBcJjSDydVZGt54C64CgpXy82xLtpWM&callback=initMap"
    async defer></script>

</body>
</html>
