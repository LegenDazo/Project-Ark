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
  <link rel="stylesheet" type="text/css" href="../datatables/datatables.css">
  <link rel="stylesheet" type="text/css" href="../datatables/datatables-bootstrap.css">
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
            if (isset($_GET['announcement_id'])) {
              $announcement_id = $_GET['announcement_id'];
              $myrow = $obj->retrieveAnnounceItems($announcement_id);
              foreach ($myrow as $row) {
                $announcement_id = $row['announcement_id'];
                $an_what = $row['an_what'];
                $an_who = $row['an_who'];
                $an_when = $row['an_when'];
                $an_where = $row['an_where'];
              }
            }
          ?>


            <div class="col-md-9"><!-- START of RIGHT COLUMN-->
              <div class="card" style="margin-top: 25px;"><!--START OF RIGHTCARD-->              
                  <div class="container" style="margin-top: 5%;">
                      <center><h6>Update Announcement Details</h6></center>
                      <div class="container" style="margin-top: 5%">
                        <div class="col-md-12">
                              <form method="post" action="functions/announceFunctions.php?announcement_id=<?php echo $announcement_id;?>">
                                <div class="panel-body"> 
                                  <div class="text-left">
                                    <a href="viewAnnounceDetails.php?announcement_id=<?php echo $announcement_id;?>" class="btn btn-warning">Cancel</a>
                                  </div><br>

                                  <div class="form-group">
                                    <label for="an_what">WHAT</label>
                                    <input type="text" class="form-control" value="<?php echo $an_what;?>" id="an_what" name="an_what">
                                  </div>
                                    
                                  <div class="form-group">
                                    <label for="an_who">WHO</label>
                                    <input type="text" class="form-control" value="<?php echo $an_who;?>" id="an_who" name="an_who">  
                                  </div>

                                  <div class="form-group">
                                    <label for="an_when">WHEN /format: YYYY-MM-DD HH:MM:SS/</label>
                                    <input type="text" class="form-control" value="<?php echo $an_when;?>" id="an_when" name="an_when">
                                  </div>

                                  <div class="form-group">
                                    <label for="an_where">WHERE</label>
                                    <input type="text" class="form-control" value="<?php echo $an_where;?>" id="an_where" name="an_where">
                                  </div>
                                </div>  <!--End of .panel-body-->     
                                  <div class="panel-footer">
                                    <div class="text-right">
                                    <button type="submit" class="btn btn-primary" name="updateannounce">Update</button>
                                    </div>
                                  </div>
                              </form>
                        </div> <!--END-->                         
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
} );
</script>


</body>
</html>
