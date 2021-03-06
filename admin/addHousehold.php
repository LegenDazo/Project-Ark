<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php 
include 'functions/barangayFunctions.php';
include 'functions/addHouseholdFunctions.php';
include 'functions/insert.php';
?>
<html lang="en">
  <head>
    <title>Project Ark</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../materialize/icons.css">
    <!--Add adult-->
 <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-light bg-faded">
      <img src="../images/ARK1.png">
      <a href="../logout.php" style="color: white">Log Out</a>
    </nav>
    <div class="container-fluid">
      <!--START OF CONTAINER FLUID-->
      <div class="row">
        <!--start of row-->
        <?php include '../adminNavbar.php'; ?>
        <?php
          if(isset($_GET['household_id'])) {
             $household_id = $_GET['household_id']; 
          } 
          ?>
        <div class="col-md-9">
          <!-- START of RIGHT COLUMN-->
          <div class="card" style="margin-top: 25px; margin-bottom: 25px;">
            <!--START OF RIGHTCARD-->
            <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
              <center>
                <h4>Household Details</h4>
                <div class="form-group col-md-6"> 

                  <div id="error" class='alert alert-danger' role='alert' style="visibility: hidden; display: none;"></div>
                  <div id="success" class='alert alert-success' role='alert' style="visibility: hidden; display: none;"></div>
                  </div>
              </center>
              <div class="container" style="margin-top: 5%">
                <div class="col-md-12">
                  <div class="panel-body">
                    <div class="text-left">
                      <a href="household.php" class="btn btn-warning">Back</a>
                    </div>
                    <br>
                    <div class="row">
                      <label><b>Adult/s</b></label><br>                           
                      <div class="form-group col-md-12">
                         <div class="table-responsive">
                          <table class="table table-bordered" id="table">
                            <tr>
                              <th width="20%">First Name</th>
                              <th width="20%">Middle Name</th>
                              <th width="20%">Last Name</th>
                              <th width="15%">Gender</th>
                              <th width="15%">Birthday</th>                              
                              <th width="10">Memship</th>
                            </tr>
                            <tr>
                              <td contenteditable="true" class="fname"></td>
                              <td contenteditable="true" class="mname"></td>
                              <td contenteditable="true" class="lname"></td>

                              <td>
                                <select class="gender">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>  
                                </select>
                              </td>

                              <td><input class="bday" type="date"></td>

                              <td class="house_memship">
                                <select class="membship">
                                  <option value="head">Head</option>
                                  <option value="head's spouse">Head's Spouse</option>
                                  <option value="dependent">Dependent</option>
                                </select>
                              </td>
                            </tr>
                          </table>
                          <div align="right">
                            <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                          </div>
                          <div align="center">
                            
                          </div>
                          <br />
                          <div id="inserted_data"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="house_no">House No.</label>
                        <input  data-target="house_no" type="text" class="form-control" id="house_no" name="house_no"> 
                      </div>
                      <div class="form-group col-md-4">
                        <label for="street">Street</label>
                        <input data-target="street" type="text" class="form-control" id="street" name="street"> 
                      </div>
                      <div class="form-group col-md-4">
                        <label for="brgy_name">Barangay</label>
                        <select id="brgy" name="barangay" class="form-control">
                          <option value="">Select a Barangay</option> 
                          <?php
                            $barangay = $Functions->retrieve_barangayData();
                            foreach($barangay as $bar) {
                              echo "<option value='".$bar["brgy_id"]."'>";
                              echo $bar["brgy_name"];
                              echo "</option>";
                            }
                          ?>
                        </select>
                      
                      </div>
                    </div>
               
                    <div class="clearfix"></div>
                    <div class="text-center">
                      <input type="hidden" id="admin_id" value="<?php echo $_SESSION['id']; ?>">
                      <button type="submit" class="btn btn-primary" id="submithousehold" name="submithousehold">Submit</button> 
                    </div>
                  </div>
              
                  <!--End of .panel-body-->     
                  <div class="panel-footer">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--END OF RIGHTCARD--> 
    </div>
    <!-- END of RIGHT COLUMN-->
    </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->

    <footer id="footer" style="background-color: #2C3E50; height: 40px; bottom: 0; position: relative; width: 100%;">
        <p>All Rights Reserved</p>
      </footer>
      
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>  
    <script> 
      $(document).ready( function () {
      
        $('.add-btn').on('click', function(e){
          e.preventDefault();
          var x = $('.child-clone').val();
          
        })
      } );
    </script>
    <script>
      $(document).ready(function(){

        $("#brgyForm").submit(function(e) {
          e.preventDefault(); 
        });

       var count = 0; //ika pila na gi add; starts w/ 1
       $('#add').click(function(){ 
        count = count + 1;
        var html_code = "<tr id='row"+count+"'>";  //count row as 1
         html_code += "<td contenteditable='true' class='fname'></td>"; //+= compile 1 html
         html_code += "<td contenteditable='true' class='mname'></td>";
         html_code += "<td contenteditable='true' class='lname'></td>";       
         html_code += '<td><select class="gender"><option value="Male">Male</option><option value="Female">Female</option></td>';
         html_code += '<td><input class="bday" type="date" required></td>';
         html_code += '<td class="house_memship"><select class="membship"><option value="head">Head</option><option value="head\'s spouse">Head\'s Spouse</option><option value="dependent">Dependent</option></select></td>';     
         html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
         html_code += "</tr>";  
         $('#table').append(html_code); 
       });
       
       $(document).on('click', '.remove', function(){ //wait for the document to load
        var delete_row = $(this).data("row");
        $('#' + delete_row).remove(); //remove row w/ this id
       });
       
       $('#submithousehold').click(function() { //var = read only inside curly braces
        var fname = []; //initialize empty variable 
        var mname = [];
        var lname = [];
        var gender = [];
        var bday = [];     
        var house_memship = [];
        var length = $(".fname").length;
        var cnt = 0;
        var heads = 0;
        console.log(length);

        admin_id = $("#admin_id").val();

        house_no = $("#house_no").val();
        if(house_no == "") {
            $("#error").html("Please fill up house number");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");            
            return;
        } 

        if(house_no.match("[A-Za-z]+")) {
            $("#error").html("House numbers can't have letters");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");            
            //alert("House numbers can't have letters");
            return;
        } 

        street = $("#street").val();
        if(street == "") {
            $("#error").html("Please fill up all streets");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");           
            return;
        } 

        brgy_id = $("#brgy").val();
        if(brgy_id == "") {
            $("#error").html("Please select a barangay");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");
            return;
        }

        for(i = 0; i < length; i++) {
          if($(".fname:eq("+i+")").text() == "") {
            $("#error").html("Fill up all first names.");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");
            return;
          }
          if($(".lname:eq("+i+")").text() == "") {
            $("#error").html("Fill up all last names.");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");
            return;
          }         

          if($(".bday:eq("+i+")").val() == "") {
            $("#error").html("Fill up all birthdays correctly.");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");
            return;
          } 

          fname.push($(".fname:eq("+i+")").text());
          mname.push($(".mname:eq("+i+")").text());
          lname.push($(".lname:eq("+i+")").text());
          gender.push($(".gender:eq("+i+")").val());
          bday.push($(".bday:eq("+i+")").val());
          house_memship.push($(".membship:eq("+i+")").val());

          if(house_memship[i] == "head's spouse"){
            cnt++;
          }
          if(house_memship[i] == "head"){
            heads++;
          }
        }


        if(house_memship.indexOf("head") != -1) {
          if(heads == 1) {
            if(cnt < 2) { 
                $.ajax({
                 url:"functions/insert.php",
                 method:"POST",
                  data: {                     
                   fname:fname, mname:mname, lname:lname, gender:gender, bday:bday, house_memship:house_memship, house_no: house_no, street: street, brgy_id: brgy_id, admin_id: admin_id  },
                 success:function(data) {       
                  if(data === 'Item Data Inserted') {
                    window.location.href = "household.php";
                  } else {
                    $("#success").html("New Household Inserted");
                    $("#success").css("visibility", "visible");
                    $("#success").css("display", "block");
                    //alert("An erorr has occurred please contact your system administrator");
                  }
                }
              });
            } else {
              $("#error").html("There can only be one spouse.");
              $("#error").css("visibility", "visible");
              $("#error").css("display", "block"); 
            }
          } else {
            $("#error").html("There can only be one head.");
            $("#error").css("visibility", "visible");
            $("#error").css("display", "block");
          }
        } else {
          $("#error").html("There must be a head in the household.");
          $("#error").css("visibility", "visible");
          $("#error").css("display", "block");
        }
       }); 
       
       function fetch_item_data()
       {
        $.ajax({
         url:"fetch.php",
         method:"POST",
         success:function(data)
         {
          $('#inserted_data').html(data); 
         }
        })
       }
       fetch_item_data();
       
      }); 


    </script>
  </body>
</html>