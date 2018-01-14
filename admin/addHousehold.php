<!DOCTYPE html>
<?php include 'functions/householdFunctions.php'; 
?>
<html lang="en">
<head>
  <title>Household</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
  <!--Add adult-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="#" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF CONTAINER FLUID-->
      <div class="row"><!--start of row-->
          <?php include '../adminNavbar.php'; ?>

          <?php
            if(isset($_GET['household_id'])) {
               $household_id = $_GET['household_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px;">
                      <center><h6>Household Details</h6></center>
                      <div class="container" style="margin-top: 5%">
                        
                          <div class="col-md-12">
                        <div class="panel-body"> 
                          <form method="post" action="funtions/householdFunctions.php">

                            <div class="text-left">
                              <a href="reliefHousehold.php" class="btn btn-warning">Cancel</a>
                            </div><br>


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
                                <th width="10">Age</th>
                                <th width="10">Memship</th>
                               </tr>
                               <tr>
                                <td contenteditable="true" class="fname"></td>
                                <td contenteditable="true" class="mname"></td>
                                <td contenteditable="true" class="lname"></td>
                                <td contenteditable="true" class="gender"></td>
                                <td contenteditable="true" class="bday"></td>
                                <td contenteditable="true" class="age"></td>
                                <td contenteditable="true" class="house_memship"></td>
                               </tr>
                              </table>
                              <div align="right">
                               <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                              </div>
                              <div align="center">
                               <!--<button type="button" name="save" id="save" class="btn btn-info">Save</button>-->
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
        <input data-target="brgy_name" type="text" class="form-control" id="brgy_name" name="brgy_name"> 
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-4">
        <label for="city">City</label>
        <input data-target="city" type="text" class="form-control" id="city" name="city"> 
      </div>

      <div class="form-group col-md-4">
        <label for="province">Province</label>
        <input data-target="province" type="text" class="form-control" id="province" name="province"> 
      </div>
    </div>

                            <div class="clearfix"></div>

                            <div class="text-center">
                              <button type="submit" class="btn btn-primary" id="submithousehold" name="submithousehold">Submit</button> 
                            </div>
                            </div>  <!--End of .panel-body-->     
                            <div class="panel-footer">
                              
                            </div>  
                          
                        </div>
                        </div>

                      </div>
                      </div>
                    </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->


<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="datatables/datatables-bootstrap.js"></script>
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

    $('.add-btn').on('click', function(e){
      e.preventDefault();
      var x = $('.child-clone').val();
      
    })
} );
</script>





<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='fname'></td>";
   html_code += "<td contenteditable='true' class='mname'></td>";
   html_code += "<td contenteditable='true' class='lname'></td>";
   html_code += "<td contenteditable='true' class='gender'></td>";
   html_code += "<td contenteditable='true' class='bday'></td>";
   html_code += "<td contenteditable='true' class='age'></td>";
   html_code += "<td contenteditable='true' class='house_memship'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#submithousehold').click(function(){
  var fname = [];
  var mname = [];
  var lname = [];
  var gender = [];
  var bday = [];
  var age = [];
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
   bday.push($(this).text());
  });
  $('.age').each(function(){
   age.push($(this).text());
  });
  $('.house_memship').each(function(){
   house_memship.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{fname:fname, mname:mname, lname:lname, gender:gender, bday:bday, age:age, house_memship:house_memship },
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
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
