<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];

$helps = "SELECT * FROM helps WHERE id = $id ";
$helps_result = mysqli_query($db_connection, $helps);
$helps_assoc = mysqli_fetch_assoc($helps_result);

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
                <div class="card col-md-6 mx-auto mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Update content</h4>                        
                        <form class="forms-sample" action="update_content.php?id=<?=$helps_assoc['id']?>" method="POST">
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea name="content" class="form-control" style="min-height: 7rem;" cols="53" rows="5"><?=$helps_assoc['description']?></textarea>
                        </div>                                
                        <button type="submit" class="btn btn-primary me-2">Update</button>                        
                        </form>
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