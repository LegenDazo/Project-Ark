<?php session_start();
  if ($_SESSION['username'] == "" && $_SESSION['type'] == "" || $_SESSION['type'] == "normal") {
      header("location:../logout.php");
  }
?>
<?php

include 'functions/diseaseFunctions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Disease</title>
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
                       if (isset($_GET['disease_id'])) {
                          $disease_id = $_GET['disease_id'];
                        }
                      ?>
                        <h2>Edit/Update Disease &nbsp;<a href="viewDiseaseDetails.php?disease_id=<?php echo $disease_id;?>" class="btn btn-warning">Cancel</a></h2>
                      </button>

                      <?php
                        if (isset($_GET['disease_id'])) {
                            $disease_id = $_GET['disease_id'];
                            $process = $_GET['process'];

                            if($process == 'update'){

                          $myrow = $Functions->retrieveDiseaseItemData2($disease_id);

                          foreach ($myrow as $row) {
                            $disease_id = $row['disease_id'];
                            $disease_name = $row['disease_name'];
                          }
                        }
                      }
                      ?> 

                      <form method="post" action="functions/diseaseFunctions.php?process=update&disease_id=<?php echo $disease_id?>">
                        
                              <div class="form-group col-md-3">
                                  <label>Disease ID</label>
                                  <p class='form-control'><?php echo $disease_id;?></p>
                                  <input type="hidden" name="disease_id" class="form-control" value="<?php echo $disease_id;?>" disabled>
                              </div>

                              <div class="form-group col-md-3">
                                  <label>Disease Name</label>
                                  <input type="text" name="disease_name" class="form-control" value="<?php echo $disease_name;?>">
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group col-md-12">
                                <button class="btn btn-primary" type="submit" name="updateDisease">Update</button>
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
            window.location.href="disease.php?disease_id="+<?php echo $disease_id;?>;
        });
        $('#delete').click(function(){
            $('#viewConfirm').show();
            $('#confirm').click(function(){
                window.location.href="functions/diseaseFunctions.php?process=delete&disease_id=<?php echo $disease_id;?>";
            });
            $('#cancel').click(function(){
                $('#viewConfirm').hide();
            });
        });
    });
</script>


</body>
</html>
