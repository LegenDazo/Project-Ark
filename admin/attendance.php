<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }

  if(isset($_POST["evac_id"]) && $_POST["evac_id"] != "") { // mo check siya if naay evac_id nga na set, at default kay wala
    $evac_id = $_POST["evac_id"]; //everytime mo select or change ka ug evac_id kay kwaon niya ang value ni evac_id nga na select sa dropdown
  }

include 'functions/attendanceFunctions.php';
include 'functions/retrieveEvacuationCenterFunction.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="./jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Logout</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h3>Attendance</h3></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                        
                                <center>
                                <div class="form-group col-md-5">
                                  <form id="evacForm" method="POST" action="attendance.php"> <!-- kani nga form ang ma submit inig change sa select nga item -->
                                  <select class="form-control" id="evac_select" name="evac_id" required>
                                  <option value="">Please select a evacuation center...</option>
                                    <?php
                                        $myrow = $obj->retrieveEvacuationCenter();
                                        foreach ($myrow as $row) {
                                    ?>
                                    <option value="<?php echo $row['evac_id'];?>"
                                    <?php
                                      if(isset($evac_id) && $evac_id == $row['evac_id']) {
                                        echo ' selected'; // mo display ang selected nga evac center
                                      }
                                    ?>
                                    ><?php echo $row['location_name'];?></option>
                                    <?php }?>
                                  </select>
                                  </form>
                                </div>
                              </center>

                          <?php
                            if(isset($evac_id)) {
                              $center = $obj->getEvacCenter($evac_id); //gikuha ang tanan data sa evac center
                              $hasSpace = ($center["population"] == $center["capacity"]) ? false : true; //if true siya mo adto siya sa first

                              echo 
                              "<h4>Population: <span id='pop'>".$center["population"]."</span></h4> 
                              <h4>Capacity: <span id='cap'>".$center["capacity"]."</span></h4>
                              <br>"; 
                            } //ang pop kay mo update siya everytime mo click ug present or mag add ug tao sa evac center same sa cap
                          ?>

                      
                          <table class="table" id="residents">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Address</th>
                              <?php

                                if(isset($evac_id)) { //if nag select na ug evac id mogawas na ang check in ug checkout nga table
                                  echo '
                                    <th>Check-In</th>
                                    <th>Check-Out</th>';
                                } else {
                                  echo '<th>Evacuation Center</th>'; //if wala nag select ug evac id mogawas lng ang evacuation center nga table
                                }
                              ?>
                              </tr>
                            </thead>
                            
                            <?php
                              $myrow = $Functions->retrieve_residentData(); //gikuha ang resident data
                              foreach ($myrow as $row) {
                            ?>
                            <tr>
                            <td><?php echo $row['lname']; echo ", "; echo $row['fname']; echo " "; echo $row['mname']?></td>
                            <td><?php echo $row['brgy_id']; echo ", "; echo $row['house_no']; echo ", "; echo $row['street']?></td>

                            <?php
                              $resident_id = $row['resident_id']; //gikuha ang value ni resident data
                              $val = $Functions->retrieve_EvacuationCenter($resident_id); //check if nasud ba siya sa evac center or wala
                              if(isset($evac_id)) {                              
                                $status = $Functions->retrieve_AttendanceData($resident_id, $evac_id); // check ang status sa attendance table if nasud ba siya or wala
                                $checkin = $Functions->retrieve_CheckinDate($resident_id); //gikuha ang value sa checkin date, if wala siyay checkin date wala siyay evac center
                              echo '<div>
                                <input type="hidden" name="resident_id" value="'.$resident_id.'">
                                <td>
                                  <div id="check'.$resident_id.'">';
                                      
                                  if($status) { //if naa siya sa evac center mo display ang checkin if wala this happenss... (naas ubos nga code)
                                    echo $checkin;
                                  } else {
                                    if($val) { // e check if naa siya sa lain nga evac center if naa e display ang evac center kung asa siya na belong if wala mao ni mahitabo... (code naa sa ubos)
                                      echo 'Resident is at '.$val["location_name"];
                                    } else {
                                      if($hasSpace) { // e check if naa pabay space ang evac center if wala na mogawas
                                        echo '<button class="btn btn-success checkin" type="submit" name="checkin" value="'.$resident_id.'">Present</button>';
                                      } else {
                                        echo "This evacuation center is full.";
                                      }
                                    }
                                  }
                                  echo '
                                  </div>
                                </td>
                                <td>
                                <div id="checkoutDiv'.$resident_id.'">
                                <button class="btn btn-danger checkout" name="checkout" id="checkout'.$resident_id.'" value="'.$resident_id.'" ';
                                
                                if(!$val || !$status) { //if naa siya sa other evac center or if wala pa siya na checkin
                                  echo ' disabled';
                                }
                                echo '>Check-Out</button> 
                                </div>
                                </td>
                              </div>';
                                } else { // if wala pa nmo na set ang evac center mo display ang current value sa evac center sa resident or mka display kay none if wala pa
                                  echo "<td>";
                                  if($val) {
                                    echo $val["location_name"];
                                  } else {
                                    echo "None";
                                  }
                                  echo "</td>";
                                }
                                echo '</tr>';
                              }
                              ?>
                          </table>
                        </div>
                      </div>
                    </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTAINER-->

    <footer class="footer">
        <p>Project Ark © 2017 All Rights Reserved</p>
    </footer>


<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="../datatables/datatables-jquery.js"></script>     
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

    $(document).on('click', '.checkin', function() {
        var resident_id = $(this).attr("value"); //gikuha ang value sa resident_id sa taas
        var value = $('#evac_select').val(); // gikuha ang value sa evac center sa taas kadtong sa dropdown
          $.post('functions/attendanceFunctions.php',"resident_id="+resident_id+"&evac_id="+value, 
            function(response) { //Ajax, response kay mo return ug unsay naa sa attendance function
              $('#check'+resident_id).html(response); // change the present button or the div containing the present button to the response received (or time)
              $("#checkout"+resident_id).attr("disabled", false); // after nag click sa present ma disable na ang attribite ni checkout nga disable attribute so pwde na siya ma click ang checkout nga button
              $("#pop").html(Number($("#pop").text()) + 1); //convert first the span element into number then ma add na dayon ang population sa taas , +1 siya
              if($("#pop").text() == $("#cap").text()) { // if ma equal na ang population or ang pop sa cap or capacity ma disable na ang checkin button or present button
                $(".checkin").attr("disabled", true); //* note sa front end rani siya kay na add naman daan sa backend pag call sa function ni attendance function 
              }
          }); 
       
    });

    $('.checkout').click(function(){ // inig click nko sa checkout mo call siya ani nga function sa ubos...
        var resident_id = $(this).attr("value"); // gikuha nko ang value sa resident id nga gi click
        var value = $('#evac_select').val(); //gikuha ang value sa evac center kadtong naa sa dropdown * dili siya ka checkout sa lain evac center dapat e select jd nmo ang evac center nga asa na assign si resident (mo display ra if asa siya currently na assign)
          $.post('functions/attendanceFunctions.php',"resident_id="+resident_id+"&evac_id="+value+"&deleted=1", function(response) { //sends data to backend attendanceFunction, gisend ang resident data ug evac_id and deleted nga flag
            $('#checkoutDiv'+resident_id).html(response); // e return ang data nga nakuha sa attendance function which is ang date nga na checkout
            if($("#pop").text() == $("#cap").text()) { // e compare ang current population sa capacity if equal sila, if equal sila e refresh ang page 
              location.reload();
            }
            $("#pop").html(Number($("#pop").text()) - 1); //if wala ra napuno or dili equal si population ni capacity derecho na siya minus * note sa front end rani siya kay na minus naman daan sa backend pag call sa function ni attendance function
          }); 
        
    });

    $("#evac_select").change(function() { //if ma change ang giselect nga evac center sa dropdown
      $("#evacForm").submit(); //submits the form para ma change ang evac_id nga na set
    });

    $('#residents').DataTable(); //data table nga function
} );
</script>
</body>
</html>
