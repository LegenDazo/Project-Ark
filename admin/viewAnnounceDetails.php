<!DOCTYPE html>
<?php include 'functions/announceFunctions.php'; 
?>
<html lang="en">
<head>
  <title>Residents</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../materialize/icons.css">

</head>

<body>

    <nav class="navbar navbar-light bg-faded">
    <img src="../images/ARK1.png">
    <a href="#" style="color: white">Log Out</a>
    </nav>

    <div class="container-fluid"><!--START OF MAIN CONTAINER-->
      <div class="row"><!--start of row-->
        
        <?php include '../adminNavbar.php'; ?>

          <?php
            if(isset($_GET['announcement_id'])) {
               $announcement_id = $_GET['announcement_id']; 
          } 
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->             
                  <div class="container" style="margin-top: 5%;">
                      <center><h6>Announcement Details</h6></center>
                        <div class="container" style="margin-top: 5%">
                          <div class="col-md-12">
                                <table class="table table-hovered" id="">
                                <?php                              
                                    $myrow = $obj->retrieveAnnounceItems($announcement_id);
                                    foreach ($myrow as $row) {
                                        ?>
                                              
                                              <tr>
                                                <td>WHAT</td>
                                                <td><b><?php echo $row['an_what']?></b></td>
                                              </tr>
                                              <tr>
                                                <td>WHO</td>
                                                <td><b><?php echo $row['an_who'];?></b></td>
                                              </tr>
                                              <tr>
                                                <td>WHEN</td>
                                                <td><b><?php echo $row['an_when'];?></b></td>
                                              </tr>
                                              <tr>
                                                <td>WHERE</td>
                                                <td><b><?php echo $row['an_where'];?></b></td>
                                              </tr>
                                              <tr>
                                                <td><a href="updateAnnounce.php?announcement_id=<?php echo $row['announcement_id'];?>" class="btn btn-success btn-block">UPDATE</a></td>
                                                <td><a href="announcement.php?deleteannounce=1&announcement_id=<?php echo $announcement_id;?>" class="btn btn-danger btn-block">DELETE</a></td>
                                                <td><a href="announcement.php" class="btn btn-warning btn-block">BACK</a></td>
                                              </tr>  


                 
                                          <?php
                                        }                   
                                  ?>  
                                  </table>
                          </div>
                        </div>
                  </div>
              </div><!--END OF RIGHTCARD--> 
            </div><!-- END of RIGHT COLUMN-->
     
      </div><!--end of row-->
    </div><!--END OF MAIN CONTIANER-->






<script src="../jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap_alpha6.min.js"></script>



</body>
</html>
