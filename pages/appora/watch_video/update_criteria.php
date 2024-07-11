<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];

$select_criteria = "SELECT * FROM `video_views` WHERE id = $id ";
$criteria_result = mysqli_query($db_connection, $select_criteria);
$criteria_assoc = mysqli_fetch_assoc($criteria_result);
?>

<?php require '../../../element/head.php' ?>

<body class="with-welcome-text">
  <div class="container-scroller">
    <?php require '../../../element/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="padding-top: 53px;">
      <!-- partial:partials/_settings-panel.html -->

      <?php ///require 'element/settings-panel.php' ?>

      <!-- partial -->
      <?php require '../../../element/side_bar.php' ?>
      <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">                              
                <div class="col-lg-4 mx-auto">
                        <div class="card mx-auto mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Update Criteria</h4>
                                <p class="card-description">update criteria details</p>                               
                                <form class="forms-sample" action="update_criteria_post.php?id=<?=$criteria_assoc['id']?>" method="POST">
                                <div class="form-group">
                                    <label for="title">Criteria title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?=$criteria_assoc['title']?>">
                                </div>                                
                                <div class="form-group">
                                    <label for="number">Views Number</label>
                                    <input type="text" name="number" class="form-control" id="number" value="<?=$criteria_assoc['number']?>">
                                </div>                                
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" name="unit" class="form-control" id="unit" value="<?=$criteria_assoc['unit']?>">
                                </div>                                
                                <button type="submit" class="btn btn-primary me-2">Update</button>                        
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
<?php require '../../../element/footer.php'?>  
        <!-- partial -->
    </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<?php require '../../../element/footer_links.php'?>