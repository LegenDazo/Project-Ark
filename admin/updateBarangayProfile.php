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
  <title>Project Ark</title>
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
              <div class="card" style="margin-top: 25px;" ><!--START OF RIGHTCARD-->
                <div class="container" style="margin-top: 25px;">
                    <?php
                       if (isset($_GET['brgy_id'])) {
                          $brgy_id = $_GET['brgy_id'];
                        }
                      ?>
                        <h2>Update Resident Record &nbsp;<a href="barangayProfile.php?brgy_id=<?php echo $brgy_id;?>" class="btn btn-warning">Cancel</a></h2>
                      </button>

                      <?php
                        if (isset($_GET['brgy_id'])) {
                            $brgy_id = $_GET['brgy_id'];
                            $process = $_GET['process'];

                            if($process == 'update'){

                          $myrow = $Functions->retrieve_barangayItemData2($brgy_id);

                          foreach ($myrow as $row) {
                            $brgy_id = $row['brgy_id'];
                            $brgy_name = $row['brgy_name'];
                            $city = $row['city'];
                            $province = $row['province'];
                          }
                        }
                      }
                      ?> 

                      <form method="post" action="functions/barangayFunctions.php?process=update&brgy_id=<?php echo $brgy_id?>">
                                    <div class="form-group col-md-3">
                                      <label>Barangay's ID Number</label>
                                      <p class='form-control'><?php echo $brgy_id;?></p>
                                      <input type="hidden" name="brgy_id" class="form-control" value="<?php echo $brgy_id;?>" >
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label>Barangay Name</label>
                                      <input type="text" name="brgy_name" class="form-control" value="<?php echo $brgy_name;?>">
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label>City</label>
                                      <input type="text" name="city" class="form-control" value="<?php echo $city;?>">
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label>Province</label>
                                      <input type="text" name="province" class="form-control" value="<?php echo $province;?>">
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="form-group col-md-12">
                                    <button class="btn btn-primary" type="submit" name="updateBarangay">Update</button>
                                  </div>
                      </form>

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
   $(document).ready(function(){
        <?php 
          if(isset($_GET['msg'])){
            echo "$('#viewkey').show();";
          }
        ?>
        $('.close').click(function(){
            $('#viewkey').hide();
            window.location.href="barangayProfile.php?brgy_id="+<?php echo $brgy_id;?>;
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/barangayFunctions.php?process=delete&brgy_id=<?php echo $brgy_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
</script>


</body>
</html>
