<?php session_start();
  header("Cache-Control: no-cache, must-revalidate");
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }

  if(isset($_GET["package_id"])) {
    $package_id = $_GET["package_id"];
  }
?>
<?php

include 'functions/reliefpackageFunctions.php';
include 'functions/reliefitemsFunctions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Item</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="../logout.php" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
          
          <?php include '../adminNavbar.php'; ?>
            

            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px; margin-bottom: 25px;" ><!--START OF RIGHTCARD-->
              <div class="container" style="margin-top: 25px; margin-bottom: 25px;">
                <a href="reliefpackage.php" class="btn btn-warning col-md-1" style="margin-bottom: 10px;">Back</a>
                        <div class="col-md-12">
                          <?php
                            $package = $obj->retrievePackage($package_id);
                          ?>
                          <div class="container">
                          
                          <div class="col-md-6">
                          <table class="table">
                            <tr>
                              <td><b>Package Name:</b></td>
                              <td><?php echo $package["package_name"]; ?></td>
                            </tr>
                            <tr>
                              <td><b>Operation Name:</b></td>
                              <td><?php echo $package["operation_name"]; ?></td>
                            </tr>
                            <tr>
                              <td><b>Sponsor:</b></td>
                              <td><?php echo $package["sponsor_name"]; ?></td>
                            </tr>
                          </table>
                        </div><br>
                        <center><h4>Add Items to Package</h4></center><br>
                        <form id="itemForm" class="row" method="POST" action="functions/reliefItemsFunctions.php">
                          <input type="hidden" name="package_id" value="<?php echo $package_id; ?>">
                           <div class="form-group col-md-4">
                            <label for="item">Item</label>
                            <select id="item" name="item" class="form-control" required>
                              <option value="">Select an item</option>
                              <?php
                                $myRow = $Functions->retrieveNonZeroItems();
                                foreach($myRow as $row) {
                                  echo "<option value='".$row['item_no']."'>".$row['item_name']." (".$row['qty'].")</option>";
                                }
                              ?>
                            </select>
                          </div>               
                          <div class="form-group col-md-5">
                            <label for="qty">Quantity</label>
                            <input data-target="qty" type="number" class="form-control" id="qty" name="qty" required> 
                          </div>

                          <div class="form-inline col-md-3">
                            <button id="addItem" type="submit" name="addItem" class="btn btn-primary">Add</button>
                          </div>
                        </form>
                          <br>
                          
                           <table class="table table-hovered" id="regStudent">
                              <thead>
                                <tr>
                                  <th>Item</th>
                                  <th>Quantity</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                    
                                  <?php
                                    $myRow = $Functions->retriveItemsInPackage($package_id);
                                    foreach ($myRow as $row) {
                                      echo ' 
                                          <tr>
                                          <form method="POST" action="functions/reliefItemsFunctions.php">
                                        <input type="hidden" name="packagedItems_id" value="'.$row['packagedItems_id'].'">
                                        <input type="hidden" name="item_id" value="'.$row['item_id'].'">
                                        <input type="hidden" name="qty_item" value="'.$row['qty_item'].'">
                                        <input type="hidden" name="package_id" value="'.$package_id.'">
                                            <td>'.$row["item_name"].'</td>
                                            <td>'.$row["qty_item"].'</td>
                                            <td><button type="submit" class="btn btn-danger" name="removeItem">Remove Item</button></td>
                                            </form>
                                          </tr>
                                        ';
                                    }

                                  ?>
                          
                              
                          </table>
           
                       
                
                        </div>
                         
                                                </div>
                                              </div>
                                            </div>
                                      </div><!--END OF RIGHTCARD--> 
                                    </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->






<script src="../js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>
<script src="../datatables/datatables-bootstrap.js"></script>
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

    $("#itemForm").submit(function(e) {
      var newQty = $("#qty").val();
      var oQty = $("#item option:selected").text();
      var status;

      status = false;
      oQty = oQty.split("(")[1];
      oQty = oQty.split(")")[0];

      if(Number(oQty) >= newQty && newQty > 0) {
        status = true;
      } else {
        alert("Invalid quantity!");
      }

      return status;
    });

    $('#regStudent').DataTable();
} ); 

</script>
</body>
</html>
