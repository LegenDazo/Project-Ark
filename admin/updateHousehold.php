<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<!DOCTYPE html>
<?php include 'functions/householdFunctions.php'; 
      include 'functions/connection.php';
      include 'functions/barangayFunctions.php';

      //include 'functions/fetch.php';
      //include 'functions/insert.php';

//      include 'functions/retrieveUserIdFunctions.php';

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
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
  <!--Update ajax-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
        <?php include '../adminNavbar.php'; ?>

          <?php
            if (isset($_GET['resident_id'])) {
              $household_id = $_GET["resident_id"];
              //$resident_id = $_GET['resident_id'];
              $myrow = $obj->retrieveHouseholdData();

              foreach ($myrow as $row) {
                if($row["household_id"] == $_GET["resident_id"]) {
                  $resident_id = $row['resident_id'];

                  $brgy_id = $row['brgy_id'];

                  $admin_id = $row['admin_id'];
                  //$user_id = $row['user_id'];

                  $house_no = $row['house_no'];
                  
                  $street = $row['street'];
                }
                
              }
            }
          ?>

          
        


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;"><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                      <center><h4>Update Household Details</h4></center>
                      <div class="container" style="margin-top: 3%">
                        <div class="col-md-12">
                        <div class="panel-body"> 

                          <div class="text-left">
                            <a href="household.php" class="btn btn-warning col-md-2"><i class="material-icons">arrow_back</i> Back</a>
                          </div><br>




                          <h5>Household Members:</h5>  
                          <table class="table table-bordered" id="table">
                            <input type="hidden" name="household_id" id="household_id" value="<?php echo $household_id; ?>">
                            <thead>
                              <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Memship</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              
                             


                              <?php
                                  $spouse = false;
                                  //$gender = false;
                                  $myrow  = $obj->retrieveHouseholdData();
                                  foreach($myrow as $row ){ 
                                      if($row['household_id'] == $_GET['resident_id']) {?>
                                      <tr id="<?php echo $row['resident_id']; ?>">
                                      <form method="post" action="functions/householdFunctions.php?resident_id=<?php echo $row['resident_id']; ?>&household_id=<?php echo $row['household_id']; ?>">

                                        <td data-target="fname"><?php echo $row['fname']; ?></td>
                                        <td data-target="mname"><?php echo $row['mname']; ?></td>
                                        <td data-target="lname"><?php echo $row['lname']; ?></td>
                                        <td data-target="gender"><?php echo $row['gender']; ?></td>
                                        <td data-target="bday"><?php echo $row['bday']; ?></td>
                                        <?php
                                          $bday = explode("-", $row["bday"]);

                                          $age = (date("md", date("U", mktime(0, 0, 0, $bday[1], $bday[2], $bday[0]))) > date("md") ? ((date("Y") - $bday[0]) - 1) : (date("Y") - $bday[0]));
                                        ?>
                                        <td data-target="age"><?php echo $age; ?></td>

                                        <td data-target="house_memship"><?php echo $row['house_memship']; ?></td>
                                        <?php
                                          if($row['house_memship'] == "head's spouse") {
                                            $spouse = true;
                                          }
                                        ?>

                                        <td><a href="#" data-role="update" data-id="<?php echo $row['resident_id'] ;?>">update</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php
                                          if($row["house_memship"] != "head") {
                                         //   echo '<a href="updateHousehold.php?deleteMember=1&resident_id='.$row['resident_id'].'&household_id='.$row['household_id'].'" class="btn btn-danger">-</a>';
                                            echo '<button type="submit" name="deleteMember" value="'.$row['resident_id'].'" class="btn btn-danger delete">-</button>';
                                          }

                                          ?>
                                        </td>
                                        </form>
                                      </tr>
                          
                                 <?php } 
                                    } 
                               ?>                               
                            </tbody>
                            <input type="hidden" name="spouse" id="spouse" value="<?php echo $spouse; ?>">
                          </table>

                          
                          
                      

                           <div align="right">
                            <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                          </div>    
                          <div align="center">
                        <!--    <button type="button" name="saveMember" id="saveMember" class="btn btn-info">Save</button> -->
                          </div>
                        <br />
                          <div id="inserted_data"></div>


      <br>
      <br>                    

      <div class="row">
        <div class="form-group col-md-2">
          <label for="house_no"><b>House No.</b></label>
          <input type="hidden" class="form-control" value="<?php echo $house_no;?>" id="Ohouse_no" name="house_no">
          <input type="text" class="form-control" value="<?php echo $house_no;?>" id="house_no" name="house_no"> 
        </div>
                                 
        <div class="form-group col-md-5">
          <label for="street"><b>Street</b></label>
          <input type="hidden" class="form-control" value="<?php echo $street;?>" id="Ostreet" name="street"> 
          <input type="text" class="form-control" value="<?php echo $street;?>" id="street" name="street"> 
        </div>

        <div class="form-group col-md-5">
          <label for="brgy_id"><b>Barangay</b></label>
          <input type="hidden" class="form-control" value="<?php echo $brgy_id;?>" id="Obrgy_id" name="brgy_id">
          <select name="brgy_id" id="brgy_id" class="form-control">
            <?php
                $barangay = $Functions->retrieve_barangayData();
                foreach($barangay as $bar) {
                  echo "<option value='".$bar["brgy_id"]."'"; 
                  if($bar["brgy_id"] == $brgy_id) {
                    echo "selected";
                    $brgy_name = $bar["brgy_name"];
                  }
                  echo ">";
                  echo $bar["brgy_name"];
                  echo "</option>";
                }
            ?>
          </select> 
          <!--  <input type="text" class="form-control" value="<?php// echo $brgy_id;?>" id="brgy_id" name="brgy_id"> -->
        </div>
      </div>

<!--      <div class="row"> -->
<!--
        <div class="form-group col-md-3">
          <label for="admin_id"><b>Admin ID</b></label>
          <input type="text" class="form-control" value="<?php //echo $admin_id;?>" id="admin_id" name="admin_id"> 
        </div>
-->
<!--        <div class="form-group col-md-3">
          <label for="household_id"><b>Household ID</b></label>

          <?php
           //   $myrow = $obj->retrieveHouseholdData();
           //   foreach ($myrow as $row) {
          ?>

          <input type="text" class="form-control" value="<?php // echo $household_id;?>" id="household_id" name="admin_id">

         <?php //}?>

        </div>
              -->

        

<!--       <div class="form-group col-md-3">
          <label for="user_id"><b>User ID</b></label>
         
          <?php
   //           $myrow = $obj->retrieveUserId();
   //           foreach ($myrow as $row) {
          ?>
          <input type="text" class="form-control" value="<?php //echo $row['username'];?>"><?php //echo $row['username'];?></option>
          <?php //}?>


        </div>
   -->
 <!--     </div> -->


  

                        

                          </div>  <!--End of .panel-body-->     

                          <div class="panel-footer">
                            <div class="text-right">
                            <button type="submit" id="action" class="btn btn-primary" name="updatehousehold">Update</button>
                            <br><br>
                            </div>                            
                          </div>

                      </form>
                  </div>  
                         
                        </div>

                      </div>
                    </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->

<div class="modal" id="viewConfirm" role="dialog">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class='modal-header'>
                <h5 class="modal-title" id="exampleModalLabel"><strong>Message</strong></h5>
            </div>
            <div class="modal-body">
                <h4 style="font-size: 100%">Are you sure you want to delete this resident?</h4>
            </div>
            <div class="modal-footer">
                <button id='confirm' class='btn btn-danger btn-md'>Confirm</button>
                <button id='cancel' class='btn btn-warning btn-md'>Cancel</button>
            </div>
          </div>
      </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <form id="modalForm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>

        <div class="modal-body">

          <div class="form-group">
            <label>First Name</label>
            <input type="text" id="fname" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Middle Name</label>
            <input type="text" id="mname" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" id="lname" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Gender</label>
            <select id="gender" class="form-control" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>  
            </select>
          </div>

          <div class="form-group">
            <label>Birthday</label>
            <input id="bday" class="form-control" type="date" required>
            <!-- <input type="text" id="bday" class="form-control"> -->
          </div>
        
          <div class="form-group">
            <label>Membership</label>
            <select id="house_memship" class="form-control" required>
              <option value="dependent">Dependent</option>
              <option value="head">Head</option>
              <option value="head's spouse">Head's Spouse</option>
            </select>
          </div>
    <!--
          <div class="form-group">
            <label>Age</label>
            <input type="text" id="age" class="form-control">
          </div>

            <div class="form-group">
            <label>Memship</label>
            <input type="text" id="house_memship" class="form-control">
          </div>
    -->
          <input type="hidden" id="userId" class="form-control">
        </div>

        <div class="modal-footer">
          <button type="submit" id="save" class="btn btn-primary pull-right">Update</button>
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<footer id="footer" style="background-color: #2C3E50; height: 40px; bottom: 0; position: relative; width: 100%;">
        <p>All Rights Reserved</p>
      </footer>



<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>     
<script>
  $(document).ready( function () {

    $("#modalForm").submit(function(e) {
      e.preventDefault(); 
    });


    $('.add-btn').on('click', function(e){
          e.preventDefault();
          var x = $('.child-clone').val();
          
        })

} );
</script>



<script>
  $(document).ready(function() {

      var household_id = "";
      var resident_id = "";

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();

        $('#viewConfirm').show();
        household_id = $("#household_id").val();
        resident_id = $(this).val();

      });

      $("#confirm").click(function() {
        if(household_id != "") {
          $.ajax({
                url      : 'functions/householdFunctions.php',
                method   : 'post', 
                data     : {household_id: household_id, resident_id: resident_id, deleteMember: 1 },
                success  : function(response){
                  console.log(response);

                  $("#"+response).remove();
                  $('#viewConfirm').hide();
               }
          });
        }
      });

        $('#cancel').click(function() {
          $('#viewConfirm').hide();
          household_id = "";
          resident_id = "";
        });

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function() {
            var id  = $(this).data('id');
            var fname  = $('#'+id).children('td[data-target=fname]').text();
            var mname  = $('#'+id).children('td[data-target=mname]').text();
            var lname  = $('#'+id).children('td[data-target=lname]').text();
            var gender  = $('#'+id).children('td[data-target=gender]').text();
            var bday  = $('#'+id).children('td[data-target=bday]').text();
//            var age  = $('#'+id).children('td[data-target=age]').text();
            var house_memship  = $('#'+id).children('td[data-target=house_memship]').text();

            $('#fname').val(fname);
            $('#mname').val(mname);
            $('#lname').val(lname);
            $('#gender').val(gender);
            $('#bday').val(bday);
//            $('#age').val(age);
            $('#house_memship').val(house_memship);

            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function() {
          var id  = $('#userId').val(); 
          var fname =  $('#fname').val();
          var mname =  $('#mname').val();
          var lname =  $('#lname').val();
          var gender =  $('#gender').val();
          var bday =  $('#bday').val();
        //  var age =  $('#age').val();
          var house_memship =  $('#house_memship').val();

          $.ajax({
              url      : 'functions/connection.php',
              method   : 'post', 
              data     : {fname : fname , mname: mname , lname: lname , gender: gender , bday: bday, house_memship : house_memship , id: id},
              success  : function(response){
                  console.log(response);
                            // now update user record in table 
                             $('#'+id).children('td[data-target=fname]').text(fname);
                             $('#'+id).children('td[data-target=mname]').text(mname);
                             $('#'+id).children('td[data-target=lname]').text(lname);
                             $('#'+id).children('td[data-target=gender]').text(gender);
                             $('#'+id).children('td[data-target=bday]').text(bday);

                             birthday = new Date(bday);

                             var ageDifMs = Date.now() - birthday.getTime();
                             var ageDate = new Date(ageDifMs);
                             age = Math.abs(ageDate.getUTCFullYear() - 1970);

                             $('#'+id).children('td[data-target=age]').text(age);
                             $('#'+id).children('td[data-target=house_memship]').text(house_memship);
                             
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>

<script>
      $(document).ready(function(){

        $("#brgyForm").submit(function(e) {
          e.preventDefault(); 
        });

       var count = 0;
       $('#add').click(function(){
        count = count + 1;
        var spouse = $("#spouse").val();
        var html_code = "<tr id='row"+count+"'>";
         html_code += "<td contenteditable='true' id='fname"+count+"'></td>";
         html_code += "<td contenteditable='true' id='mname"+count+"'></td>";
         html_code += "<td contenteditable='true' id='lname"+count+"'></td>";

         html_code += '<td class="gender"><select id="gender'+count+'"><option value="Male">Male</option><option value="Female">Female</option></select></td>';
       
       //  html_code += '<td class="gender"><select id="gender'+count+'"><option value="female">Female</option></select></td>';
         
         
       //  html_code += "<td contenteditable='true' id='gender"+count+"'></td>";
       //  html_code += "<td contenteditable='true' class='bday'></td>";
         html_code += '<td><input id="bday'+count+'" type="date"></td>';
         html_code += "<td></td>";
         
         if(spouse == 1) {
          html_code += '<td class="house_memship"><select id="membship'+count+'"><option value="dependent">Dependent</option></select></td>';
         } else {

         html_code += '<td class="house_memship"><select id="membship'+count+'"><option value="dependent">Dependent</option><option value="head\'s spouse">Head\'s Spouse</option></select></td>';
         }
      //   html_code += "<td contenteditable='true' class='age'></td>";
      //   html_code += "<td contenteditable='true' class='house_memship'></td>";
      //   html_code += "<td><button type='button' id='remove' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
        // html_code += '<button type="submit" name="deleteMember" value="1" class="btn btn-danger">-</button>';
         html_code += '<td><button type="button" name="saveMember" value="'+count+'" id="saveMember" class="btn btn-info">Save</button></td>';
         html_code += "</tr>";  
         $('#table').append(html_code);
         $(this).attr("disabled", "disabled");
       });
       
       $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");
        $('#' + delete_row).remove();
        $("#add").attr("disabled", false);
       });

       $(document).on('click', "#saveMember", function() {

          var id = $(this).val();
          var fname = $("#fname" + id).text();
          var mname = $("#mname" + id).text();
          var lname = $("#lname" + id).text();
          var gender = $("#gender" + id).val();
          var bday = $("#bday" + id).val();
          var house_memship = $("#membship" + id).val();
          var house_no = $("#Ohouse_no").val();
          var street = $("#Ostreet").val();
          var brgy_id = $("#Obrgy_id").val();
          var household_id = $("#household_id").val();

      /*    if(fname.length != 0 && mname.length != 0 && lname != "" && gender != "" && bday != "" && house_memship != "") {

          }
          
      */
      if(bday != "" && fname != "" && mname != "" && lname != "" && gender != "" && house_memship != "") {
          $.ajax({
           url:"functions/insertMember.php",
           method:"POST",
           data: {
            fname: fname, mname: mname, lname: lname, gender: gender, bday: bday, /* age:age, */ house_memship: house_memship, house_no: house_no, street: street, brgy_id: brgy_id, household_id: household_id },
           success:function(response) {
            var array = JSON.parse(response);
            $("#row"+count).remove();

            var html;
            html = "";

            html += "<tr id='"+array['resident_id']+"'>";

            html +=  '<form method="post" action="functions/householdFunctions.php?resident_id='+array['resident_id']+'&household_id='+array['household_id']+'">';

          //  html += "<form method='post' action='functions/householdFunctions.php?resident_id="+array["resident_id"]+"&household_id="+array["household_id"]+"'>";
            html += "<td data-target='fname'>"+array['fname']+"</td>";
            html += "<td data-target='mname'>"+array['mname']+"</td>";
            html += "<td data-target='lname'>"+array['lname']+"</td>";
            html += "<td data-target='gender'>"+array['gender']+"</td>";
            html += "<td data-target='bday'>"+array['bday']+"</td>";
            birthday = new Date(array["bday"]);

            var ageDifMs = Date.now() - birthday.getTime();
            var ageDate = new Date(ageDifMs);
            age = Math.abs(ageDate.getUTCFullYear() - 1970);
            
            html += "<td data-target='age'>"+age+"</td>";
            html += "<td data-target='house_memship'>"+array['house_memship']+"</td>";
            html += "<td><a href='#' data-role='update' data-id='"+array['resident_id']+"'>update</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

            html += '<button type="submit" name="deleteMember" value="'+array['resident_id']+'" class="btn btn-danger delete">-</button>';

           // html += '<a href="updateHousehold.php?deleteMember=1&resident_id='+array['resident_id']+'&household_id='+array['household_id']+'" class="btn btn-danger">-</a>';
            html += "</td></form></tr>";

            $('#table').append(html);
            $("#add").attr("disabled", false);
    //        fetch_item_data();
           }
          });
      } else {
        alert("Please fill up all of the fields!");
      }

         });




       $('#submithousehold').click(function(){
        var fname = [];
        var mname = [];
        var lname = [];
        var gender = [];
        var bday = [];
      //  var age = [];
        var house_memship = [];
        $('.fname').each(function(){
         fname.push($(this).text());
        });
        $('.mname').each(function(){
         mname.push($(this).text());
        });
        $('.lname').each(function(){
         lname.push($(this).text());
        });
        $('.gender').each(function(){
         gender.push($(this).text());
        });
        $('.bday').each(function(){
         bday.push($(this).val());
        });
      /*  $('.age').each(function(){
         age.push($(this).text());
        });*/
        $('.membship').each(function(){
         house_memship.push($(this).val());
        });

        house_no = $("#house_no").val();
        street = $("#street").val();
        brgy_id = $("#brgy").val();

        $.ajax({
         url:"functions/insert.php",
         method:"POST",
          data: { 
           fname:fname, mname:mname, lname:lname, gender:gender, bday:bday, /* age:age, */ house_memship:house_memship, house_no: house_no, street: street, brgy_id: brgy_id  },
         success:function(data){
          alert(data);
          $("td[contentEditable='true']").text("");
          for(var i=2; i<= count; i++)
          {
           $('tr#'+i+'').remove();
          }
      //    fetch_item_data();
         }
        });
       });


       
       function fetch_item_data()
       {
        $.ajax({
         url:"functions/fetchMember.php",
         method:"POST",
         success:function(data)
         {
          $('#inserted_data').html(data);
         }
        })
       }
    //   fetch_item_data();
       
      }); 


    </script>



</body>
</html>
